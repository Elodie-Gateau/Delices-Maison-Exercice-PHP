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
                'photo' => $recipe["photo"],
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
<main>
    <section class="recipe-detail">
        <div class="recipe-detail-header">
            <a class="recipe-detail-header__return" href="recettes.php"><i class="fa-solid fa-arrow-left"></i></a>
            <h1 class="recipe-detail-header__title"><?= $currentRecipe["titre"] ?></h1>
        </div>
        <div class="recipe-detail__wrapper">
            <img class="recipe-detail__picture" src="<?= $currentRecipe["photo"] ?>" alt="<?= "Photo de la recette : " . $currentRecipe["titre"]; ?>">
            <div class="recipe-detail__container">
                <div class="recipe-detail__infos">
                    <p class="recipe-detail__time">
                        Durée : <?php echo $currentRecipe["temps"]; ?>
                    </p>
                    <div class="recipes-detail-difficulty__container">
                        <p class="recipes-detail-difficulty__title">
                            Difficulté :
                        </p>
                        <div class="recipes-detail-difficulty__stars">
                            <?php
                            switch ($currentRecipe["difficulte"]) {
                                case "Facile":
                                    echo '
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>';
                                    break;

                                case "Moyen":
                                    echo '
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>';
                                    break;

                                case "Difficile":
                                    echo '
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>';
                                    break;
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <p class="recipe-detail__desc">
                    <?= $currentRecipe["description"]; ?>
                </p>
            </div>
        </div>
        <div class="recipe-detail__content">
            <div class="recipe-detail-ingredient__container">
                <h2 class="recipe-detail-ingredient__title">Ingrédients : </h2>
                <ul class="recipe-detail-ingredient__list">
                    <?php foreach ($currentRecipe["ingredients"] as $ingredient) { ?>
                        <li class="recipe-detail-ingredient__item"><?= $ingredient ?> </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="recipe-detail-instructions__container">
                <h2 class="recipe-detail-instructions__title">Étapes : </h2>
                <ol class="recipe-detail-instructions__list">
                    <?php foreach ($currentRecipe["instructions"] as $instruction) { ?>
                        <li class="recipe-detail-instructions__item"><?= $instruction ?> </li>
                    <?php } ?>
                </ol>
            </div>
        </div>

    </section>
</main>
<?php
include 'includes/footer.php';
?>