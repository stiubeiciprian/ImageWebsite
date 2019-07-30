<?php


namespace App\Controller;

use App\Core\Request;
use App\Core\Session;
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
     * @var Request
     */
    private $request;

    /**
     * @var Session
     */
    private $session;



    /**
     * UserController constructor.
     */
    public function __construct(Request $request, Session $session)
    {
      $this->request = $request;
      $this->session = $session;
    }

    /**
     * Redirect according to request method.
     */
    public function login() : void
    {
        $requestMethod = $this->request->getMethod();

        if ($requestMethod == "GET"){
            $this->loginGet();
        }

        if($requestMethod == "POST"){
            $this->loginPost();
        }
    }

    /**
     * Login user.
     */
    private function loginPost() : void
    {
        //TODO add form mapper
        $postData = $this->request->getPost();
        $userEmail = $postData[USER_EMAIL];
        $userPassword = $postData[USER_PASSWORD];

        $user= PersistenceFactory::createFinder(User::class)>findByEmail($userEmail);
        $userId = $user->getId();

        $this->session->setSessionValue(SESSION_USER_ID, $userId);

        header("Location: /user/orders");
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
    }

    /**
     * Register user.
     */
    public function register()
    {
        $renderer = new RenderRegisterForm();
        $renderer->render();
    }

    /**
     * Display uploads.
     */
    public function showUploads()
    {
        if(!$this->session->isSessionSet()){
            //TODO add renderer for Page not found.
            echo "Page not found.";
        }

        $renderer = new RenderProfile();
        $renderer->render();
    }

    /**
     * Display orders.
     */
    public function showOrders() : void
    {
        if(!$this->session->isSessionSet()){
            //TODO add renderer for Page not found.
            echo "Page not found.";
        }


        $renderer = new RenderProfile();
        $renderer->render();
    }
}
