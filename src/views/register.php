<div class="h-screen bg-indigo-100 flex justify-center items-center">
	<div class="lg:w-2/5 md:w-1/2 w-2/3">
		<form class="bg-white p-10 rounded-lg shadow-lg min-w-full" action="" method="post">
            <?php //include('errors.php'); ?>
			<h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">S'enregistrer</h1>
			<div>
				<label class="text-gray-800 font-semibold block my-3 text-md" for="username">Identifiant</label>
				<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="username" id="username" placeholder="Identifiant" value="<?php echo $username; ?>" />
      </div>
				<div>
					<label class="text-gray-800 font-semibold block my-3 text-md" for="email">Email</label>
					<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="email" id="email" placeholder="exemple@email.fr" value="<?php echo $email; ?>" />
      </div>
					<div>
						<label class="text-gray-800 font-semibold block my-3 text-md" for="password">Mot de passe</label>
						<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="password" name="password" id="password" placeholder="Mot de passe" />
      </div>
						<div>
							<label class="text-gray-800 font-semibold block my-3 text-md" for="confirm">Confirmation du mot de passe</label>
							<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="password" name="confirm" id="confirm" placeholder="Confirmation du mot de passe" />
      </div>
							<button type="submit" name="reg_user" class="w-full mt-6 bg-indigo-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">S'enregistrer</button>
		</form>
        <p>
  		Vous avez déja un compte? <a href="login">Sign in</a>
  	    </p>
	</div>
</div>
