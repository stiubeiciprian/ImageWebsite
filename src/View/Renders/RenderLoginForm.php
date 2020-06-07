<?php


namespace App\View\Renders;

use App\Core\Session;
use App\View\Renders\AbstractRender;

class RenderLoginForm extends AbstractRender
{
    public function render()
    {
        $this->renderHeader();
        require_once "src/View/Templates/login-form.php";
        require_once "src/View/Templates/footer.php";
    }
}