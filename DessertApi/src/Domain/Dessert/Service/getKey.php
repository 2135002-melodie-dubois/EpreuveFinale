<?php

namespace App\Domain\Dessert\Service;

use App\Domain\Dessert\Repository\UserRepository;

/**
 * Service.
 */
final class GetKey
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Sélectionne tous les films.
     *
     * @return array La liste des films
     */
    public function checkKey($user, $password): array
    {

        $key = $this->repository->selectKey($user, $password);

        $cle = $key['cle_api'] ?? '';

        // Tableau qui contient la réponse à retourner à l'usager
        $resultat = [
            "key" => $cle
        ];

        return $resultat;
    }


}
