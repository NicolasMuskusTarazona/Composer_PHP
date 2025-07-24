<?php
// 2.
namespace App\Controllers;

use App\Domain\Repositories\CamperRepositoryInterface;
use App\UseCases\CreateCamper;
use App\UseCases\GetAllCampers;
use App\UseCases\GetCamperById;
use App\UseCases\UpdateCamper;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CamperController{
    public function __construct(private CamperRepositoryInterface $repo){} // index
    
    public function index(Request $request,Response $response): Response{ // get ALL
        $useCase = new GetAllCampers($this->repo);
        $campers = $useCase->execute();
        $response->getBody()->write(json_encode($campers));
        return $response;
    }

    public function show(Request $request,Response $response, array $args): Response{ // get ID "documento"
        $useCase = new GetCamperById($this->repo);
        $camper = $useCase->execute((int)$args['documento']);
        if(!$camper){
            $response->getBody()->write(json_encode(["error"=> "Camper no registrado en la plataforma"]));
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode($camper));
        return $response;

    }

    public function store(Request $request,Response $response): Response{// post ID "documento"
        $data = $request->getParsedBody();
        $useCase = new CreateCamper($this->repo);
        $camper = $useCase->execute($data);
        $response->getBody()->write(json_encode($camper));
        return $response->withStatus(201);

    }

    public function update(Request $request,Response $response, array $args): Response{// put ID "documento"
        $documento = (int)$args['documento'];
        $data = $request->getParsedBody();
        $useCase = new UpdateCamper($this->repo);
        $succes = $useCase->execute($documento,$data);
        if(!$succes){
            $response->getBody()->write(json_encode(["error"=>"Camper no registrado en la plataforma"]));
            return $response->withStatus(404);
        }
        return $response->withStatus(204);

    }

    public function destroy(Request $request,Response $response): Response{// delete ID "documento"
        return $response;

    }
}