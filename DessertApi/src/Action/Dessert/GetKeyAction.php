<?php

namespace App\Action\Dessert;

use App\Domain\Dessert\Service\GetKey;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetKeyAction
{
    private $dessertView;

    public function __construct(GetKey $dessertView)
    {
        $this->dessertView = $dessertView;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {

        // Récupération des parametres
        $user = $request->getAttribute('user');
        $password = $request ->getAttribute('password');

        $resultat = $this->dessertView->checkKey($user, $password);

        // Construit la réponse HTTP
        $response->getBody()->write((string)json_encode($resultat));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}