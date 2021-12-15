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
  }

  public function add(Film $film)
  {
    $q = $this->_db->prepare('INSERT INTO film(nom, annee, score, nbVotants) VALUES(:nom, :annee, :score, :nb_vote)');
    $q->bindValue(':nom', $film->getNom());
    $q->bindValue(':annee', $film->getAnnee());
    $q->bindValue(':score', $film->getScore());
    $q->bindValue(':nb_vote', $film->getNbVote());

    $q->execute();
  }


  //TODO PAS FAIT
  public function delete(Film $film): bool
  {
      $q = $this->_db->prepare('DELETE FROM film WHERE id = :id');
      $q->bindValue(':id', $film->getId());
      return $q->execute();
  }

  public function get($id): ?Film
  {
    $id = (int) $id;
      $q = $this->_db->prepare('SELECT * FROM film WHERE id =:idFilm');
      $q->bindValue(':idFilm', $id);

      try {
          $q->execute();
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
      $films[] = new Film($donnees);
    }

    return $films;
  }

  public function update(Film $film)
  {
    $q = $this->_db->prepare('UPDATE film SET nom = :nom, annee = :annee, score = :score, nbVotants = :vote WHERE id = :id');

    $q->bindValue(':nom', $film->getNom());
    $q->bindValue(':annee', $film->getAnnee());
    $q->bindValue(':score', $film->getScore());
    $q->bindValue(':vote', $film->getNbVote());
    $q->bindValue(':id', $film->getId());

    $q->execute();
  }

}
