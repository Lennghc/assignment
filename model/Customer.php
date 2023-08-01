<?php

class Customer extends Main
{

    public function list()
    {
        $sql = "SELECT customer.id, firstname as Voornaam, lastname as Achternaam, email as Email, CASE WHEN premium_member = 0 THEN 'Nee' ELSE 'Ja' END as Premium, name AS Land, (SELECT COUNT(*) FROM customer_game WHERE customer_id = customer.id) as Aantal_games FROM customer JOIN country ON country.id = customer.country_id ORDER BY `customer`.`id` ASC";
        $result = self::readsData($sql);
        return $result;
    }

    public function create($firstname, $lastname, $email, $country, $premiumcustomer)
    {
        $sql = "INSERT INTO `customer` (`firstname`, `lastname`, `email`, `country_id`, `premium_member`) VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$country}', '{$premiumcustomer}')";
        $result = self::createData($sql);
        return $result;
    }


    public function read($id)
    {
        $sql = "SELECT * FROM `customer` WHERE `id` = '{$id}'";
        $result = self::readData($sql);
        $result = $result->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($id, $firstname, $lastname, $email, $country, $premiumcustomer)
    {
        $sql = "UPDATE `customer` SET `firstname` = '{$firstname}', `lastname` = '{$lastname}', `email` = '{$email}', `country_id` = '{$country}', `premium_member` = '{$premiumcustomer}' WHERE `id` = '{$id}'";
        $result = self::updateData($sql);
        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `customer` WHERE id = $id";
        $result = self::deleteData($sql);
        return $result;
    }
}
