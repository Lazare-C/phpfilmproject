<?php
include_once ("controllers/Route.php");

include_once('controllers/home.php');



Route::add('/login',function(){
    echo 'Welcome :-)';
});

Route::run('/');




/*
switch ($_SERVER['REQUEST_URI']) {
    case '/film':
        include 'film.php';
        break;
    case '/acteur':
        include 'acteur.php';
        break;
    case '/register':
        include 'register.php';
        break;
    case '/login':
        include 'login.php';
        break;
    case '/update_acteur':
        include 'update_acteur.php';
        break;
    case '/update_film':
        include 'update_film.php';
        break;
    default:
        include 'controllers/home.php';
        break;
}*/
?>

