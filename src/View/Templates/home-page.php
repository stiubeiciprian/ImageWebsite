<?php foreach ($productList as $product): ?>

<div style="background-color: aqua; width: 800px; display: flex; flex-direction: column; margin: 40px;">
    <h1><?= $product->getTitle() ?></h1>
    <p> <?= $product->getDescription() ?></p>
    <img src="<?= $product->getThumbnailPath()  ?>" height="500">
    
</div>
<?php endforeach; ?>
