<?php


namespace App\Model\FormMappers;


use App\Model\Domain\User;

/**
 * Class RegisterFormMapper
 * @package App\Model\FormMappers
 */
class RegisterFormMapper
{
    /**
     * @param array $formArray
     * @return User
     */
    public static function mapToObject(array $formArray){

        return new User(
            0,
            $formArray[USER_NAME],
            $formArray[USER_EMAIL],
            $formArray[USER_PASSWORD]
        );

    }
}