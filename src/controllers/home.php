<?php

/** @param string $layout
 * @param string $title
 * @var array $layout
 */
$layout = require(__DIR__ . '/../views/layout/default.php');

$func = function () use ($layout) {

    $content = "la data";
    $layout($content, "data");
};

$auth = function () {
    echo "auth";
    $_SESSION["username"] = "PSEUDO";
    return true;
};

Route::add('/', array($auth, $func), 'get');
