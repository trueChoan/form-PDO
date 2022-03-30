<?php
require_once 'config.php';
require __DIR__ . '/src/models/recipe-model.php';


// Fetching all recipes from database - assuming the database is okay
$recipes = getAllRecipes();

// Generate the web page
// __DIR__ comme pwd dans le terminal. Imprime le chemin courant
// concaténer DIR avec le fichier dans le chemin défini
require __DIR__ . '/src/views/index.php';
