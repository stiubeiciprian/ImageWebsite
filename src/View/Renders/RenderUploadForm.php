<?php


namespace App\View\Renders;


class RenderUploadForm extends AbstractRender
{
    /**
     * @var array
     */
    private $tagsList;

    public function __construct(array $tagsList)
    {
        $this->tagsList = $tagsList;
    }

    public function render()
    {
        $tagsList = $this->tagsList;
        $this->renderHeader();
        require_once "src/View/Templates/upload-form.php";
        require_once "src/View/Templates/footer.php";
    }
}
