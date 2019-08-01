<?php


namespace App\View\Renders;

/**
 * Class RenderPageNotFound
 * @package App\View\Renders
 */
class RenderPageNotFound extends AbstractRender
{
    public function render()
    {
        $this->renderHeader();
        require_once "src/View/Templates/pageNotFound.php";
        require_once "src/View/Templates/footer.php";
    }
}