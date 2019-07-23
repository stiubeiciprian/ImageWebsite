<?php
include_once "constants.php";

/**
 * @param string $string
 * @return bool
 */
function validFormString(string $string) : bool
{
    return !empty($string);
}

/**
 * @param string $email
 * @return bool
 */
function validFormEmail(string $email) : bool
{
    return !empty($email);
}


/**
 * @param string $number
 * @return bool
 */
function validFormNumber(string $number) : bool
{
    return !empty($number);
}


/**
 *
 */
function validateImageUploadForm()
{
    if(isset($_GET[USER_NAME]) && validFormString($_GET[USER_NAME]))
    {

    }


}