<?php
include_once 'config.php';
spl_autoload_register(function ($className){
    $classFilePass = 'vendor'. DIRECTORY_SEPARATOR. $className. DIRECTORY_SEPARATOR. '.php';
    if(file_exists($classFilePass)){
        require_once $classFilePass;
        return true;
    }
    return false;
});
Router::init();