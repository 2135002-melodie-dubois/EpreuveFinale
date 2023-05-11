<?php

namespace App\Domain\Dessert\Service;

use App\Domain\Dessert\Repository\DessertRepository;

/**
 * Service.
 */
final class UpdateDessert
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
    public function updateDessert($id,$nom,$description): array
    {

        $desserts = $this->repository->updateDessert($id,$nom,$description);

        // Tableau qui contient la réponse à retourner à l'usager
        $resultat = [
            "desserts" => $desserts
        ];

        return $resultat;
    }


}
