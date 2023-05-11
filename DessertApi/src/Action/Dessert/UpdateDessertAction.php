<?php

namespace App\Action\Dessert;

use App\Domain\Dessert\Service\updateDessert;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class UpdateDessertAction
{
    private $dessertUpdate;

    public function __construct(updateDessert $dessertUpdate)
    {
        $this->dessertUpdate = $dessertUpdate;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {

        // Récupération des parametres
        $id = $request->getAttribute('id');
        $data = (array)$request->getParsedBody();
        $nom = $data['nom'] ?? '';
        $description = $data['description'] ?? '';

        $resultat = $this->dessertUpdate->updateDessert($id,$nom,$description);

        // Construit la réponse HTTP
        $response->getBody()->write((string)json_encode($resultat));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}