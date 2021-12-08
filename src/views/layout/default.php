<?php


$replStr ="title";

$title = "title";
/**
 * @param string $content
 * @param string $title
 */
return function(string $content = "data", string $title = "titre"){
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?echo $title?></title>
</head>

<body>
  <div class="header-2">
    <nav class="bg-white py-2 md:py-4">
      <div class="container px-4 mx-auto md:flex md:items-center">

        <div class="flex justify-between items-center">
          <a href="#" class="font-bold text-xl text-indigo-600">MetaCriticDeux</a>
          <button
            class="border border-solid border-gray-600 px-3 py-1 rounded text-gray-600 opacity-50 hover:opacity-75 md:hidden"
            id="navbar-toggle">
            <i class="fas fa-bars"></i>
          </button>
        </div>

        <div class="hidden md:flex flex-col md:flex-row md:ml-auto mt-3 md:mt-0" id="navbar-collapse">
          <a href="#" class="p-2 lg:px-4 md:mx-2 text-white rounded bg-indigo-600">Home</a>
          <a href="#"
            class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Acteurs</a>
          <a href="#"
            class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Films</a>
          <a href="#"
            class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">LazareTiti999</a>
          <a href="#"
            class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-transparent rounded hover:bg-indigo-100 hover:text-indigo-700 transition-colors duration-300">Login</a>
          <a href="#"
            class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-solid border-indigo-600 rounded hover:bg-indigo-600 hover:text-white transition-colors duration-300 mt-1 md:mt-0 md:ml-1">Signup</a>
        </div>
      </div>
    </nav>

  <div class="bg-indigo-100 py-6 md:py-12">
    <? echo $content?>
  </div>
  <footer class="footer bg-white relative pt-1 border-b-2 border-blue-700">

    <div class="container mx-auto px-6">
      <div class="mt-16 border-t-2 border-gray-300 flex flex-col items-center">
        <div class="sm:w-2/3 text-center py-6">
          <p class="text-sm text-blue-700 font-bold mb-2">
            © 2020 by LazareC & BNN
          </p>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>
<?php
};

