<?php

class Film
{
    protected $id,
        $nom,
        $annee,
        $nb_vote,
        $score,
        $img_src;

    public function __construct(array $donnees)
    {

        $this->hydrate($donnees);


    }

    public function hydrate(array $donnees)
    {

        $this->setNom($donnees['nom']);
        $this->setAnnee($donnees['annee']);
        $this->setScore($donnees['score']);
        $this->setNb_vote($donnees['nbVotants']);
        $this->setId($donnees['id']);

        if(isset($donnees['imgsrc'])){
            if($donnees['imgsrc']['size'] < 50000 && $donnees['imgsrc']['type'] == "image/png" ||$donnees['imgsrc']['type'] == "image/jpeg" ){

                $this->setImgSrc($donnees['imgsrc']);

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

    /**
     * @return string
     */
    public function getImgSrc()
    {
        if(file_exists('static/film/'. $this->getId() .'.png')) {
            return 'static/film/' . $this->getId() . '.png';
        }
        else {
            return 'static/film/default.png';
        }
    }

    /**
     * @param string $img_src
     */
    public function setImgSrc($img_src): void
    {
        if($img_src) $this->img_src = $img_src;

        move_uploaded_file($img_src['tmp_name'], 'static/film/'. self::getId(). '.png');

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
        if (is_string($nom))
        {
            $this->nom = $nom;
        }
    }

    public function setAnnee($annee)
    {
        if($annee > 1800){
            $this->annee = $annee;
        }
    }

    public function setNb_vote($nb_vote)
    {
        $this->nb_vote = $nb_vote;
    }

    public function addVote()
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

    public function __toString()
    {
       return ("Le film: " . self::getNom(). " avec l'id: " . self::getId());
    }

}
