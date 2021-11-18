<?php
//TODO: FAIRE LA DBConnectionManager
class DBConnectionManager
{
    /**
     * @return PDO|void
     */
    function connectDB() : PDO {
        $host = getenv('HOST') ?: "127.0.0.1";
        $user = getenv('USER') ?: "root";
        $pwd = getenv('PSW') ?: "password";
        $db = getenv('DB') ?: "db";
        try {
            $bdd = new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8', $user,$pwd);
            return $bdd;
        }catch (Exception $e) {
            exit('Erreur : '.$e->getMessage());
        }
    }
}
