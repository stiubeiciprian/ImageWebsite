<?php


namespace App\Model\Persistence\Finder;

require_once "src/Model/Persistence/propertyNames.php";

use App\Model\Domain\User;
use PDO;

/**
 * Class UserFinder
 * @package App\Model\Persistence\Finder
 */
class UserFinder extends AbstractFinder
{

    /**
     * Returns user with given id.
     * @param int $id
     * @return User
     */
    public function findById(int $id): User
    {
        $sql = "SELECT * FROM ". SQL_USER_TABLE . " WHERE " . SQL_USER_ID . "=?";

        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->translateToUser($row);
    }

    /**
     * Returns user with given email.
     * @param string $email
     * @return User
     */
    public function findByEmail(string $email): User
    {
        $sql = "SELECT * FROM ". SQL_USER_TABLE ." WHERE ". SQL_USER_EMAIL . "=?";

        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue(1, $email, PDO::PARAM_STR);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->translateToUser($row);
    }


    /**
     * Creates a user from the given associative array.
     * @param array $row
     * @return User
     */
    private function translateToUser(array $row): User
    {
        $user = new User(
            $row[SQL_USER_ID],
            $row[SQL_USER_NAME],
            $row[SQL_USER_EMAIL],
            $row[SQL_USER_PASSWORD]
        );

        return $user;
    }
}