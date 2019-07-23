<?php

ini_set("display_errors", "on");

include_once "../constants.php";



/**
 * Hashes user data using sha256.
 *
 * @param string $userName
 * @param string $email
 * @return string
 */
function hashUserData(string $userName, string $email) : string
{
  return hash("sha256", $userName.$email);
}


/**
 * Hashes file name using md5.
 *
 * @param string $fileName
 * @return string
 */
function hashFileName(string $fileName) : string
{
    return md5($fileName);
}



/**
 * Add image to user directory. If the user does not have a directory, it creates one.
 *
 * @param array $image
 * @param string $newImageName
 * @param string $userDirectory
 */
function addImageToUserDirectory(array $image, string $newImageName, string $userDirectory) : void
{

    if(!file_exists($userDirectory)) {
        mkdir($userDirectory, 0777, true);
    }

    move_uploaded_file($image['tmp_name'],$userDirectory.$newImageName);

}


/**
 * Writes image data to JSON file.
 *
 * @param string $directoryPath
 * @param string $fileName
 */
function addImageDataToJSON(string $directoryPath, string $fileName) : void
{
    $dataToStore = array_filter($_POST, function ($key) { return in_array($key, IMAGE_DATA_TO_STORE); } ,ARRAY_FILTER_USE_KEY);

    $jsonEncodedData = json_encode($dataToStore).PHP_EOL;

    file_put_contents($directoryPath.$fileName.".json", $jsonEncodedData);
}


/**
 * Uploads image file and stores its data to the user's directory.
 */
function uploadImage() : void
{

    $hashedFileName = hashFileName($_POST[IMAGE_NAME]);
    $userDirectoryName = hashUserData($_POST[USER_NAME], $_POST[USER_EMAIL]);
    $userDirectoryPath = RELATIVE_PATH_TO_USERS_FILES . $userDirectoryName . '/';

    session_start();
    $_SESSION[USER_DIRECTORY_NAME] = $userDirectoryName;
    $_SESSION[HASHED_USER_FILE_NAME] = $hashedFileName;



    addImageToUserDirectory($_FILES[IMAGE_FILE], $hashedFileName, $userDirectoryPath);

    addImageDataToJSON($userDirectoryPath, $hashedFileName);

    header("Location: ../upload-success.php");
    die();
}


uploadImage();
