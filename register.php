<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<nav class="relative select-none bg-grey lg:flex lg:items-stretch w-full">
    <div class="flex flex-no-shrink items-stretch h-12">
        <ul class="flex">
            <li class="mr-6">
                <a class="text-blue-500 hover:text-blue-800" href="film.php">Films</a>
            </li>
            <li class="mr-6">
                <a class="text-blue-500 hover:text-blue-800" href="acteur.php">Acteurs</a>
            </li>
            <li class="mr-6">
                <a class="text-blue-500 hover:text-blue-800" href="update_film.php">Modifier/ajouter film</a>
            </li>
            <li class="mr-6">
                <a class="text-blue-500 hover:text-blue-800" href="update_acteur.php">Modifier/ajouter acteur</a>
            </li>
        </ul>
    </div>
</nav>

<div>

<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'bd.php');

$var = connectDB;


$var.
