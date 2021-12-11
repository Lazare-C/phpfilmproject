<?php include('server.php') ?>
<div class="h-screen bg-indigo-100 flex justify-center items-center">
	<div class="lg:w-2/5 md:w-1/2 w-2/3">
		<form method="post" class="bg-white p-10 rounded-lg shadow-lg min-w-full" action="login.php">
			<h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Connexion</h1>
			<div>
				<label class="text-gray-800 font-semibold block my-3 text-md" for="username">Identifiant</label>
				<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="username" id="username" placeholder="Identifiant" />
      </div>
					<div>
						<label class="text-gray-800 font-semibold block my-3 text-md" for="password">Mot de passe</label>
						<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="password" id="password" placeholder="Mot de passe" />
      </div>
							<button type="submit" name="login_user" class="w-full mt-6 bg-indigo-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Connexion</button>
		</form>
        <p>
  		 Pas encore membre ? <a href="register.php">Inscrivez-vous !</a>
  	</p>
	</div>
</div>