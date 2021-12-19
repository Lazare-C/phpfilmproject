<?php
class ActorManager
{

    /**
     * @var PDO $_db
     */
    private $_db; // Instance de PDO
  public function __construct(PDO $db)
  {
    $this->_db = $db;
  }

  public function add(Actor $actor)
  {
    $q = $this->_db->prepare('INSERT INTO acteurs(nom, prenom) VALUES(:nom, :prenom)');

    $q->bindValue(':nom', $actor->getNom());
    $q->bindValue(':prenom', $actor->getPrenom());
    return $q->execute();

  }

  //TODO Marche pas
  public function delete(Actor $actor): bool
  {
      $q = $this->_db->prepare('DELETE FROM acteurs WHERE id = :id');
      $q->bindValue(':id', $actor->getId());
      return $q->execute();
  }

  public function get($id): ?Actor
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT * FROM acteurs WHERE id = '.$id);

      try {
          $donnees = $q->fetch(PDO::FETCH_ASSOC);
          return new Actor($donnees);
      }catch (Error $e){
          return null;
  }
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

    return $q->execute();
  }

}
