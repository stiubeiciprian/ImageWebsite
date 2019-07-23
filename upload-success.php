<?php

include_once "constants.php";

/**
 * Displays the uploaded image and its data.
 */
function uploadSuccess()
{
    session_start();

    $filePath = $_SESSION[USER_DIRECTORY_NAME].'/'.$_SESSION[HASHED_USER_FILE_NAME];

    $imageData = extractImageDataFromJSON(FULL_PATH_TO_USERS_FILES.$filePath.".json");

    displayImageData($imageData);

    displayImage(RELATIVE_PATH_TO_USERS_FILES.$filePath);
}


/**
 * Returns decoded data from json file.
 *
 * @param string $filePath  - full path to the json file
 * @return array
 */
function extractImageDataFromJSON(string $filePath) : array
{
    return json_decode(file_get_contents($filePath),true);
}


/**
 * Display image data in html format.
 *
 * @param array $imageData
 */
function displayImageData(array $imageData) : void
{
    foreach ($imageData as $key=>$value){
        echo "<p><b>{$key}:</b> {$value}</p>";
    }
}


/**
 * Display image in html.
 *
 * @param string $imagePath - relative path to image
 */
function displayImage(string $imagePath) : void
{
    echo "<img src='{$imagePath}'>";
}

?>


<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Success!</title>
</head>
<body>

<?php
uploadSuccess();
?>


</body>
</html>

<?php
session_destroy();
?>



