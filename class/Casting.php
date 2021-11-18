<?php

class Casting
{
    private $film;
    private $acteur;

    /**
     * @param $film
     * @param $acteur
     */
    public function __construct($film, $acteur)
    {
        $this->film = $film;
        $this->acteur = $acteur;
    }

    /**
     * @return Film
     */
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * @param Film $film
     */
    public function setFilm($film): void
    {
        $this->film = $film;
    }

    /**
     * @return Actor
     */
    public function getActeur()
    {
        return $this->acteur;
    }

    /**
     * @param Actor $acteur
     */
    public function setActeur($acteur): void
    {
        $this->acteur = $acteur;
    }



}
