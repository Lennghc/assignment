<?php

class Game extends Main
{

    public function list()
    {
        $sql = "SELECT game.id, game.name as Naam, platform.name as Platform FROM game JOIN platform ON game.platform_id = platform.id";
        $result = self::readsData($sql);
        return $result;
    }

    public function listFromCustomer($id)
    {
        $sql = "SELECT customer_game.id as customergameid, game.id as gameid, game.name as Naam, platform.name as Platform FROM `customer_game` JOIN `customer` ON customer_game.customer_id = customer.id JOIN `game` ON customer_game.game_id = game.id JOIN `platform` ON platform.id = game.platform_id WHERE customer.id = $id";
        $result = self::readsData($sql);
        return $result;
    }

    public function create($id, $game)
    {
        $sql = "INSERT INTO `customer_game` (`customer_id`, `game_id`) VALUES ('{$id}', '{$game}')";
        $result = self::createData($sql);
        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `customer_game` WHERE id = $id";
        $result = self::deleteData($sql);
        return $result;
    }
}
