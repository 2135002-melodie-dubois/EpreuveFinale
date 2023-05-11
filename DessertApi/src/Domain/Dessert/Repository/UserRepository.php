<?php

namespace App\Domain\Dessert\Repository;

use PDO;

/**
 * Repository.
 */
class UserRepository
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
    public function isValidKey($key): bool
    {
        $sql = "SELECT * FROM users WHERE cle_api = :key;";

        $params = [
            "key" => $key ?? "1",
        ];

        $query = $this->connection->prepare($sql);
        $query->execute($params);

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($result == []) {
            return false;
        }

        return true;
    }

    public function selectKey($user, $password): array
    {
        $query = [
            "code" => $user, 
            "password" => $password,
        ];
        $sql = "SELECT * FROM users WHERE nom = :user AND mot_de_passe = :password;";

        $params = [
            "user" => $query['code'],
            //Le hash change???
            "password" => password_hash($query['password'], PASSWORD_DEFAULT),
        ];

        $query = $this->connection->prepare($sql);
        $query->execute($params);

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}

