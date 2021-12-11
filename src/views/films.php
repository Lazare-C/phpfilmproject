<?php
$data = [];

//utiliser  $GLOBALS['data'] pour passer de la data
?>


    <h1>FILMS LIST</h1>
<?php

/** @var Film $film */
foreach ($GLOBALS['films'] as $film){
 print_r($film->getAnnee());
}
?>

<?php

?>
