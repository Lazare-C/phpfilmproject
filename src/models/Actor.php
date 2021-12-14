<?php

class Actor
{
    protected $id,
        $nom,
        $prenom,
        $img_src;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }


    public function hydrate(array $donnees)
    {

        $this->setNom($donnees['nom']);
        $this->setPrenom($donnees['prenom']);
        $this->setId($donnees['id']);
        if($donnees['img_src'])  $this->setImgSrc($donnees['img_src']);


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
    public function getPrenom()
    {
        return $this->prenom;
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

    public function setPrenom($prenom)
    {
        if (is_string($prenom)){
            $this->prenom = $prenom;
        }
    }

    /**
     * @return string
     */
    public function getImgSrc()
    {
        if(file_exists('static/actor/'. $this->getId() .'.png')) {
            return 'static/actor/' . $this->getId() . '.png';
        }
        else {
            return 'static/actor/default.png';
        }
    }

    /**
     * @param string $img_src
     */
    public function setImgSrc($img_src): void
    {
        if($img_src) $this->img_src = $img_src;


    }


    public function __toString()
    {
       return ("L'acteur': " . self::getNom(). self::getPrenom()." avec l'id: " . self::getId());
    }

}
