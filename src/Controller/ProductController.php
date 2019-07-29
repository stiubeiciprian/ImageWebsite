<?php


namespace App\Controller;


use App\Model\Domain\Product;
use App\Model\Domain\Tier;
use App\View\Renders\RendererHome;
use App\View\Renders\RenderProduct;

/**
 * Class ProductController
 * @package App\Controller
 */
class ProductController
{

    /**
     * ProductController constructor.
     */
    public function __construct()
    {
    }

    /**
     *
     */
    public function showProducts() : void
    {

        $product = new Product(1,1,"Image", "Description", ['tag1','tag2'],'cameraSpecs', 'date', 'path');

        $productList = [$product, $product];


        $renderer = new RendererHome($productList);
        $renderer->render();
    }

    /**
     *
     */
    public function showProduct() : void
    {
        $product = new Product(1,1,"Image", "Description", ['tag1','tag2'],'cameraSpecs', 'date', 'path');
        $tierList = [ new Tier(1,1,'12x230',32,'Path','PathWOwatermark')];
        $renderer = new RenderProduct($product, $tierList);
        $renderer->render();
    }

    /**
     *
     */
    public function buyProduct()
    {
        // TODO: If user is logged in -> buy product ( download selected tier )
        //       Otherwise -> redirect to login page
    }

}