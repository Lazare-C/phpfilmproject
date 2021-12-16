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

        if(isset($donnees['imgsrc']) && self::getId()){

              $this->setImgSrc($donnees['imgsrc']);

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
     * @param $img_src
     */
    public function setImgSrc($img_src): void
    {
        if(self::getId() == null) echo "id null";

        if($img_src['size'] < 500000000 && $img_src['type'] == "image/png" ||$img_src['type'] == "image/jpeg" ) {

            if ($img_src) $this->img_src = $img_src;

            move_uploaded_file($img_src['tmp_name'], 'static/film/' . self::getId() . '.png');

           // echo "le fichier a éjé ajouté: ". 'static/film/' . self::getId() . '.png';
        }      else{
            echo "erreur sur le fichier";
        }
    }

    public function setId($id)
    {
            $this->id = $id;

    }

    public function setNom($nom)
    {

            $this->nom = $nom;

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
