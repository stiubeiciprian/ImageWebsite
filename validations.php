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
    return is_numeric($number);
}


/**
 * @param string $date
 * @return bool
 */
function validFormDate(string $date) : bool
{
    return !empty($date);
}


/**
 * @param array $tags
 * @return bool
 */
function validFormTags(array $tags) : bool
{
    return !empty($tags);
}



/**
 *Checks the validity of all input fields of the form.
 *
 * @return string
 */
function getUploadFormErrors()
{
    $errors = [];

    if(!isset($_POST[USER_NAME]) || !validFormString($_POST[USER_NAME]))
    {
        $errors[]=  USER_NAME."=invalid";
    }


    if(!isset($_POST[USER_EMAIL]) || !validFormEmail($_POST[USER_EMAIL]))
    {
        $errors[]= USER_EMAIL . "=invalid";
    }


    if(!isset($_POST[IMAGE_NAME]) || !validFormString($_POST[IMAGE_NAME]))
    {
        $errors[]= IMAGE_NAME . "=invalid";
    }


    if(!isset($_POST[IMAGE_DESCRIPTION]) || !validFormString($_POST[IMAGE_DESCRIPTION]))
    {
        $errors[]= IMAGE_DESCRIPTION . "=invalid";
    }


    if(!isset($_POST[IMAGE_CAMERA_SPECS]) || !validFormString($_POST[IMAGE_CAMERA_SPECS]))
    {
        $errors[]= IMAGE_CAMERA_SPECS . "=invalid";
    }


    if(!isset($_POST[IMAGE_PRICE]) || !validFormNumber($_POST[IMAGE_PRICE]))
    {
        $errors[]= IMAGE_PRICE . "=invalid";
    }


    if(!isset($_POST[IMAGE_TAGS]) || !validFormTags($_POST[IMAGE_TAGS]))
    {
        $errors[]= IMAGE_TAGS . "=invalid";
    }


    if(!isset($_POST[IMAGE_DATE]) || !validFormDate($_POST[IMAGE_DATE]))
    {
        $errors[]= IMAGE_DATE . "=invalid";
    }

    return implode('&',$errors);


}