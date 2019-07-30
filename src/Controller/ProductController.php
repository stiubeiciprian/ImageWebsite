<?php


namespace App\Controller;


use App\Model\Domain\Product;
use App\Model\Domain\Tier;
use App\Model\Persistence\PersistenceFactory;
use App\View\Renders\RendererHome;
use App\View\Renders\RenderProduct;

/**
 * Class ProductController
 * @package App\Controller
 */
class ProductController
{

    /**
     * @var PersistenceFactory
     */
    private $persistence;


    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        $this->persistence = new PersistenceFactory();
    }

    /**
     *
     */
    public function showProducts() : void
    {

        //$product = new Product(1,1,"Image", "Description", ['tag1','tag2'],'cameraSpecs', 'date', 'path');

        $productFinder = $this->persistence->createFinder(Product::class);
        $productList = $productFinder->getAll();

        $renderer = new RendererHome($productList);
        $renderer->render();
    }

    /**
     * Show product page with requested id.
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