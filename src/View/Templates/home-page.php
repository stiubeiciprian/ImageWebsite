<div class="container" style="display:flex; flex-direction: row;">


        <div class=" " style="height: 1405.57px;">

            <?php foreach ($productList as $product): ?>

                <div class="product" style="padding: 10px">
                    <a href="/product?id=<?= $product->getId() ?>">
                        <div class="product_inner">
                                <img  width="400" src="<?= $product->getThumbnailPath()  ?>">
                            <div class="product_content text-center">
                                <div class="product_title"><a href="/product?id=<?= $product->getId() ?>"><?= $product->getTitle() ?></a></div>
                                <div class="product_button ml-auto mr-auto trans_200">Buy photo</div>
                            </div>
                        </div>
                    </a>
                </div>

            <?php endforeach; ?>
        </div>
</div>


