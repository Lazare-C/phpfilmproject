<?php
/** @var Film $film */
$film = $GLOBALS['film'];

?>
    <div class=" bg-indigo-100 flex justify-center w-screen items-center">
        <div class="lg:w-3/5 md:w-4/5 w-2/3 mb-5">
            <div class="bg-white p-10 rounded-lg shadow-lg min-w-full">
                <img src="<?echo $film->getImgSrc();?>"
                            alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug."
                            class="w-3/5 rounded-lg m-4  object-center object-cover m-auto mb-10">
                <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans"><?echo $film->getNom();?></h1>
                <p class="text-center text-2xl text-gray-600 font-sans">Années : <?echo $film->getAnnee();?></p>
                <p class="text-center text-2xl text-gray-600 font-sans">Score : <?echo $film->getScore();?></p>
                <p class="text-center text-2xl text-gray-600 font-sans">Nombre de votes : <?echo $film->getNbVote();?></p>
                <p class="text-center text-2xl text-gray-600 font-sans">Acteurs : </p>
                <?
                if(isset($_SESSION['user'])){
                    //check if user is admin
                    if($_SESSION['user']->getIsAdmin() == true){
                        ?>
                        <a href="filmEdit?id=<?echo $film->getId();?>" class="text-center text-2xl text-gray-600 font-sans">Modifier</a>
                        <?
                    }
                }?>
            </div>
        </div>
    </div>

