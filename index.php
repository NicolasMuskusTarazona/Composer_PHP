<?php

require_once "vendor/autoload.php";

use Slim\Factory\AppFactory;
use Dotenv\Dotenv;
use App\Infrastructure\Database\Connection;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\Interfaces\ErrorHandlerInterface;

// Variables de .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load(); // $_ENV[...]

// Iniciar la conexion con la DB
Connection::init();

//  Se carga el Container de PHP-DI
$container = require_once 'bootstrap/container.php';
// Asignamos a Slim el contenedor
AppFactory::setContainer($container);

$app = AppFactory::create();

$container->set(ResponseFactoryInterface::class, $app->getResponseFactory());

$errorHandler = $app->addErrorMiddleware(true,true,true);
$errorHandler->setDefaultErrorHandler($container->get(ErrorHandlerInterface::class));

// Ejecutando los script de public
(require_once 'public/index.php')($app);
// Ejecutando los script de routes/
(require_once 'routes/campers.php')($app);
(require_once 'routes/users.php')($app);

$app->run();
