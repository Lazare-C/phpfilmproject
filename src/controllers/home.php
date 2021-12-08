<?php

/** @var array $layout
 *@param string $layout
 *@param string $title
 */
$layout =require ( $_SERVER['DOCUMENT_ROOT'].'/views/layout/default.php');

$func = function() use ($layout) {

    $content = "la data";
    $layout($content, "data");
};

$auth = function(){
echo "auth";
return false;

};

Route::add('/',array($auth, $func), 'get');
