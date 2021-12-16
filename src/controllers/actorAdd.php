<?php
/** @param string $layout
 * @param string $title
 * @var array $layout
 */
$layout = require(__DIR__ . '/../views/layout/default.php');
$actorView = (__DIR__ . '/../views/actorAdd.php');



$func = function () use ($actorView, $layout) {


    $layout($actorView);
};


Route::add('/actorAdd', $func, 'get');


$actorAdd = function () {

    $dbConnection = new DBConnectionManager();
    $actorManager = new ActorManager($dbConnection->getPdo());

    $actor = new Actor(array('nom' => $_POST['nom'], 'prenom' =>  $_POST['prenom']));
    $ajout = $actorManager->add($actor);
    $actor->setId($dbConnection->getPdo()->lastInsertId());

    if(!is_string($ajout)){
        $GLOBALS['succes'] = "L'ajout a réussi!";
        header('location: /actor?id='. $actor->getId());
    }else{
        echo $ajout;
    }

};


Route::add('/actorAdd', $actorAdd, 'post');
