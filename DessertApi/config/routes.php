<?php

use Slim\App;
use App\Middleware\ExampleBeforeMiddleware;


return function (App $app) {

    $app->get('/', \App\Action\HomeAction::class)->setName('home');

    // Documentation de l'api
    $app->get('/docs', \App\Action\Docs\SwaggerUiAction::class);

    // Routes
    $app->get('/user', \App\Action\Dessert\GetKeyAction::class);
    $app->get('/dessert', \App\Action\Dessert\GetDessertsAction::class)
        ->add(ExampleBeforeMiddleware::class);
    $app->get('/dessert/{id}', \App\Action\Dessert\GetDessertsByIdAction::class)
        ->add(ExampleBeforeMiddleware::class);
    $app->post('/dessert', \App\Action\Dessert\CreateDessertAction::class)
        ->add(ExampleBeforeMiddleware::class);
    $app->put('/dessert/{id}', \App\Action\Dessert\UpdateDessertAction::class)
        ->add(ExampleBeforeMiddleware::class);
    $app->delete('/dessert/{id}', \App\Action\Dessert\DeleteDessertAction::class)
        ->add(ExampleBeforeMiddleware::class);
};
//Users: user1 - password
//       marco - polo
//    Le hash du mot de passe change???
//Clé api: 12345