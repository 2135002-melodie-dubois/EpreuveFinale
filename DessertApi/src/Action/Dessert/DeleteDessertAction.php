<?php

namespace App\Action\Dessert;

use App\Domain\Dessert\Service\DeleteDessert;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class DeleteDessertAction
{
    private $dessertDelete;

    public function __construct(DeleteDessert $dessertDelete)
    {
        $this->dessertDelete = $dessertDelete;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {

        // Récupération des parametres
        $id = $request->getAttribute('id');


        $resultat = $this->dessertDelete->deleteDessert($id);
        
        // Construit la réponse HTTP
        $response->getBody()->write((string)json_encode($resultat));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}