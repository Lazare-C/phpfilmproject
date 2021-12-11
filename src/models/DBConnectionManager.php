<?php
//TODO: FAIRE LA DBConnectionManager
class DBConnectionManager
{


    /**
     * @var PDO
     */
    protected $pdo;


    public function __construct()
    {
        $pdo = $this->connectDB();
    }


    /**
     * @return PDO|void
     */
    function connectDB() : PDO {
        $host = getenv('HOST') ?: "127.0.0.1";
        $user = getenv('USER') ?: "root";
        $pwd = getenv('PSW') ?: "";
        $db = getenv('DB') ?: "db";
        try {
            return new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8', $user,$pwd);
        }catch (Exception $e) {
            exit('Erreur : '.$e->getMessage());
        }
    }

    /**
     * @return PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }


}
