<?php

class UserManager
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

    public function add(User $user)
    {
        try {
            $q = $this->_db->prepare('SELECT * FROM User WHERE login = :idUser');
            $q->bindValue(':idUser', $user->getUsername());
            $q->execute();
            if($q->fetch() !=null){
               return 'Username already exist';
            }
        }catch (Error $e){
            return 'une erreur:' . $e;
        }
        $q = $this->_db->prepare('INSERT INTO User(login, email, pwd) VALUES(:login, :email, :pwd)');
        $q->bindValue(':login', $user->getUsername());
        $q->bindValue(':email', $user->getEmail());
        $q->bindValue(':pwd', self::encrypt($user->getPassword()));
       // $q->bindValue(':vote', $user->getImgSrc());

        if($q->execute() == true) {
            return $user;
        }else{
            return 'Une erreur est survenue';
        }


    }

    //TODO PAS FAIT

    public static function encrypt($password) :string {
        return password_hash($password, PASSWORD_DEFAULT);
    }


    public function login(User $user)
    {
        $q = $this->_db->prepare('SELECT * FROM User WHERE login = :idUser');
        $q->bindValue(':idUser', $user->getUsername());

        try {
            $q->execute();
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            print_r($donnees);
            if($donnees == null){
                    return 'User not found';
                }

            print_r( 'password hasé: '.$donnees['pwd']);
            print_r('mdp tapé: ' . $user->getPassword());
            if(self::isValidPassword($user->getPassword(), $donnees['pwd'])){
                return new User($donnees);
            }else{
                return 'Bad Password';
            }
        }catch (Error $e){
            return 'Bad Username';
        }
    }

    public static function isValidPassword($password, $hash) :bool {

        if(password_verify($password, $hash)){
            return true;
        }else{
            return false;
        }

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

