<?php


namespace App\View\Renders;

use App\Core\Session;
use App\Model\Domain\Product;

/**
 * Class RenderProduct
 * @package App\View\Renders
 */
class RenderProduct extends AbstractRender
{
    private $product;
    private $tierList;

    /**
     * RenderProduct constructor.
     * @param Product $product
     * @param array $tierList
     */
    public function __construct(Product $product, array $tierList)
    {
        $this->product = $product;
        $this->tierList = $tierList;
    }

    /**
     *  Renders the page with the product and tier information.
     */
    public function render()
    {
        $product = $this->product;
        $tierList = $this->tierList;
        $this->renderHeader();
        require_once "src/View/Templates/product-page.php";
        require_once "src/View/Templates/footer.php";
    }
}