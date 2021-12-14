<?php


/** @param string $layout
 * @param string $title
 * @var array $layout
 */
$layout = require(__DIR__ . '/../views/layout/default.php');
$actorsView = (__DIR__ . '/../views/actors.php');



$func = function () use ($actorsView, $layout) {

    $dbConnection = new DBConnectionManager();
    $actorsManager = new ActorManager($dbConnection->getPdo());
    $GLOBALS['actors'] = $actorsManager->getList();
    $layout($actorsView);
};


Route::add('/actors', $func, 'get');
