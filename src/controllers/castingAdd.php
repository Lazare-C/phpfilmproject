<?php


/** @param string $layout
 * @param string $title
 * @var array $layout
 */
$layout = require(__DIR__ . '/../views/layout/default.php');
$filmView = (__DIR__ . '/../views/castingAdd.php');


$func = function () use ($filmView, $layout) {

    $dbConnection = new DBConnectionManager();
    $filmManager = new FilmManager($dbConnection->getPdo());
    $actorsManager = new ActorManager($dbConnection->getPdo());
    $castingManager = new CastingManager($dbConnection->getPdo());
    $GLOBALS['actors'] = $actorsManager->getList();


    if($_GET['id'] != null && is_numeric($_GET['id'])) {
        $GLOBALS['film'] = $filmManager->get($_GET['id']);
        if($GLOBALS['film'] != null) {
            $layout($filmView);
        }else{
            echo "error film non trouvé";
        }
    }else{
        echo "error";
    }
};
Route::add('/castingAdd', $func, 'get');

$castingAdd = function () use ($filmView, $layout) {





    $dbConnection = new DBConnectionManager();
    $filmManager = new FilmManager($dbConnection->getPdo());
    $castingManager = new CastingManager($dbConnection->getPdo());

    $film = $filmManager->get($_GET['id']);
    foreach ($_POST['acteur'] as $actor) {

        $actor = new Actor(array('id' => $actor));
        //print_r($actor);
        //  print_r($film);
        $castingManager->add($actor, $film);


    }
    header('Location: /film?id=' . $film->getId());

};

Route::add('/castingAdd', $castingAdd, 'post');
