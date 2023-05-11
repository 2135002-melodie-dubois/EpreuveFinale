<?php

namespace App\Domain\Dessert\Service;

use App\Domain\Dessert\Repository\DessertRepository;

/**
 * Service.
 */
final class CreateDessert
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
    public function createDessert($nom,$description): array
    {

        $desserts = $this->repository->newDessert($nom,$description);

        // Tableau qui contient la réponse à retourner à l'usager
        $resultat = [
            "desserts" => $desserts
        ];

        return $resultat;
    }


}
