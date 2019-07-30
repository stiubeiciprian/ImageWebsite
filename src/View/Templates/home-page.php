
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>

<?php foreach ($productList as $product): ?>

<div style="background-color: aqua; width: 800px; display: flex; flex-direction: column; margin: 40px;">
    <h1><?= $product->getTitle() ?></h1>
    <p> <?= $product->getDescription() ?></p>
    <img src="<?= $product->getThumbnailPath()  ?>" height="500">
    
</div>
<?php endforeach; ?>
</body>
</html>
