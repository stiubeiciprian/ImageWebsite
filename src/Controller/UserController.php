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

    private $request;
    private $session;


    /**
     * UserController constructor.
     * @param $request
     * @param $session
     */
    public function __construct($request, $session)
    {
        $this->request = $request;
        $this->session = $session;
    }


    /**
     * Redirect to a login method according to request method.
     */
    public function login() : void
    {
        if ("GET" == $this->request->getMethod()) {
            $this->loginGet();
            return;
        }

        if("POST" == $this->request->getMethod()) {
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
        $formData = $this->request->getPost();
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
        $this->session->setSessionValue(SESSION_USER_ID, $actualUser->getId());

        // Redirect to user orders
        header("Location: /products");
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
        $this->session->closeSession();
        header("Location: /products");
        die();
    }





    /**
     * Redirect to a register method according to request method.
     */
    public function register()
    {
        if ("GET" == $this->request->getMethod()) {
            $this->registerGet();
            return;
        }

        if("POST" == $this->request->getMethod()) {
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
        $formData = $this->request->getPost();
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
        $this->hasAccess();

        $productList = PersistenceFactory::createFinder(Product::class)->findByUserId(Session::getSessionValue(SESSION_USER_ID));

        $renderer = new RenderProfile($productList);
        $renderer->render();
    }

    /**
     * Display orders.
     */
    public function showOrders() : void
    {
        $this->hasAccess();

        $renderer = new RenderProfile();
        $renderer->render();
    }

    /**
     * @return bool
     */
    private function hasAccess()
    {
        if(!$this->session->isSessionKeySet(SESSION_USER_ID)){
            $renderer = new RenderPageNotFound();
            $renderer->render();
            die();
        }
    }
}
