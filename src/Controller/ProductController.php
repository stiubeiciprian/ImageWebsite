<?php


namespace App\Controller;


use App\Core\Request;
use App\Core\Session;
use App\Model\Domain\Product;
use App\Model\Domain\Tag;
use App\Model\Domain\Tier;
use App\Model\FormMappers\UploadFormMapper;
use App\Model\Persistence\PersistenceFactory;
use App\View\Renders\RendererHome;
use App\View\Renders\RenderLoginForm;
use App\View\Renders\RenderPageNotFound;
use App\View\Renders\RenderProduct;
use App\View\Renders\RenderUploadForm;

/**
 * Class ProductController
 * @package App\Controller
 */
class ProductController
{

    /**
     * UserController constructor.
     */
    public function __construct()
    {
    }


    /**
     *  Display products page.
     */
    public function showProducts() : void
    {

        //$product = new Product(1,1,"Image", "Description", ['tag1','tag2'],'cameraSpecs', 'date', 'path');

        $productFinder = PersistenceFactory::createFinder(Product::class);
        $productList = $productFinder->getAll();

        $renderer = new RendererHome($productList);
        $renderer->render();
    }

    /**
     * Display product page with requested id.
     */
    public function showProduct() : void
    {
//        $product = new Product(1,1,"Image", "Description", ['tag1','tag2'],'cameraSpecs', 'date', 'path');
//        $tierList = [ new Tier(1,1,'12x230',32,'Path','PathWOwatermark')];

        $urlQuery = Request::getQuery();

        //TODO add error page if query is not set.

        $productFinder = PersistenceFactory::createFinder(Product::class);
        $product = $productFinder->findById($urlQuery['id']);

        $tierFinder = PersistenceFactory::createFinder(Tier::class);
        $tierList = $tierFinder->findByProductId($urlQuery['id']);

        $renderer = new RenderProduct($product, $tierList);
        $renderer->render();
    }

    /**
     * Buy product.
     */
    public function buyProduct()
    {
        // TODO: If user is logged in -> buy product ( download selected tier )
        //       Otherwise -> redirect to login page

        if(!Session::isSessionKeySet(SESSION_USER_ID)){
            $renderer = new RenderLoginForm();
            $renderer->render();
            return;
        }
    }

    /**
     * Show upload product page.
     */
    public function uploadProduct()
    {
        if ("GET" == Request::getMethod()) {
            $this->uploadGet();
            return;
        }

        if ("POST" == Request::getMethod()) {
            $this->uploadPost();
            return;
        }
    }


    /**
     * Upload product.
     */
    public function uploadPost()
    {
        $formData = Request::getPost();
        $product = UploadFormMapper::mapToObject($formData);

        PersistenceFactory::createMapper(Product::class)->save($product);

    }

    /**
     * Show upload page.
     */
    public function uploadGet()
    {
        if(!Session::isSessionKeySet(SESSION_USER_ID)){
            $renderer = new RenderPageNotFound();
            $renderer->render();
            return;
        }
        $tagsList = PersistenceFactory::createFinder(Tag::class)->getAll();

        $renderer = new RenderUploadForm($tagsList);
        $renderer->render();
    }
}