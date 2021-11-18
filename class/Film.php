<?php

class Film
{
    protected $id,
        $nom,
        $annee,
        $nb_vote,
        $score;

    /**
     * @param $id
     * @param $nom
     * @param $annee
     * @param $nb_vote
     * @param $score
     */
    public function __construct($id, $nom, $annee, $nb_vote, $score)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->annee = $annee;
        $this->nb_vote = $nb_vote;
        $this->score = $score;
    }


    public function __constructWithArray(array $donnees)
    {
        $this->hydrate($donnees);
    }





    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    public function nomValide()
    {
        return !empty($this->nom);
    }

    public function nom()
    {
        return $this->nom;
    }

    public function annee()
    {
        return $this->annee;
    }

    public function score()
    {
        return $this->score;
    }

    public function vote()
    {
        return $this->nb_vote;
    }

    public function id()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $id = (int) $id;

        if ($id > 0)
        {
            $this->id = $id;
        }
    }

    public function setNom($nom)
    {
        if (is_string($nom) && $this->nomValide())
        {
            $this->nom = $nom;
        }
    }

    public function setNb_vote()
    {
        $this->nb_vote++;
    }

    public function setScore($score)
    {
        $score = floatval($score);
        if ($score  > 0) {
            $this->score = $score;
        }
    }
}
