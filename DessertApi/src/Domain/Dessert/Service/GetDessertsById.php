<?php

namespace App\Domain\Dessert\Service;

use App\Domain\Dessert\Repository\DessertRepository;

/**
 * Service.
 */
final class GetDessertsById
{
    /**
     * @var DessertRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param DessertRepository $repository
     */
    public function __construct(DessertRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Sélectionne tous les films.
     *
     * @return array La liste des films
     */
    public function viewDessertsById($id): array
    {

        $desserts = $this->repository->selectById($id);

        // Tableau qui contient la réponse à retourner à l'usager
        $resultat = [
            "desserts" => $desserts
        ];

        return $resultat;
    }


}
