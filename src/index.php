<?php

//import du routeur
include_once (__DIR__.'/core/Route.php');
//import des controlleurs
foreach (glob(__DIR__.'/controllers/*.php') as $filename)
{
    include $filename;
}
//define

foreach (glob(__DIR__.'/controllers/*.php') as $filename)
{
    include $filename;
}


Route::add('/login',function(){
    echo 'Welcome :-)';
});

Route::run('/');

?>

