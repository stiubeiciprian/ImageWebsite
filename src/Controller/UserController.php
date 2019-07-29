<?php


namespace App\Controller;

use App\View\Renders\RenderLoginForm;
use App\View\Renders\RenderProfile;
use App\View\Renders\RenderRegisterForm;

/**
 * Class UserController
 * @package App\Controller
 */
class UserController
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {

    }


    /**
     *
     */
    public function login() : void
    {
        $renderer = new RenderLoginForm();
        $renderer->render();
    }

    /**
     *
     */
    public function logout() : void
    {
    }

    /**
     *
     */
    public function register()
    {
        $renderer = new RenderRegisterForm();
        $renderer->render();
    }

    /**
     *
     */
    public function showUploads()
    {
        $renderer = new RenderProfile();
        $renderer->render();
    }

    /**
     *
     */
    public function showOrders()
    {
        $renderer = new RenderProfile();
        $renderer->render();
    }
}