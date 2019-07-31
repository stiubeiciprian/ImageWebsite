<?php


namespace App\View\Renders;


use App\Core\Session;

abstract class AbstractRender
{
    abstract public function render();

    /**
     * @return mixed
     */
    protected function renderHeader()
    {
        if (Session::isSessionKeySet(SESSION_USER_ID))
        {
            return require_once "src/View/Templates/headerLoggedIn.php";
        }

        return require_once "src/View/Templates/header.php";
    }
}