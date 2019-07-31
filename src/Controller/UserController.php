<?php


namespace App\Controller;

use App\Core\Request;
use App\Core\Session;
use App\Model\Domain\User;
use App\Model\FormMappers\LoginFormMapper;
use App\Model\FormMappers\RegisterFormMapper;
use App\Model\Persistence\Mapper\UserMapper;
use App\Model\Persistence\PersistenceFactory;
use App\View\Renders\RenderLoginForm;
use App\View\Renders\RenderPageNotFound;
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
     * Redirect to a login method according to request method.
     */
    public function login() : void
    {
        if ("GET" == Request::getMethod()) {
            $this->loginGet();
            return;
        }

        if("POST" == Request::getMethod()) {
            $this->loginPost();
            return;
        }
    }

    /**
     * Login user.
     */
    private function loginPost() : void
    {
        // Transfer user form data into User instance
        $formData = Request::getPost();
        $loggingUser = LoginFormMapper::mapToObject($formData);


        // Check login data
        $actualUser = PersistenceFactory::createFinder(User::class)->findByEmail($loggingUser->getEmail());

        if($actualUser->getId() == null) {
            header("Location: /user/login");
            die();
        }

        if($loggingUser->getPassword() != $actualUser->getPassword()){
            header("Location: /user/login");
            die();
        }


        // Set user id in session
        Session::setSessionValue(SESSION_USER_ID, $actualUser->getId());

        // Redirect to user orders
        header("Location: /user/orders");
        die();
    }

    /**
     * Display login form.
     */
    private function loginGet() : void
    {
        $renderer = new RenderLoginForm();
        $renderer->render();
    }


    /**
     * Log out user in session.
     */
    public function logout() : void
    {
        Session::closeSession();
        header("Location: /products");
        die();
    }








    /**
     * Redirect to a register method according to request method.
     */
    public function register()
    {
        if ("GET" == Request::getMethod()) {
            $this->registerGet();
            return;
        }

        if("POST" == Request::getMethod()) {
            $this->registerPost();
            return;
        }
    }

    /**
     * Register user.
     */
    private function registerPost()
    {
        // Transfer user form data into User instance
        $formData = Request::getPost();
        $user = RegisterFormMapper::mapToObject($formData);

        // TODO Validate form data

        // Save user to database
        $userMapper = PersistenceFactory::createMapper(User::class);
        $userMapper->save($user);


        header("Location: /user/login");
        die();
    }

    /**
     * Display register form.
     */
    private function registerGet()
    {
        $renderer = new RenderRegisterForm();
        $renderer->render();
    }


    /**
     * Display uploads.
     */
    public function showUploads()
    {
        if(!Session::isSessionKeySet(SESSION_USER_ID)){
            $renderer = new RenderPageNotFound();
            $renderer->render();
            return;
        }

        $renderer = new RenderProfile();
        $renderer->render();
    }

    /**
     * Display orders.
     */
    public function showOrders() : void
    {
        if(!Session::isSessionKeySet(SESSION_USER_ID)){
            $renderer = new RenderPageNotFound();
            $renderer->render();
            return;
        }

        $renderer = new RenderProfile();
        $renderer->render();
    }
}
