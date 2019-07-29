<?php

require_once "../constants.php";
require_once "../validations.php";


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

    $jsonEncodedData = json_encode($dataToStore);

    file_put_contents($directoryPath.$fileName.".json", $jsonEncodedData);
}


/**
 * Redirect to form page if the input data are not valid.
 */
function validateFormData() : void
{
    if (isset($_POST['submit'])) {
        $errors = getUploadFormErrors();
    }

    if(isset($errors))
    {
        header("Location: ../upload-image.php?".$errors);
        die();
    }
}


/**
 * @param string $userDirectoryName
 * @param string $hashedFileName
 */
function initializeSession(string $userDirectoryName, string $hashedFileName) : void
{
    session_start();
    $_SESSION[USER_DIRECTORY_NAME] = $userDirectoryName;
    $_SESSION[HASHED_USER_FILE_NAME] = $hashedFileName;
}


/**
 * Uploads image file and stores its data to the user's directory if all inputs are valid.
 */
function uploadImage() : void
{

    validateFormData();

    $hashedFileName = hashFileName($_POST[IMAGE_NAME]);
    $userDirectoryName = hashUserData($_POST[USER_NAME], $_POST[USER_EMAIL]);
    $userDirectoryPath = RELATIVE_PATH_TO_USERS_FILES . $userDirectoryName . '/';


    initializeSession($userDirectoryName, $hashedFileName);

    addImageToUserDirectory($_FILES[IMAGE_FILE], $hashedFileName, $userDirectoryPath);

    addImageDataToJSON($userDirectoryPath, $hashedFileName);

    header("Location: ../upload-success.php");
    die();
}


uploadImage();
