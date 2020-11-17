<?php
include_once 'config.php';
spl_autoload_register(function ($className) {
    $classFilePass = 'vendor' . DIRECTORY_SEPARATOR . $className . '.php';
    if (file_exists($classFilePass)) {
        require_once $classFilePass;
        return true;
    }
    return false;
});
Router::init();