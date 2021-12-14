<?php

/** @param string $layout
 * @param string $title
 * @var array $layout
 */
$layout = require(__DIR__ . '/../views/layout/default.php');

$func = function () use ($layout) {

    $content = "la data";
    $layout($content);
};

$auth = function () {
    echo "auth";
    $_SESSION["username"] = "PSEUDO";
    return true;
};

Route::add('/',$func, 'get');
