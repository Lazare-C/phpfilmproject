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
<nav class="relative  select-none bg-grey lg:flex lg:items-stretch w-full">
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

$bdd = connectDB();

$sth = $bdd->prepare("SELECT f.id, f.nom titre, f.annee, f.score, f.nbVotants, a.nom, a.prenom FROM `film` f LEFT JOIN Casting c ON f.id = c.film_id LEFT JOIN acteurs a ON c.acteur_id = a.id");
$sth->execute();
$result = $sth->fetchAll(\PDO::FETCH_GROUP);
?>
<table class="table-auto border-collapse border border-green-800">
    <tr>
        <?
        echo("<th class='border border-green-600 mx-16'>" . "Titre" . "</th>");
        echo("<th class='border border-green-600'>" . "Annee" . "</th>");
        echo("<th class='border border-green-600'>" . "Score" . "</th>");
        echo("<th class='border border-green-600'>" . "Nombre votant" . "</th>");
        echo("<th class='border border-green-600'>" . "Acteur" . "</th>");
        ?>
    </tr>
<?

foreach ($result as $key=>$value){

    echo ("<tr>");
    echo("<td class='border border-green-600'>" . $value[0]['titre'] . "</td>");
     echo("<td class='border border-green-600'>" . $value[0]['annee'] . "</td>");
    echo("<td class='border border-green-600'>" . $value[0]['score'] . "</td>");
    echo("<td class='border border-green-600'>" . $value[0]['nbVotants'] . "</td>");
    echo("<td class='border border-green-600'>");

foreach ($value as $k=>$v) {

    if($v['nom'] && $v['prenom']) {
        echo(strtoupper($v['nom']). " ".$v['prenom'] .", ");
    }else{
        echo("x");
    }
}
 }
?>
    </td>
    </tr>
</table>

</div>
</body>
</html>
