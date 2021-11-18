<?php

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
        include 'film.php';
        break;
}
?>