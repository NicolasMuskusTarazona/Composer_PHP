<?php

namespace App\Handler;

use Exception;
use InvalidArgumentException;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpNotFoundException;
use Slim\Interfaces\ErrorHandlerInterface;
use Throwable;

class CustomErrorHandler implements ErrorHandlerInterface{
    public function __construct(private ResponseFactoryInterface $response)
    {

    }

    public function __invoke(ServerRequestInterface $request, Throwable $exception, bool $displayErrorDetails, bool $logErrors, bool $logErrorDetail): ResponseInterface
    {
        $status = 500;
        $message = "Error interno en el servidor.";
        if ($exception instanceof HttpNotFoundException) {
            $status = 404;
            $message = "Ruta no encontrada";
        } elseif ($exception instanceof InvalidArgumentException) {
            $status = 422;
            $message = $exception->getMessage();
        } elseif ($exception instanceof \TypeError) {
            $status = 400;
            $message = "Error de tipo. Posiblemente datos vacios o mal definidos.";
        }
        
        $response = $this->response->createResponse($status);
        $response->getBody()->write(json_encode(['error'=>$exception->getMessage()]));
        return $response->withHeader('Content-Type', 'application/json');
    }
}