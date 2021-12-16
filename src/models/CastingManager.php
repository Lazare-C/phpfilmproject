<?php

class CastingManager

{

    /**
     * @var PDO $_db
     */
    private $_db; // Instance de PDO
    public function __construct(PDO $db)
    {
        $this->_db = $db;
    }

    public function add(Actor $actor, Film $film)
    {
        $q = $this->_db->prepare('INSERT INTO Casting(film_id, acteur_id) VALUES(:film_id, :acteur_id)');

        $q->bindValue(':film_id', $film->getId());
        $q->bindValue(':acteur_id', $actor->getId());
        $q->execute();
    }

    public function castingByActor(Actor $actor) : array
    {
        $q = $this->_db->prepare('SELECT * FROM Casting LEFT JOIN film on Casting.film_id = film.id WHERE Casting.acteur_id = :id');
        $q->bindValue(':id', $actor->getId(), PDO::PARAM_INT);
        $q->execute();
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        $casting = array();
        if($data) {
            foreach ($data as $film) {
                $casting[] = new Film($film);
            }
            return $casting;
        }
        return array();
    }

    public function castingByFilm(Film $film) : array
    {
        $q = $this->_db->prepare('SELECT * FROM Casting LEFT JOIN acteurs on Casting.acteur_id = acteurs.id WHERE Casting.film_id = :id');
        $q->bindValue(':id', $film->getId(), PDO::PARAM_INT);
        $q->execute();
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        $casting = array();
        if($data) {
            foreach ($data as $actor) {
                $casting[] = new Actor($actor);
            }
            return $casting;
        }else{
            return array();
        }
    }



    //TODO Marche certainement
    public function delete(Actor $actor, Film $film): bool
    {
        $q = $this->_db->prepare('DELETE FROM Casting WHERE acteur_id = :acteurid AND film_id = :filmid');
        $q->bindValue(':acteurid', $actor->getId());
        $q->bindValue(':filmid', $film->getId());
        return $q->execute();
    }

    public function deleteActor(Actor $actor): bool
    {
        $q = $this->_db->prepare('DELETE FROM Casting WHERE acteur_id = :acteurid');
        $q->bindValue(':acteurid', $actor->getId());
        return $q->execute();
    }

    public function deleteFilm(Film $film): bool
    {
        $q = $this->_db->prepare('DELETE FROM Casting WHERE film_id = :filmid');
        $q->bindValue(':filmid', $film->getId());
        return $q->execute();
    }


    /**
     * @return Actor
     */
    public function getList()
    {
        /* @var Actor $actors */
        $actors = [];
        $q = $this->_db->query('SELECT * FROM acteurs ORDER BY nom');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $actors[] = new Actor($donnees);
        }

        return $actors;
    }

    //TODO Marche pas
    public function update(Actor $actor)
    {
        $q = $this->_db->prepare('UPDATE acteurs SET nom = :nom, prenom = :prenom WHERE id = :id');

        $q->bindValue(':nom', $actor->getNom());
        $q->bindValue(':prenom', $actor->getPrenom());
        $q->bindValue(':id', $actor->getId());

        $q->execute();
    }

}

