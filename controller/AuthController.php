<?php

class AuthController extends MainController
{
    public function __construct()
    {
        $this->Auth = new Auth();
        $this->Display = new Display();
    }

    public function handleRequest()
    {
        $op = isset($_GET['op']) ? $_GET['op'] : 'index';

        switch ($op) {
            case 'register':
                $this->register();
                break;

            case 'login':
                $this->login();
                break;

            case 'logout':
                $this->logout();
                break;

            default:
                http_response_code(404);
                break;
        }
    }

    public function register()
    {
        if (isset($_POST["submit"])) {
            $email = $_POST["email"];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               return $_SESSION['message'] = "$email is not a valid email address";
            }
            $password = $_POST["password"];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $checkemail = $this->Auth->isEmailInUse($email);
            if ($checkemail === true) {
                $this->Auth->createUser($email, $hashed_password);
                $_SESSION['message'] = "Account with success created";
                header("Location: index.php?auth&op=login");
                exit;
            } else {
                $_SESSION['message'] = "Sorry this email already exist.";
                header("Location: index.php?con=auth&op=register");
                exit;
            }
        } else {
            include 'view/pages/register.php';
        }
    }

    public function login()
    {
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        if (isset($_POST['submit'])) {
            $verify = $this->Auth->verifyUser($email, $password);
            if (!$verify) {
                // Failed login attempt
                $_SESSION['message'] = "Email or password is incorrect.";
                header("Location: index.php?con=auth&op=login");
                exit;
            } else {
                // Successful login
                header("Location: index.php");
                exit;
            }
        }

        include 'view/pages/login.php';
    }

    public function logout()
    {
        session_destroy();
        header("Location: index.php");
        exit;
    }
}
