<?php

class GameController extends MainController
{
    public function __construct()
    {
        $this->Customer = new Customer();
        $this->Game = new Game();
        $this->Display = new Display();
    }

    public function handleRequest()
    {
        $action = isset($_GET['op']) ? $_GET['op'] : 'update';
        $customerId = isset($_GET['id']) ? $_GET['id'] : null;

        switch ($action) {
            case 'update':
                $this->updateCustomerGames($customerId);
                break;
            case 'delete':
                $this->deleteGame($customerId);
                break;
            default:
                http_response_code(404);
                break;
        }
    }

    public function updateCustomerGames($customerId)
    {
        if (isset($_POST['submit'])) {
            $game = $_POST['game'] ?? null;
            $result = $this->Game->create($customerId, $game);
            header("Location: index.php?con=game&op=update&id=$customerId");
            exit;
        }

        $customerData = $this->Customer->read($customerId);
        $gamesList = $this->Game->list($customerId);
        $options = $this->Display->createGameOptions($gamesList);
        $customerGames = $this->Game->listFromCustomer($customerId);
        $table = $this->Display->createTable($customerGames);

        include 'view/pages/customer/connectGame.php';
    }

    public function deleteGame($gameId)
    {
        $customerId = $_GET['user'] ?? null;
        $result = $this->Game->delete($gameId);

        if (is_numeric($result)) {
            header("Location: index.php?con=game&op=update&id=$customerId");
            exit;
        }
    }
}
