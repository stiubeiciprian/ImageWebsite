<?php


namespace App\View\Renders;

use App\View\Renders\AbstractRender;

class RenderLoginForm extends AbstractRender
{
    public function render()
    {
        require_once "src/View/Templates/header.php";
        require_once "src/View/Templates/login-form.php";
        require_once "src/View/Templates/footer.php";
    }
}