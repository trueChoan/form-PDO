<?php

function createConnection(): PDO
{
    return new PDO("mysql:host=" . SERVER . ";dbname=" . DATABASE . ";charset=utf8", USER, PASSWORD);
}

function getAllRecipes(): array
{
    $connection = createConnection();

    $statement = $connection->query('SELECT id, title FROM recipe');
    $recipes = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $recipes;
}

function getRecipeById(int $id): array
{
    $connection = createConnection();

    $query = 'SELECT title, description FROM recipe WHERE id=:id';
    $statement = $connection->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $recipe = $statement->fetch(PDO::FETCH_ASSOC);

    return  $recipe;
}

function saveRecipe(array $recipe): void
{

    $connection = createConnection();

    $title = $recipe['title'];
    $description = $recipe['description'];

    $query = 'INSERT INTO recipe (title, description) VALUES (:title, :description) ';

    $statement = $connection->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    // $statement->bindValue(':id', $id, PDO::PARM_INT); exemple de PDO::PARM_INT si int. par defaut PDO::PARM_STR
    $statement->execute();
    //lance une requete SQL pour enregistrer la recette
}
