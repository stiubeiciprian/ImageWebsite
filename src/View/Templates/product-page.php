
<?php foreach ($tierList as $tier): ?>
    <div style="background-color: aqua; width: 800px; display: flex; flex-direction: column; margin: 40px;">
        <img src="<?= $tier->getPathWithWatermark(); ?> ">
        <h1><?= $tier->getSize() ." - ". $tier->getPrice() . "$";?></h1>
    </div>
<?php endforeach; ?>

<form action="/product/buy" method="post">
    <?php foreach ($tierList as $tier): ?>
        <input type="radio" name="size" value="<?= $tier->getId(); ?>" checked> <?= $tier->getSize(); ?><br>
    <?php endforeach; ?>
    <button type="submit" class="btn btn-primary">Buy</button>
</form>

