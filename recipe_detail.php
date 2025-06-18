<?php

include './includes/header.php';
require './data/recettes.php';
require_once './fonctions/utils.php';

if (isset($_GET['slug'])) {
    $slug = htmlspecialchars($_GET['slug']);

    foreach ($recettes as $recipe) {
        if ($slug === $recipe["slug"]) {
            $currentRecipe = [
                'titre' => $recipe["titre"],
                'temps' => $recipe["temps"],
                'description' => $recipe["description"],
                'difficulte' => $recipe["difficulte"],
                'ingredients' => $recipe["ingredients"],
                'instructions' => $recipe["instructions"]
            ];
        }
    }
} else {
    echo "Des paramètres sont manquants.";
}

?>
<section class="recipe-detail">

    <h1 class="recipe-detail__title"><?= $currentRecipe["titre"] ?></h1>

    <p class="recipe-detail__time">
        Temps : <?php echo $currentRecipe["temps"]; ?>
    </p>
    <p class="recipe-detail__difficulty">
        Difficulté : <?= $currentRecipe["difficulte"]; ?>
    </p>
    <p class="recipe-detail__desc">
        <?= $currentRecipe["description"]; ?>
    </p>
    <h2 class="recipe-detail__subtitle">Ingrédients : </h2>
    <ul class="recipe-detail__list">
        <?php foreach ($currentRecipe["ingredients"] as $ingredient) { ?>
            <li class="recipe-detail__ingredient"><?= $ingredient ?> </li>
        <?php } ?>
    </ul>
    <h2 class="recipe-detail__subtitle">Étapes : </h2>
    <ol class="recipe-detail__list">
        <?php foreach ($currentRecipe["instructions"] as $instruction) { ?>
            <li class="recipe-detail__instruction"><?= $instruction ?> </li>
        <?php } ?>
    </ol>


</section>