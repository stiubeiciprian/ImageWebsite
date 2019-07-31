<?php


namespace App\View\Renders;


class RenderUploadForm extends AbstractRender
{
    public function render()
    {
        $this->renderHeader();
        require_once "src/View/Templates/upload-form.php";
        require_once "src/View/Templates/footer.php";
    }
}
