<?php

?>

<div class="h-screen bg-indigo-100 flex justify-center items-center">
            <div class="lg:w-2/5 md:w-1/2 w-2/3">
                <form class="bg-white p-10 rounded-lg shadow-lg min-w-full">
                    <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Ajouter un film</h1>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="username">Nom du film</label>
                        <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="username" id="username" placeholder="Nom du film" />
                    </div>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="email">Année</label>
                        <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="email" id="email" placeholder="Année"  />
                    </div>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="password">Affiche</label>
                        <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="file" name="affiche" id="affiche"/>
                    </div>
                    <button type="submit" name="reg_user" class="w-full mt-6 bg-indigo-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Ajouter le film</button>
                </form>
            </div>
        </div> 