<?php
//TODO faire le casting et la table d'association
class Casting
{
    /**
     * @var FIlm $movie
     * @var Actor $actor
     */
    protected $movie, $actor;


    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {

        $this->setNom($donnees['nom']);
        $this->setPrenom($donnees['prenom']);
        $this->setId($donnees['id']);
    }


}
