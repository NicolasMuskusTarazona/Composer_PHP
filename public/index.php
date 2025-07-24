<?php

use Slim\App;
use App\Middleware\JsonBodyParserMiddleware;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handler;

return function (App $app){
    $app->add(function (Request $req, Handler $han): Response {
        $response = $han->handle($req);
        return $response->withHeader('Content-Type', 'application/json');
    });
    $app->add(new JsonBodyParserMiddleware());

};

// Middlewares
//Global -> a todas las Request del Backend


// GET /campers
// POST /campers
// PUT /campers/1
// DELETE /campers/1


