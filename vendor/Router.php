<?php


class Router
{
    static public function redirect()
    {
        header('Location: ' . $_SERVER['PHP_SELF'] . '?page=admin');
    }

    static public function init()
    {
        session_start();
        $controller = new Controllers();
        $action = 'main';
        if ($_GET['page'] === 'admin') {
            $action = 'admin';
            if (isset($_POST['login'])) {
                $action = 'login';
            } elseif (isset($_POST['price'])) {
                $action = 'add';
            } elseif (isset($_POST['delete_id'])) {
                $action = 'delete';
            } elseif ($_GET['extension'] == 'users'){
                $action = 'adminUsers';
            }
        } elseif (isset($_GET['category'])) {
            $action = 'category';
        } elseif (isset($_GET['id'])) {
            $action = 'item';
        }
        $controller->$action();
    }
}