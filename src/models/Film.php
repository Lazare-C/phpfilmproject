<?php

class Film
{
    protected $id,
        $nom,
        $annee,
        $nb_vote,
        $score;




    public function __construct(array $donnees)
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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * @return mixed
     */
    public function getNbVote()
    {
        return $this->nb_vote;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
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
