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

  public function add(Actor $actor, array $img = [])
  {
    $q = $this->_db->prepare('INSERT INTO acteurs(nom, prenom) VALUES(:nom, :prenom)');

    $q->bindValue(':nom', $actor->getNom());
    $q->bindValue(':prenom', $actor->getPrenom());
    $result = $q->execute();
      if($result){
          if($img) self::setImgSrc($actor, $img);
          return(true);
      }else{
          return false;
      }

  }

  //TODO Marche pas
  public function delete(Actor $actor): bool
  {
      $q = $this->_db->prepare('DELETE FROM acteurs WHERE id = :id');
      $q->bindValue(':id', $actor->getId());
      $result = $q->execute();
      if($result){
          self::deleteImgSrc($actor->getId());
          return true;
      }else{
          return false;
      }
  }

    public function get($id): ?Actor
    {
        $id = (int) $id;
        $q = $this->_db->prepare('SELECT * FROM acteurs WHERE id =:idactor');
        $q->bindValue(':idactor', $id);

        try {
            $q->execute();
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            $actor = new Actor($donnees);
            $actor->setImgSrc(self::getImgSrc($id));
            return $actor;
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
        $donnees['imgsrc'] = self::getImgSrc( $donnees['id']);
      $actors[] = new Actor($donnees);
    }

    return $actors;
  }

  //TODO Marche pas
  public function update(Actor $actor, array $img = [])
  {
    $q = $this->_db->prepare('UPDATE acteurs SET nom = :nom, prenom = :prenom WHERE id = :id');

    $q->bindValue(':nom', $actor->getNom());
    $q->bindValue(':prenom', $actor->getPrenom());
    $q->bindValue(':id', $actor->getId());
      $result = $q->execute();
      if($result){
          if($img) self::setImgSrc($actor, $img);
          return($q->execute());
      }else{
          return false;
      }
  }




    /**
     * @param $img_src
     */
    public function setImgSrc(Actor $actor, array $img_src): void
    {
        if(!$img_src) return;
        if($actor->getId() == null) echo "error id null";

        if($img_src['size'] < 500000000 && $img_src['type'] == "image/png" ||$img_src['type'] == "image/jpeg" ) {

            if ($img_src) $this->img_src = $img_src;

            move_uploaded_file($img_src['tmp_name'], 'static/actor/' . $actor->getId() . '.png');

            // echo "le fichier a éjé ajouté: ". 'static/film/' . self::getId() . '.png';
        }      else{
            $GLOBALS['succes'] = "Modification échoué !";;
        }
    }

    /**
     * @return string
     */
    public function getImgSrc($id)
    {
        // if(isset($id) && $id !=null) $id = $film->getId();

        if(file_exists('static/actor/'. $id .'.png')) {
            return 'static/actor/' .$id . '.png';
        }
        else {
            return 'static/actor/default.png';
        }
    }

    /**
     * @return bool
     */
    public function deleteImgSrc($id): bool
    {

        if(file_exists('static/actor/'. $id .'.png')) {
            unlink('static/actor/' .$id . '.png');
            return true;
        }
        else {
            return false;
        }
    }


}
