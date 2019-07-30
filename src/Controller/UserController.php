<?php


namespace App\Controller;

use App\Model\Domain\User;
use App\Model\Persistence\PersistenceFactory;
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
     * @var PersistenceFactory
     */
    private $persistence;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->persistence = new PersistenceFactory();
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
        unset($_SESSION);
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
        $user = new User(1, '', '', '');

        $userFinder = $this->persistence->createFinder(User::class);

        $user = $userFinder->findById($user->getId());


        $renderer = new RenderProfile();
        $renderer->render();
    }

    /**
     *
     */
    public function showOrders() : void
    {
        $renderer = new RenderProfile();
        $renderer->render();
    }
}