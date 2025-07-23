<?php
// 2.
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CamperController{

    
    public function index(Request $request,Response $response): Response{ // get ALL
        
        return $response;
    }

    public function show(Request $request,Response $response): Response{ // get ID "documento"
        return $response;

    }

    public function store(Request $request,Response $response): Response{// post ID "documento"
        return $response;

    }

    public function update(Request $request,Response $response): Response{// put ID "documento"
        return $response;

    }

    public function destroy(Request $request,Response $response): Response{// delete ID "documento"
        return $response;

    }
}