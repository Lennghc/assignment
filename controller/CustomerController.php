<?php

class CustomerController extends MainController
{
    public function __construct()
    {
        $this->Customer = new Customer();
        $this->Country = new Country();
        $this->Display = new Display();
        $this->Game = new Game();
    }

    public function handleRequest()
    {
        $op = isset($_GET['op']) ? $_GET['op'] : 'create';
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        switch ($op) {
            case 'list':
                $this->list();
                break;
            case 'create':
                $this->create();
                break;
            case 'update':
                $this->update($id);
                break;
            case 'delete':
                $this->delete($id);
                break;
            case 'games':
                $this->boughtgames($id);
                break;
            default:
                http_response_code(404);
                break;
        }
    }

    public function list()
    {
        $list = $this->Customer->list();
        $table = $this->Display->createTable($list, true);
        include 'view/pages/customer/index.php';
    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            $firstname = $_POST['firstname'] ?? null;
            $lastname = $_POST['lastname'] ?? null;
            $email = $_POST['email'] ?? null;
            $country = $_POST['country'] ?? null;
            $premiumcustomer = isset($_POST['premiumcustomer']) ? 1 : 0;

            $result = $this->Customer->create($firstname, $lastname, $email, $country, $premiumcustomer);

            if (is_numeric($result)) {
                header('Location: index.php');
                exit;
            }
        }

        $countryList = $this->Country->list();
        $options = $this->Display->createCountryOptions($countryList);
        include 'view/pages/customer/create.php';
    }

    public function update($id)
    {
        if (isset($_POST['submit'])) {
            $firstname = $_POST['firstname'] ?? null;
            $lastname = $_POST['lastname'] ?? null;
            $email = $_POST['email'] ?? null;
            $country = $_POST['country'] ?? null;
            $premiumcustomer = isset($_POST['premiumcustomer']) ? 1 : 0;

            $result = $this->Customer->update($id, $firstname, $lastname, $email, $country, $premiumcustomer);

            header('Location: index.php');
            exit;
        }

        $customerData = $this->Customer->read($id);
        $countryList = $this->Country->list();
        $options = $this->Display->createCountryOptions($countryList, $customerData['country_id']);
        include 'view/pages/customer/update.php';
    }

    public function delete($id)
    {
        $result = $this->Customer->delete($id);

        if (is_numeric($result)) {
            header('Location: index.php');
            exit;
        }
    }

    public function boughtgames($id)
    {
        $customerData = $this->Customer->read($id);
        $customerGames = $this->Game->listFromCustomer($id);

        echo '<pre>';
        var_dump($customerGames->fetchall(PDO::FETCH_ASSOC));
        echo '<pre/>';
    }
}
