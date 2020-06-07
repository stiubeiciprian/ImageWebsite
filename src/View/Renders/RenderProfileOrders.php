<?php


namespace App\View\Renders;


class RenderProfileOrders extends AbstractRender
{
    /**
     * @var array
     */
    private $ordersList;

    public function __construct(array $ordersList)
    {
        $this->ordersList = $ordersList;
    }

    public function render()
    {
        $ordersList = $this->ordersList;
        if(!isset($ordersList))
            $ordersList = [];
        $this->renderHeader();
        require_once "src/View/Templates/orders-page.php";
        require_once "src/View/Templates/footer.php";
    }
}