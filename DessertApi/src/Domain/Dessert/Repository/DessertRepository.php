<?php

namespace App\Domain\Dessert\Repository;

use PDO;

/**
 * Repository.
 */
class DessertRepository
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Sélectionne la liste de tous les films
     * 
     * @return DataResponse
     */
    public function selectDesserts(): array
    {
        $sql = "SELECT * FROM desserts;";

        $query = $this->connection->prepare($sql);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function selectById($id): array
    {
        $sql = "SELECT * FROM desserts WHERE id = :id;";

        $params = [
            "id" => $id ?? "1",
        ];

        $query = $this->connection->prepare($sql);
        $query->execute($params);

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function newDessert($nom,$description): array
    {
        $sql = "INSERT INTO desserts (nom,description)
                VALUES (:nom, :description);
        ";
        
        $params = [
            "nom" => $nom ?? "Dessert",
            "description"=> $description ?? "",
        ];

        $query = $this->connection->prepare($sql);
        $query->execute($params);
        $dessertId = $this->connection->lastInsertId();
        $result = $this->selectById($dessertId);

        return $result;
    }

    public function deleteDessert($id): array
    {
        $sql = "DELETE FROM desserts WHERE id = :id;";

        $params = [
            "id" => $id,
        ];

        $result = $this->selectById($id);
        $query = $this->connection->prepare($sql);
        $query->execute($params);


        return $result;
    }
    public function updateDessert($id,$nom,$description): array
    {
        $sql = "UPDATE desserts SET nom=:nom, description=:description WHERE id = :id";

        $params = [
            "id" => $id,
            "nom" => $nom ?? "Dessert",
            "description"=> $description ?? "",
        ];

        
        $query = $this->connection->prepare($sql);
        $query->execute($params);
        $result = $this->selectById($id);

        return $result;
    }
}

