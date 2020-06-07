<?php


namespace App\View\Renders;

use App\View\Renders\AbstractRender;

class RenderRegisterForm extends AbstractRender
{
    public function render()
    {
        $this->renderHeader();
        require_once "src/View/Templates/register-form.php";
        require_once "src/View/Templates/footer.php";
    }
}