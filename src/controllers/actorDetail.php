<?php


/** @param string $layout
 * @param string $title
 * @var array $layout
 */
$layout = require(__DIR__ . '/../views/layout/default.php');
$actorView = (__DIR__ . '/../views/actorDetail.php');


$func = function () use ($actorView, $layout) {

    $dbConnection = new DBConnectionManager();
    $actorManager = new ActorManager($dbConnection->getPdo());
    $castingManager = new CastingManager($dbConnection->getPdo());


    if($_GET['id'] != null && is_numeric($_GET['id'])) {
        $GLOBALS['actor'] = $actorManager->get($_GET['id']);
        $GLOBALS['casting']['films'] = $castingManager->castingByActor($GLOBALS['actor']);
        if($GLOBALS['actor'] != null) {
            $layout($actorView);
        }else{
            echo "error actor non trouvé";
        }
    }else{
        echo "error";
    }
};
Route::add('/actor', $func, 'get');
