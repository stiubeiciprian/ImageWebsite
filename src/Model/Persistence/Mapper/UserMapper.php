<?php


namespace App\Model\Persistence\Mapper;

use App\Model\Domain\User;

/**
 * Class UserMapper
 * @package App\Model\Persistence\Mapper
 */
class UserMapper extends AbstractMapper
{

    /**
     * Save user data to database.
     * @param User $user
     */
    public function save(User $user)
    {
        if ($user->getId() == null) {
            $this->insert($user);
            return;
        }

        $this->update($user);

    }

    /**
     * Create a new user row in User table.
     * @param User $user
     */
    private function insert(User $user)
    {
        $sql = "INSERT INTO user (name, email, password) VALUES (:username, :email, :password) ";

        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue('username', $user->getName());
        $statement->bindValue('email', $user->getEmail());
        $statement->bindValue('password',$user->getPassword());
        $statement->execute();
    }


    /**
     * Updates existing user row in User table.
     * @param User $user
     */
    private function update(User $user)
    {
        $sql = "UPDATE ". SQL_USER_TABLE ." SET ".SQL_USER_NAME."=?, ".SQL_USER_EMAIL."=?, ".SQL_USER_PASSWORD."=? WHERE  ".SQL_USER_ID."=?";
        $statement = $this->getPdo()->prepare($sql);

        $statement->bindValue(SQL_USER_ID, $user->getId());
        $statement->bindValue(SQL_USER_NAME, $user->getName());
        $statement->bindValue(SQL_USER_EMAIL, $user->getEmail());
        $statement->bindValue(SQL_USER_PASSWORD, $user->getPassword());
        $statement->execute();
    }
}