<?php


namespace App\View\Renders;

use App\Core\Session;
use App\View\Renders\AbstractRender;

class RenderProfile extends AbstractRender
{
    public function render()
    {
        $this->renderHeader();
        require_once "src/View/Templates/profile-page.php";
        require_once "src/View/Templates/footer.php";
    }
}