<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
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
<form action="<? $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="name">Nom du film</label>
    <input  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name"> <br>
    <label for="annee">Annee</label>
    <input  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="annee"><br>
    <label for="score">Score</label>
    <input  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" step="0.01" name="score"><br>
    <label for="nbvotants">Nombre de votants</label>
    <input  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="nbvotants"><br>
    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Validé">
</form>
</div>
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
//$query = $bdd->prepare('SELECT * FROM film WHERE nom = :nom AND id = :id');
//$query->execute(array('nom' => "Alien", 'id' => "13") );


if(isset($_POST['name']) && isset($_POST['annee']) && isset($_POST['score']) && isset($_POST['nbvotants'])){

    if(is_numeric($_POST['score']) && is_numeric($_POST['nbvotants']) && is_numeric($_POST['annee'])) {

        $val = array('name' => (string) $_POST['name'], 'annee' => (int) $_POST['annee'], 'score' => (float) $_POST['score'], 'nbVotants' => (int) $_POST['nbvotants']);
        $insert = $bdd->prepare('INSERT INTO film (nom, annee, score, nbVotants) VALUES (:name, :annee, :score, :nbVotants)');
        $insert->execute($val);
    }else{
        echo "Les valeurs sont pas bonnes";
    }

}else{
    echo "Il manque des valeurs";
}

?>

</body>
</html>
