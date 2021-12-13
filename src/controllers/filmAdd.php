<?php
/** @param string $layout
 * @param string $title
 * @var array $layout
 */
$layout = require(__DIR__ . '/../views/layout/default.php');
$filmView = (__DIR__ . '/../views/filmAdd.php');



$func = function () use ($filmView, $layout) {


    $layout($filmView);
};


Route::add('/filmAdd', $func, 'get');


$filmAdd = function () {

    $dbConnection = new DBConnectionManager();
    $filmManager = new FilmManager($dbConnection->getPdo());
    
    $film = new Film(array('nom' => $_POST['nom'], 'annee' =>  $_POST['annee'], 'score' =>  $_POST['score'], 'nb_vote' =>  $_POST['nb_vote'], 'imgsrc' =>  $_POST['imgsrc']));

    $ajout = $filmManager->add($film);
    
    if(!is_string($ajout)){
     echo "ajout réussi";
    }else{
        echo $ajout;
    }

};


Route::add('/filmAdd', $filmAdd, 'post');
