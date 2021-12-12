<?php
/** @param string $layout
 * @param string $title
 * @var array $layout
 */
$layout = require(__DIR__ . '/../views/layout/default.php');
$loginView = (__DIR__ . '/../views/login.php');


$func = function () use ($loginView, $layout) {

    $layout($loginView);
};


Route::add('/login', $func, 'get');


$login = function () {

    $dbConnection = new DBConnectionManager();
    $userManager = new UserManager($dbConnection->getPdo());

    $user = new User(array('username' => $_POST['username'], 'password' =>  $_POST['password'], 'email' =>  $_POST['email']));


    $connexion = $userManager->login($user);
    if(!is_string($connexion)){
        echo "ajout réussi";
        $_SESSION['user'] = $connexion;
        header('Location: /');
    }else{
        echo $connexion;
    }

};


Route::add('/login', $login, 'post');

Route::add('/logout', function(){
    session_destroy();
    header('Location: /');
}, 'get');

