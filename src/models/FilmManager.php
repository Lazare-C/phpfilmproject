<?php
class FilmManager
{

    /**
     * @var PDO $_db
     */
    private $_db; // Instance de PDO
  public function __construct(PDO $db)
  {
    $this->_db = $db;
    print_r($this->_db);
  }

  public function add(Film $film)
  {
    $q = $this->_db->prepare('INSERT INTO film(nom, annee, score, vote) VALUES(:nom, :annee, :score, :vote)');

    $q->bindValue(':nom', $film->getNom());
    $q->bindValue(':annee', $film->getAnnee());
    $q->bindValue(':score', $film->getScore());
    $q->bindValue(':vote', $film->getNbVote());

    $q->execute();
  }

  public function delete(Film $film): bool
  {
      $q = $this->_db->prepare('DELETE FROM film(WHERE id = vid) VALUES(:vid');
      $q->bindValue(':vid', $film->getId());
      return $q->execute();
  }

  public function get($id): ?Film
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT * FROM film WHERE id = '.$id);

      try {
          $donnees = $q->fetch(PDO::FETCH_ASSOC);
          return new Film($donnees);
      }catch (Error $e){
          return null;
  }
  }

    /**
     * @return Film
     */
  public function getList()
  {
      /* @var Film $films */
      $films = [];
      $q = $this->_db->query('SELECT * FROM film ORDER BY nom');

      while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
        print_r($donnees);
      $films[] = new Film($donnees);
    }

    return $films;
  }

  public function update(Film $film)
  {
    $q = $this->_db->prepare('UPDATE film SET nom = :nom, annee = :annee, score = :score, vote = :vote WHERE id = :id');

    $q->bindValue(':nom', $film->getNom());
    $q->bindValue(':annee', $film->getAnnee());
    $q->bindValue(':score', $film->getScore());
    $q->bindValue(':vote', $film->getNbVote());
    $q->bindValue(':id', $film->getId());

    $q->execute();
  }

}
