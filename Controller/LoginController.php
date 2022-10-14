<?php
require_once "./Model/Adminmodel.php";
require_once "./View/LoginView.php";
require_once "./Helpers/AuthHelper.php";

class LoginController
{
    private $model;
    private $view;
    private $authHelper;

    function __construct()
    {
        $this->model = new adminModel();
        $this->view = new LoginView();
        $this->authHelper= new AuthHelper();
    }

    function login()
    {
        $logged = $this->authHelper->checkLoggedIn();
        $this->view->showlogin($logged);
    }
  
    function verifyLogin(){
        if (!empty($_POST['user']) && !empty($_POST['password'])) {
            $userForm = $_POST['user'];
            $passwordForm = $_POST['password'];

            $user = $this->model->getAdmin($userForm);
           

            if(($user) && password_verify($passwordForm,($user->password))) {
                
                session_start();
                $_SESSION["user"] = $user;

                $this->view->redirectHome();
            } else {
                $this->view->showLogin(null, "Acceso Denegado");
            }
        }else {
            $this->view->showLogin(null, "Ingrese su usuario");
        }
    }

    function logout()
    {
        session_start();
        session_destroy();
        $this->view->redirectHome();
    }
}