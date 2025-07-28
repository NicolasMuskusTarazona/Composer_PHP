<?php

use App\Domain\Repositories\CamperRepositoryInterface;
use App\Domain\Repositories\UserRepositoryInterface;
use App\Handler\CustomErrorHandler;
use App\Infrastructure\Repositories\EloquentCamperRepository;
use App\Infrastructure\Repositories\EloquentUserRepository;
use DI\Container;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\Handlers\ErrorHandler;
use Slim\Interfaces\ErrorHandlerInterface;

$container = new Container();

$container->set(CamperRepositoryInterface::class, function(){
    return new EloquentCamperRepository();
});

$container->set(UserRepositoryInterface::class,function(){
    return new EloquentUserRepository();
});
// Manejador

$container->set(ErrorHandlerInterface::class, function () use ($container){
    return new CustomErrorHandler(
        $container->get(ResponseFactoryInterface::class)
    );
});

return $container;