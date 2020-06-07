<?php

namespace App\Model\FormMappers;

use App\Model\Domain\User;

/**
 * Class LoginFormMapper
 * @package App\Model\FormMappers
 */
class LoginFormMapper
{
    /**
     * @param array $formArray
     * @return User
     */
    public static function mapToObject(array $formArray){

        return new User(
            0,
            '',
            $formArray[USER_EMAIL],
            $formArray[USER_PASSWORD]
        );

    }
}