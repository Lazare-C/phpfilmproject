<?php


$layout = require(__DIR__ . '/../views/layout/default.php');
$actorView = (__DIR__ . '/../views/actorEdit.php');

$func = function () use ($actorView, $layout) {

    $dbConnection = new DBConnectionManager();
    $actorManager = new ActorManager($dbConnection->getPdo());

    if($_GET['id'] != null && is_numeric($_GET['id'])) {
        $GLOBALS['actor'] = $actorManager->get($_GET['id']);
        if($GLOBALS['actor'] != null) {
            $layout($actorView);
        }else{
            echo "error acteur non trouvé";
        }
    }else{
        echo "error";
    }
};
Route::add('/actorEdit', array($GLOBALS['isAdmin'],$func), 'get');


$actorEdit = function () {

    $dbConnection = new DBConnectionManager();
    $actorManager = new ActorManager($dbConnection->getPdo());
    $actor = new Actor(array('id'=>$_GET['id'],'nom' => $_POST['nom'], 'prenom' =>  $_POST['prenom'],'imgsrc' =>  $_POST['imgsrc']));

    $ajout = $actorManager->update($actor);
    if(!is_string($ajout)){
        $GLOBALS['succes'] = "Modification réussie!";
     header('location: /actor?id='. $actor->getId());
    }else{
        echo $ajout;
    }

};


Route::add('/actorEdit', array($GLOBALS['isAdmin'],$actorEdit), 'post');
 