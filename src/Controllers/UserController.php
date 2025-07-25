<?php

namespace App\Controllers;

use App\Domain\Repositories\UserRepositoryInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController{
    public function __construct(private UserRepositoryInterface $repo){}

    public function createUser(Request $request,Response $response): Response{
        $data = $request->getParsedBody();
        $data['rol'] = 'user';
        
        $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
        $user = $this->repo->create($data);
        
        $response->getBody()->write(json_encode($user));
        return $response->withStatus(201);
    }

    public function createAdmin(Request $request,Response $response): Response{
        $data = $request->getParsedBody();
        $data['rol'] = 'admin';

        $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
        $user = $this->repo->create($data);

        $response->getBody()->write(json_encode($user));
        return $response->withStatus(201);
    }
}