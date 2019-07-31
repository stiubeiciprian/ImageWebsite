<?php


namespace App\View\Renders;

use App\Core\Session;
use App\View\Renders\AbstractRender;

class RenderProfile extends AbstractRender
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
        $this->renderHeader();
        require_once "src/View/Templates/profile-page.php";
        require_once "src/View/Templates/footer.php";
    }
}