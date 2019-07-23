<?php
include_once "constants.php";


const ERROR_MESSAGE_USER_NAME = "User name is not valid!";
const ERROR_MESSAGE_USER_EMAIL = "Email is not valid!";
const ERROR_MESSAGE_IMAGE_NAME = "Image title is not valid!";
const ERROR_MESSAGE_IMAGE_DESCRIPTION = "Image description cannot be empty!";
const ERROR_MESSAGE_IMAGE_CAMERA_SPECS = "Camera specs cannot be empty!";
const ERROR_MESSAGE_IMAGE_PRICE = "Given price is not a number!";
const ERROR_MESSAGE_IMAGE_TAGS = "Image tags cannot be empty!";
const ERROR_MESSAGE_IMAGE_DATE = "Image date cannot be empty!";


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Upload image</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/master.css">
  </head>
  <body>

    <div class="container">
      <h1>Upload image</h1>

      <hr>

      <form action="actions/upload-image.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label for="user-name">Name</label>
          <input type="text" class="form-control" name="user-name"  placeholder="Name">
            <?php

                if(isset($_GET[USER_NAME]))
                {
                    echo "<p class='form-input-error'>".ERROR_MESSAGE_USER_NAME."</p>";
                }
                ?>
        </div>



        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" name="user-email" placeholder="Enter email">
            <?php
            if(isset($_GET[USER_EMAIL]))
            {
            echo "<p class='form-input-error'>".ERROR_MESSAGE_USER_EMAIL."</p>";
            }
            ?>
        </div>



        <div class="form-group">
          <label for="image-title">Image title</label>
          <input type="text" class="form-control" name="image-title"  placeholder="Image title">
            <?php

            if(isset($_GET[IMAGE_NAME]))
            {
            echo "<p class='form-input-error'>".ERROR_MESSAGE_IMAGE_NAME."</p>";
            }
            ?>
        </div>



        <div class="form-group">
          <label for="image-description">Image description</label>
          <textarea rows="8" cols="80" class="form-control" name="image-description"  placeholder="Image description"> </textarea>
            <?php
            if(isset($_GET[IMAGE_DESCRIPTION]))
            {
            echo "<p class='form-input-error'>".ERROR_MESSAGE_IMAGE_DESCRIPTION."</p>";
            }
            ?>
        </div>



        <div class="form-group">
          <label for="camera-specs">Camera specs</label>
          <input type="text" class="form-control" name="camera-specs"  placeholder="Camera specs">
            <?php
            if(isset($_GET[IMAGE_CAMERA_SPECS]))
            {
            echo "<p class='form-input-error'>".ERROR_MESSAGE_IMAGE_CAMERA_SPECS."</p>";
            }
            ?>
        </div>



        <div class="form-group">
          <label for="image-price">Price</label>
          <input type="text" class="form-control" id="image-price" name="image-price"  placeholder="Price">
            <?php
            if(isset($_GET[IMAGE_PRICE]))
            {
            echo "<p class='form-input-error'>".ERROR_MESSAGE_IMAGE_PRICE."</p>";
            }
            ?>
        </div>



        <div class="form-group">
          <label for="image-tags">Select tags</label>
          <select multiple class="form-control" id="image-tags" name="image-tags[]">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
            <?php
            if(isset($_GET[IMAGE_TAGS]))
            {
                echo "<p class='form-input-error'>".ERROR_MESSAGE_IMAGE_TAGS."</p>";
            }
            ?>
        </div>



        <div class="form-group">
          <label for="image-date">Image capture date</label>
          <input type="date" class="form-control" name="image-date">
            <?php
                if(isset($_GET[IMAGE_DATE]))
                {
                echo "<p class='form-input-error'>".ERROR_MESSAGE_IMAGE_DATE."</p>";
                }
            ?>
        </div>


        <div class="input-group mb-3">
            <input type="file" class="image-file" name="image-file">

        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

      </form>
  </div>


  </body>
</html>
