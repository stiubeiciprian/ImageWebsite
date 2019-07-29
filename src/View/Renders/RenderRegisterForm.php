<?php


namespace App\View\Renders;

use App\View\Renders\AbstractRender;

class RenderRegisterForm extends AbstractRender
{
    public function render()
    {
        // TODO: Implement render() method.
        require_once "src/View/Templates/register-form.php";
    }
}