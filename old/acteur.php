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
    }<

    $bdd = connectDB();

    $sth = $bdd->prepare("SELECT acteurs.nom nom, acteurs.prenom prenom, film.nom titre FROM `acteurs` LEFT JOIN `Casting` ON Casting.acteur_id = acteurs.id LEFT JOIN `film` ON film.id = Casting.film_id");
    $sth->execute();
    $result = $sth->fetchAll(\PDO::FETCH_GROUP);
    ?>
    <table class="table-auto border-collapse border border-green-800">
        <tr>
            <?
            echo("<th class='border border-green-600 mx-16'>" . "Prenom" . "</th>");
            echo("<th class='border border-green-600'>" . "Nom" . "</th>");
            echo("<th class='border border-green-600'>" . "Films" . "</th>");
            ?>
        </tr>
        <?

        foreach ($result as $key=>$value){


            echo ("<tr>");
            echo("<td class='border border-green-600'>" . $value[0]['prenom'] . "</td>");
            echo("<td class='border border-green-600'>" . $value[0]['nom'] . "</td>");
            echo("<td class='border border-green-600'>");

            foreach ($value as $k=>$v) {

                if($v['titre'] ) {
                    echo($v['titre'] .", ");
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
