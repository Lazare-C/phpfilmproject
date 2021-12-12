<?php
/** @param string $layout
 * @param string $title
 * @var array $layout
 */
$layout = require(__DIR__ . '/../views/layout/default.php');
$registerView = (__DIR__ . '/../views/register.php');



$func = function () use ($registerView, $layout) {


    $layout($registerView);
};


Route::add('/register', $func, 'get');


$register = function () {

    $dbConnection = new DBConnectionManager();
    $userManager = new UserManager($dbConnection->getPdo());

    $user = new User(array('username' => $_POST['username'], 'password' =>  $_POST['password'], 'email' =>  $_POST['email']));


    $ajout = $userManager->add($user);
    if(!is_string($ajout)){
     echo "ajout réussi";
        $_SESSION['user'] = $ajout;
        header('Location: /');
    }else{
        echo $ajout;
    }

};


Route::add('/register', $register, 'post');
