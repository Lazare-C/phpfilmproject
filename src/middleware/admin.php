<?php
$GLOBALS['isAdmin'] = function(): bool
{

    if($_SESSION['user']->isAdmin() == true){
        return true;
    }else{
        header('Location: /register');
        exit();
        return false;
    }
};

$GLOBALS['isNotAuth'] = function(): bool
{
    if($_SESSION['user']->isAdmin() == true){
        header('Location: /');
        exit();
        return false;
    }else{
        return true;
    }
};
