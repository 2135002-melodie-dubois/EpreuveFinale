<?php

namespace App\Action\Dessert;

use App\Domain\Dessert\Service\CreateDessert;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class CreateDessertAction
{
    private $dessertCreate;

    public function __construct(CreateDessert $dessertCreate)
    {
        $this->dessertCreate = $dessertCreate;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {

        // Récupération des parametres
        $data = (array)$request->getParsedBody();
        $nom = $data['nom'] ?? 'Dessert';
        $description = $data['description'] ?? '';

        $resultat = $this->dessertCreate->createDessert($nom,$description);

        // Construit la réponse HTTP
        $response->getBody()->write((string)json_encode($resultat));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}