<?php

declare(strict_types=1);

use App\Application\Controllers\User\UserController;
use App\Application\Controllers\Planta\PlantaController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // opcion para empezar con los handlers 
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Holiwis camperinis😩😩!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', [UserController::class, 'index']);
        $group->get('/{id}', [UserController::class, 'findById']);
        $group->post('', [UserController::class, 'create']);
        $group->put('/{id}', [UserController::class, 'update']);
        $group->delete('/{id}', [UserController::class, 'delete']);
    });

    //SE GREGAN LAS RUTAS NECESARIAS COMO PLANTAS 
    $app->group('/plantas', function (Group $group) {
        $group->get('', [PlantaController::class, 'index']);
        $group->get('/{id}', [PlantaController::class, 'findById']);
        $group->post('', [PlantaController::class, 'create']);
        $group->put('/{id}', [PlantaController::class, 'update']);
        $group->delete('/{id}', [PlantaController::class, 'delete']);
    });
};
