<?php

namespace App\Action\Dessert;

use App\Domain\Dessert\Service\GetDesserts;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetDessertsAction
{
    private $dessertView;

    public function __construct(GetDesserts $dessertView)
    {
        $this->dessertView = $dessertView;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {

        // Récupération des parametres
        $userId = $request->getAttribute('id');

        $resultat = $this->dessertView->viewDesserts();

        // Construit la réponse HTTP
        $response->getBody()->write((string)json_encode($resultat));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}