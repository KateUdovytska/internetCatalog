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
            if ($_POST['logout']) {
                $action = 'logout';
            } elseif (isset($_GET['category'])) {
                $action = 'category';
            }
            if (isset($_POST['login'])) {
                $action = 'login';
            } elseif (isset($_POST['price'])) {
                $action = 'add';
            } elseif (isset($_POST['delete_id'])) {
                $action = 'delete';
            } elseif (isset($_POST['delete_user_id'])) {
                $action = 'deleteUser';
            } elseif (isset($_POST['delete_category_id'])) {
                $action = 'deleteCategory';
            } elseif (isset($_POST['delete_user'])) {
                $action = 'deleteUser';
            } elseif (isset($_POST['userLogin'])) {
                $action = 'addUser';
            } elseif (isset($_POST['name'])) {
                $action = 'addCategory';
            }
        } elseif (isset($_GET['category'])) {
            $action = 'category';
        } elseif (isset($_GET['id'])) {
            $action = 'item';
        }
        // elseif ($_GET['extension'] == 'users'){
        //            $action = 'adminUsers'; //TODO check
        //        }
        $controller->$action();
    }
}