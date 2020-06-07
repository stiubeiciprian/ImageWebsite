<div class="container">
    <h1>Upload image</h1>

    <hr>

    <form action="/product/upload" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image-title">Image title</label>
            <input type="text" class="form-control" name="image-title"  placeholder="Image title" required>
        </div>



        <div class="form-group">
            <label for="image-description">Image description</label>
            <textarea rows="8" cols="80" class="form-control" name="image-description"  placeholder="Image description" required></textarea>

        </div>


        <div class="form-group">
            <label for="camera-specs">Camera specs</label>
            <input type="text" class="form-control" name="camera-specs"  placeholder="Camera specs" required>
        </div>


        <div class="form-group">
            <label for="image-tags">Select tags</label>
            <select multiple class="form-control" id="image-tags" name="image-tags[]" required>
                <?php foreach ($tagsList as $tag): ?>
                    <option><?= $tag->getName(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="image-date">Image capture date</label>
            <input type="date" class="form-control" name="image-date" required>
        </div>


        <div class="form-group">
            <label for="image-price">Price</label>
            <input type="text" class="form-control" id="image-price" name="image-price"  placeholder="Price" required>
        </div>



        <div class="input-group mb-3">
            <input type="file" class="image-file" name="image-file" required>

        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

    </form>
</div>