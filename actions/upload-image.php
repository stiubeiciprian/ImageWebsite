<?php

ini_set("display_errors", "on");

const USER_NAME = "user-name";
const USER_EMAIL = "user-email";
const IMAGE_FILE = "image-file";
const IMAGE_NAME = "image-title";
const IMAGE_DESCRIPTION = "image-description";
const IMAGE_CAMERA_SPECS = "camera-specs";
const IMAGE_PRICE = "image-price";
const IMAGE_TAGS = "image-tags";
const IMAGE_DATE = "image-date";


const PATH_TO_USERS_FILES = "../data/users/";
const IMAGE_DATA_TO_STORE = [IMAGE_NAME, IMAGE_DESCRIPTION, IMAGE_CAMERA_SPECS, IMAGE_PRICE, IMAGE_DATE, IMAGE_TAGS];
const USER_DIRECTORY = "user_data.json";

var_dump($_POST);

/**
 * @param string $userName
 * @param string $email
 * @return string
 */
function hashUserData(string $userName,string $email) : string
{
  return hash("sha256", $userName.$email);
}


/**
 * @param array $image
 * @param string $newImageName
 * @param string $userDirectory
 */
function addImageToUserDirectory(array $image, string $newImageName, string $userDirectory) {

    if(!file_exists($userDirectory)) {
        mkdir($userDirectory, 0777, true);
    }

    move_uploaded_file($image['tmp_name'],$userDirectory.$newImageName);

}

/**
 * @param string $fileName
 * @return string
 */
function hashFileName(string $fileName) : string
{
    $fileName = substr(md5($fileName),10);
    return $fileName;
}


/**
 *
 */
function uploadImage() {

    $hashedFileName = hashFileName($_POST[IMAGE_NAME]);
    $hashedUserData = hashUserData($_POST[USER_NAME], $_POST[USER_EMAIL]);
    $userDirectory = PATH_TO_USERS_FILES . $hashedUserData . '/';

    addImageToUserDirectory($_FILES[IMAGE_FILE], $hashedFileName, $userDirectory);

    $dataToStore = array_filter($_POST, function ($key) { return in_array($key, IMAGE_DATA_TO_STORE); } ,ARRAY_FILTER_USE_KEY);



    $jsonEncodedData = json_encode($dataToStore);

    file_put_contents($userDirectory.USER_DIRECTORY, $jsonEncodedData, FILE_APPEND );

    header("Location: ../upload-success.php/?".USER_NAME."=".$_POST[USER_NAME]."&".USER_EMAIL."=".$_POST[USER_EMAIL]);
    die();
}




uploadImage();
