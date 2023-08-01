<?php
class Auth extends Main
{

    public function createUser($email, $hashed_password)
    {
        $sql = "INSERT INTO `user` (`email`, `password_hash`) VALUES ('{$email}', '{$hashed_password}')";
        $result = self::createData($sql);
        return $result;
    }


    public function isEmailInUse($email)
    {
        $sql = "SELECT `email` FROM `user` WHERE `email` = '{$email}'";
        $result = self::readData($sql);

        if ($result->rowCount() == 1) {
            echo "Email is already in use!";
            return $result;
            exit;
        } else {
            return true;
        }
    }

    public function verifyUser($email, $password)
    {

        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = self::readsData($sql);
        $result = $result->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return false;
        }

        if (password_verify($password, $result['password_hash'])) {

            $_SESSION['user'] = (object)array(
                'id' => $result['id'],
            );

            return $result;
        } else {
            return false;
        }
    }
}
