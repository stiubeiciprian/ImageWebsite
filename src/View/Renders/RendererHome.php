<?php


namespace App\View\Renders;

class RendererHome extends  AbstractRender
{
    /**
     * @var array
     */
    private $productList;

    public function __construct(array $productList)
    {
        $this->productList = $productList;
    }

    /**
     *
     */
    public function render()
    {
        $this->renderHeader();
        $productList = $this->productList;
        require_once "src/View/Templates/home-page.php";

        require_once "src/View/Templates/footer.php";
    }
}