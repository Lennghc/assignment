<?php

class Country extends Main
{

    public function list()
    {
        $sql = "SELECT * FROM country";
        $result = self::readsData($sql);
        return $result;
    }
}
