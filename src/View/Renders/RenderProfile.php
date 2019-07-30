<?php


namespace App\View\Renders;

use App\View\Renders\AbstractRender;

class RenderProfile extends AbstractRender
{
    public function render()
    {
        require_once "src/View/Templates/header.php";
        require_once "src/View/Templates/profile-page.php";
        require_once "src/View/Templates/footer.php";
    }
}