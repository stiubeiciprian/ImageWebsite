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
        </div>



        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" name="user-email" placeholder="Enter email">
        </div>



        <div class="form-group">
          <label for="image-title">Image title</label>
          <input type="text" class="form-control" name="image-title"  placeholder="Image title">
        </div>



        <div class="form-group">
          <label for="image-description">Image description</label>
          <textarea rows="8" cols="80" class="form-control" name="image-description"  placeholder="Image description"> </textarea>
        </div>



        <div class="form-group">
          <label for="camera-specs">Camera specs</label>
          <input type="text" class="form-control" name="camera-specs"  placeholder="Camera specs">
        </div>



        <div class="form-group">
          <label for="image-price">Price</label>
          <input type="text" class="form-control" name="image-price"  placeholder="Price">
        </div>



        <div class="form-group">
          <label for="image-tags">Select tags</label>
          <select multiple class="form-control" name="image-tags">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>



        <div class="form-group">
          <label for="image-date">Image capture date</label>
          <input type="date" class="form-control" name="image-date">
        </div>


        <!-- <div class="input-group mb-3">
          <div class="custom-file">
            <input type="file" class="image-file" id="image-file">
            <label class="custom-file-label" for="image-file">Choose image file</label>
          </div>
        </div> -->


        <div class="input-group mb-3">

            <input type="file" class="image-file" name="image-file">


        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

      </form>
  </div>


  </body>
</html>
