<?php


class Admin
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli(DB_HOST, DB_USER_NAME, DB_PASSWORD, DB_NAME);
    }

    public function checkLoginAndPass()
    {
        $login = filter_input(INPUT_POST, 'login');
        $pass = filter_input(INPUT_POST, 'password');
        $query = "SELECT * FROM admin WHERE login='$login';";
        $result = $this->db->query($query);
        $tmp = $result->fetch_assoc();
        if (!empty($tmp)) {
            $hash = $tmp['password'];
            $ver = password_verify("$pass", $hash);
            if ($ver) {
                return true;
            }
        }
        return false;
    }
}