<?php


namespace App\View\Renders;

use App\View\Renders\AbstractRender;

class RenderProfile extends AbstractRender
{
    public function render()
    {
        // TODO: Implement render() method.
        require_once "src/View/Templates/profile-page.php";
    }
}