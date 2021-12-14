<?php
$GLOBALS['isAuth'] = function(): bool
{

    if($_SESSION['user']){
        return true;
    }else{
        header('Location: /register');
        exit();
        return false;
    }
};

$GLOBALS['isNotAuth'] = function(): bool
{
    if($_SESSION['user']){
        header('Location: /');
        exit();
        return false;
    }else{
        return true;
    }
};
