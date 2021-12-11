<?php

//import du routeur
include_once (__DIR__.'/core/Route.php');
//import des controlleurs
foreach (glob(__DIR__.'/controllers/*.php') as $filename)
{
    include $filename;
}
//import des models
foreach (glob(__DIR__.'/models/*.php') as $filename)
{
    include $filename;
}
//import des utils
include_once (__DIR__.'/utils/environment.php');
addDotEnv(".env");


Route::add('/test',function(){
    echo 'Welcome :-)';
});

Route::run('/');

?>

