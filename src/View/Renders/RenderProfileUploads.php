<?php


namespace App\View\Renders;

use App\Core\Session;
use App\View\Renders\AbstractRender;

class RenderProfileUploads extends AbstractRender
{

    /**
     * @var array
     */
    private $productList;

    public function __construct(array $productList)
    {
        $this->productList = $productList;
    }

    public function render()
    {
        $productList = $this->productList;
        if(!isset($ordersList))
            $ordersList = [];
        $this->renderHeader();
        require_once "src/View/Templates/uploads-page.php";
        require_once "src/View/Templates/footer.php";
    }
}