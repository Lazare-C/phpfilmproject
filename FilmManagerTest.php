<?php


use PHPUnit\Framework\TestCase;
require_once("models\Film.php");
require_once("models\FilmManager.php");
require_once("models\DBConnectionManager.php");
class FilmManagerTest extends TestCase
{

    public function testAdd()
    {
        echo(getcwd());
        $film = new Film(array("nom"=>"Petter Pain","annee"=>2000,"nb_vote"=>1234, "score"=>4321));

        fwrite(STDERR, print_r($film, TRUE));


        $manager = new FilmManager(new DBConnectionManager());
        $manager->add($film);



    }

    public function testGetList()
    {

    }

    public function testGet()
    {

    }

    public function testUpdate()
    {

    }
}
