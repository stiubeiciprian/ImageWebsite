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
        $sql = "SELECT * FROM user WHERE id=?";

        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();

        $fetchResult = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->translateToUser($fetchResult);
    }

    /**
     * Returns user with given email.
     * @param string $email
     * @return User
     */
    public function findByEmail(string $email): User
    {
        $sql = "SELECT * FROM user WHERE email=?";

        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue(1, $email, PDO::PARAM_STR);
        $statement->execute();

        $fetchResult = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->translateToUser($fetchResult);
    }


    /**
     * Creates a user from the given associative array.
     * @param array $fetchResult
     * @return User
     */
    private function translateToUser($fetchResult): User
    {
        if (false == $fetchResult) {
            return new User(0, '', '', '');
        }

        return new User(
            $fetchResult[SQL_USER_ID],
            $fetchResult[SQL_USER_NAME],
            $fetchResult[SQL_USER_EMAIL],
            $fetchResult[SQL_USER_PASSWORD]
        );
    }
}