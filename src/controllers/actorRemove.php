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

    $ajout = $actorManager->update($toRemove);
    if(!is_string($ajout)){
     echo "ajout réussi";
    }else{
        echo $ajout;
    }

};


Route::add('/actorRemove', array($GLOBALS['isAdmin'],$actorRemove), 'post');
 