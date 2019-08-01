<?php foreach ($productList as $product): ?>

    <div style="background-color: #ffeeff; padding: 10px;" class="container" >
        <a href="/product?id=<?= $product->getId() ?>">
        <h1><?= $product->getTitle() ?></h1>
        <img src="../<?= $product->getThumbnailPath()  ?>" height="500">
        </a>
    </div>
<?php endforeach; ?>

