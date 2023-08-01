<?php

class MainController
{
    public function __construct()
    {
        $this->authController = new AuthController();
        $this->customerController = new CustomerController();
        $this->gameController = new GameController();
        $this->display = new Display();
    }

    public function handleRequest()
    {
        $con = isset($_GET['con']) ? $_GET['con'] : 'index';

        switch ($con) {
            case 'index':
                $this->index();
                break;
            case 'auth':
                $this->authController->handleRequest();
                break;
            case 'customer':
                // check if the user has logged in
                if (!isset($_SESSION['user']->id)) {
                    header("Location: index.php");
                    exit;
                }
                $this->customerController->handleRequest();
                break;
            case 'game':
                // check if the user has logged in
                if (!isset($_SESSION['user']->id)) {
                    header("Location: index.php");
                    exit;
                }
                $this->gameController->handleRequest();
                break;
            default:
                http_response_code(404);
                break;
        }
    }

    public function index()
    {
        if (isset($_SESSION['user']->id)) {
            $this->customerController->list();
        } else {
            $this->authController->login();
        }
    }
}
