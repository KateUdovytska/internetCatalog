<?php


class Router
{
    static public function redirect()
    {
        header('Location: ' . $_SERVER['PHP_SELF']);
    }

    static public function init()
    {
        $controller = new Controllers();
        $action = 'main';
        if ($_GET['page'] === 'admin') {
            $action = 'admin';
        } elseif (isset($_GET['category'])) {
            $action = 'category';
        } elseif (isset($_GET['id'])) {
            $action = 'item';
        }
        $controller->$action();
    }
}