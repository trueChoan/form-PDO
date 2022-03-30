<?php

require_once 'config.php';
require __DIR__ . '/src/models/recipe-model.php';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $recipe =   array_map('trim', $_POST);
    $recipe = array_map('htmlentities', $recipe);

    // verification si form est bien rempli
    $errors = [];

    if (empty($recipe['title']) || empty($recipe['description'])) {
        $errors[] = "title and description are mandatory";
    }

    /*  if (empty($recipe['description'])) {
        $errors[] = "description is mandatory";
        ajouter du text a un champ, ajouter des nombre ou ajouter a un tableau:
        text .=
        int +=
        array []=
    } */

    if (mb_strlen($recipe['title']) > 255) {
        $errors[] = "title must be less than 255characters";
    }

    // si pas d'erreur on redirige vers l'index sinon on boucle pour afficher les erreurs.

    if (empty($errors)) {
        saveRecipe($recipe);
        header('Location: /');
    }
}

require __DIR__ . '/src/views/form.php';
