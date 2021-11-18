<?php
class PersonnagesManager
{
  private $_db; // Instance de PDO
  public function __construct($db)
  {
    $this->_db = $db;
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

  public function delete(Film $film)
  {
      $q = $this->_db->prepare('DELETE FROM film(WHERE id = vid) VALUES(:vid');
      $q->bindValue(':vid', $film->getId());
  }

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT * FROM film WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new Film($donnees);
  }

  public function getList(): FilmRepository
  {
    $films = new FilmRepository;

    $q = $this->_db->query('SELECT * FROM film ORDER BY nom');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $films->add(new Film($donnees));
    }

    return $films;
  }

  public function update(Film $film)
  {
    $q = $this->_db->prepare('UPDATE film SET nom = :nom, annee = :annee, score = :score, vote = :vote WHERE id = :id');

    $q->bindValue(':nom', $film->nom());
    $q->bindValue(':annee', $film->annee());
    $q->bindValue(':score', $film->score());
    $q->bindValue(':vote', $film->vote());
    $q->bindValue(':id', $film->id());

    $q->execute();
  }

}
