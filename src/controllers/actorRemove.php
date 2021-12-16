<?php


$layout = require(__DIR__ . '/../views/layout/default.php');
$actorRemoveView = (__DIR__ . '/../views/actorRemove.php');

$func = function () use ($actorRemoveView, $layout) {

    $dbConnection = new DBConnectionManager();
    $actorManager = new ActorManager($dbConnection->getPdo());

    if($_GET['id'] != null && is_numeric($_GET['id'])) {
        $GLOBALS['actor'] = $actorManager->get($_GET['id']);
        if($GLOBALS['actor'] != null) {
            $layout($actorRemoveView);
        }else{
            echo "error acteur non trouvé";
        }
    }else{
        echo "error";
    }
};
Route::add('/actorRemove', array($GLOBALS['isAdmin'],$func), 'get');


$actorRemove = function () {

    $dbConnection = new DBConnectionManager();
    $actorManager = new ActorManager($dbConnection->getPdo());
    $toRemove = $actorManager->get($_GET['id']);
    $castingManager = new CastingManager($dbConnection->getPdo());

    $castingManager->deleteActor($toRemove);
    $ajout = $actorManager->delete($toRemove);
    if($ajout){
        $GLOBALS['succes'] = "La suppression a été effectuée";
        header('location: /films');
    }else{
        $GLOBALS['error'] = "La suppression n'a pas abouti";
        echo $ajout;
    }

};


Route::add('/actorRemove', array($GLOBALS['isAdmin'],$actorRemove), 'post');
