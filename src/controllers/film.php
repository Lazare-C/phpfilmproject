<?php

/** @var array $layout
 *@param string $layout
 *@param string $title
 */

$layout =require ($_SERVER['DOCUMENT_ROOT'].'/views/layout/default.php');
$func = function() use ($layout) {
    
    $host="localhost";
    $servername = "db";
    $username = "root";
    $password = "";

    $conn = new mysqli($host, $username, $password,$servername);
    
    $query = "SELECT * FROM film ORDER BY nom";  
    $st = $conn->prepare( $query );  

    $st->execute();  
    $rows = $st->fetchAll();  
    foreach ( $rows as $row )  
{  
        $Film = (object)array();   
        $Film->Name = $row[ 'nom' ];  
        $Film->Score = $row[ 'score' ];  

        array_push( $ret, $Film );  
} 
    $content = "la data";
    $layout($content, "data");
};

$auth = function(){
echo "auth";
return true;

};

Route::add('/',array($auth, $func), 'get');
