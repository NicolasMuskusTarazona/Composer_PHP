<?php
// 1.
use App\Controllers\CamperController;
use Slim\App;

return function(App $app){
    $app->group('/campers',function($group){
        $group->get('',[CamperController::class, 'index']);// index por la funcion creada dentro de campercontoller
        $group->get('/{documento}',[CamperController::class, 'show']);
        $group->post('',[CamperController::class, 'store']);
        $group->put('/{documento}',[CamperController::class, 'update']);
        $group->delete('/{documento}',[CamperController::class, 'destroy']);
    });
};
