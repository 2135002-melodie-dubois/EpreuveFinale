<?php

namespace App\Action\Dessert;

use App\Domain\Dessert\Service\GetDessertsById;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetDessertsByIdAction
{
    private $dessertView;

    public function __construct(GetDessertsById $dessertView)
    {
        $this->dessertView = $dessertView;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {

        // Récupération des parametres
        $dessertId = $request->getAttribute('id');

        $resultat = $this->dessertView->viewDessertsById($dessertId);

        // Construit la réponse HTTP
        $response->getBody()->write((string)json_encode($resultat));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}