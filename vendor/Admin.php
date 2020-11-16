<?php


class Admin
{
    private $db;
    private $users;

    public function __construct()
    {
        $this->db = new mysqli(DB_HOST, DB_USERNAME, DB_PASS, DB_NAME);
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
                $_SESSION['check'] = true;
                return true;
            }
        }
        return false;
    }

    public function addNewUser()
    {
        $login = filter_input(INPUT_POST, 'userLogin');
        $queryLogin = "SELECT * FROM admin WHERE admin.login = '$login';";
        $result = $this->db->query($queryLogin);
        $row_cnt = mysqli_num_rows($result);

        if($row_cnt == 0){
            $pass = filter_input(INPUT_POST, 'userPassword');
            $confPass = filter_input(INPUT_POST, 'confPassword');  ////!!!!11
            if($pass === $confPass){
                $password = password_hash($pass, PASSWORD_DEFAULT);
                $query = "INSERT INTO admin (id, login, password) VALUES (NULL, '$login', '$password');";
                return $this->db->query($query);
            }
        }
        return false;
    }

    public function getAllUsers()
    {
        $query = "SELECT * FROM admin ;";
        $result = $this->db->query($query);
        if ($result) {
            while ($tmp = $result->fetch_assoc()) {
                $this->users[] = $tmp;
            }
            return $this->users;
        }
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM admin WHERE admin.id = $id;";
        return $this->db->query($query);
    }
}