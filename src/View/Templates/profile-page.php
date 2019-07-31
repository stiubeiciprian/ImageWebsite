<?php foreach ($productList as $product): ?>

    <div style="background-color: #ffeeff; padding: 10px;" class="container" >
        <h1><?= $product->getTitle() ?></h1>
        <p> <?= $product->getDescription() ?></p>
        <img src="<?= $product->getThumbnailPath()  ?>" height="500">

    </div>
<?php endforeach; ?>

