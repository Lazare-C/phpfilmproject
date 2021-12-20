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


Route::add('/filmAdd', array($GLOBALS['isAdmin'],$func), 'get');


$filmAdd = function () {

    $dbConnection = new DBConnectionManager();
    $filmManager = new FilmManager($dbConnection->getPdo());

    $film = new Film(array('nom' => $_POST['nom'], 'annee' =>  $_POST['annee'], 'score' =>  $_POST['score'], 'nbVotants' =>  $_POST['nb_vote']));

    $ajout = $filmManager->add($film);
    $film->setId($dbConnection->getPdo()->lastInsertId());
    $filmManager->setImgSrc($film, $_FILES['imgsrc']);

    // $film->setImgSrc($_FILES['imgsrc']);

    if($ajout){
        $GLOBALS['succes'] = "L'ajout a réussi!";
     header('location: /film?id='. $film->getId());
    }else{
        echo $ajout;
    }

};


Route::add('/filmAdd', array($GLOBALS['isAdmin'],$filmAdd), 'post');
