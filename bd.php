<?php

function connectDB() {
    $host = '192.168.189.128';
    $user = 'root';
    $db = 'phpdb';
    $pwd = 'php';
    try {
        $bdd = new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8', $user,$pwd);
        return $bdd;
    }catch (Exception $e) {
        exit('Erreur : '.$e->getMessage());
    }
}
