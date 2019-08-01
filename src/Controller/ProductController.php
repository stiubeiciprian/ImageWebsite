<?php


namespace App\Controller;


use App\Core\Request;
use App\Core\Session;
use App\Model\Domain\OrderItem;
use App\Model\Domain\Product;
use App\Model\Domain\Tag;
use App\Model\Domain\Tier;
use App\Model\FormMappers\UploadFormMapper;
use App\Model\ImageTool\ImageTool;
use App\Model\Persistence\PersistenceFactory;
use App\Model\TierProcessor\TierProcessor;
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
     * @var
     */
    private $request;

    /**
     * @var
     */
    private $session;

    /**
     * @var ImageTool
     */
    private $imageTool;

    /**
     * @var TierProcessor
     */
    private $tierProcesor;

    /**
     * UserController constructor.
     */
    public function __construct($request, $session)
    {
        $this->request = $request;
        $this->session = $session;
        $this->imageTool = new ImageTool();
        $this->tierProcesor = new TierProcessor($this->imageTool);

    }


    /**
     *  Display products page.
     */
    public function showProducts() : void
    {
        $productFinder = PersistenceFactory::createFinder(Product::class);

        if (!isset($this->request->getQuery()["title"]))
        {
            $productList = $productFinder->getAll();
        }

        if (isset($this->request->getQuery()["title"]))
        {
            $productList = $productFinder->searchByTitle($this->request->getQuery()["title"]);
        }

        $renderer = new RendererHome($productList);
        $renderer->render();
    }

    /**
     * Display product page with requested id.
     */
    public function showProduct() : void
    {

        $urlQuery = $this->request->getQuery();
        $productId = $urlQuery['id'];

       if(!isset($productId))
       {
           $this->renderPageNotFound();
       }

        // Get product
        $productFinder = PersistenceFactory::createFinder(Product::class);
        $product = $productFinder->findById($productId);

        // Get product tiers
        $tierFinder = PersistenceFactory::createFinder(Tier::class);
        $tierList = $tierFinder->findByProductId($productId);

        // Render product page
        $renderer = new RenderProduct($product, $tierList);
        $renderer->render();
    }

    /**
     * Buy product.
     */
    public function buyProduct()
    {
        $this->hasAccess();

        $tierId = $this->request->getPost()["size"];

        $tier = PersistenceFactory::createFinder(Tier::class)->findById($tierId);

        $dateTime = new \DateTime();
        $date = $dateTime->format('Y-m-d H:i:s');
        $orderItem = new OrderItem($this->session->getSessionValue(SESSION_USER_ID), $tierId, $date);
        PersistenceFactory::createMapper(OrderItem::class)->save($orderItem);

        $this->downloadTier($tier);

        header("Location: /profile/orders");
        die();

    }

    /**
     * @param $tier
     */
    private function downloadTier(Tier $tier)
    {
        $tierImagePath = $tier->getPathWithoutWatermark();

        if (file_exists($tierImagePath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($tierImagePath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($tierImagePath));
            flush();
            readfile($tierImagePath);

        }
    }

    /**
     * Show upload product page.
     */
    public function uploadProduct()
    {
        if ("GET" == $this->request->getMethod()) {
            $this->uploadGet();
            return;
        }

        if ("POST" == $this->request->getMethod()) {
            $this->uploadPost();
            return;
        }
    }


    /**
     * Upload product.
     */
    public function uploadPost()
    {
        // Get product from form
        $formData = $this->request->getPost();
        $product = UploadFormMapper::mapToObject($formData);
        $productPrice = $formData[IMAGE_PRICE];

        // Get file from form
        $formFile = $this->request->getFiles()[IMAGE_FILE];
        $tmpPath = "data/images/tmp_image";
        move_uploaded_file($formFile['tmp_name'], $tmpPath);

        // Save product to db
        $productFinder = PersistenceFactory::createMapper(Product::class);
        $product = $productFinder->save($product);


        // Create thumbnail
        $thumbnailPath = "data/images/thumbnails/".$product->getId();
        $this->imageTool->resizeImageWidthWatermark(TierProcessor::PATH_SOURCE, $thumbnailPath, TierProcessor::PATH_WATERMARK, "500");
        $product->setThumbnailPath($thumbnailPath);

        //Update product thumbnail path in db
         $product = $productFinder->save($product);

        //Generate tiers
        $tiersList = $this->tierProcesor->generateTiers($product, $productPrice);

        $tierFinder = PersistenceFactory::createMapper(Tier::class);

        foreach ($tiersList as $tier)
        {
            $tier = $tierFinder->save($tier);
        }

        //Delete tmp file and redirect
        unlink("data/images/tmp_image");
        header("Location: /product?id=".$product->getId());

    }

    /**
     * Display upload page.
     */
    public function uploadGet()
    {
        $this->hasAccess();

        $tagsList = PersistenceFactory::createFinder(Tag::class)->getAll();

        $renderer = new RenderUploadForm($tagsList);
        $renderer->render();
    }

    /**
     * Display "page not found" if user does not have access to the page.
     */
    private function hasAccess()
    {
        if(!$this->session->isSessionKeySet(SESSION_USER_ID)) {
            $this->renderPageNotFound();
        }
    }

    /**
     * Display page not found.
     */
    private function renderPageNotFound()
    {
        $renderer = new RenderPageNotFound();
        $renderer->render();
        die();
    }
}

