<?php
include 'includes/header.php';
require_once './fonctions/utils.php';
require_once 'data/recettes.php';

$link = "";
// Filtre de rechercher de recettes

if (isset($_GET['search'])) {
    $recettesFilter = [];

    $search = htmlspecialchars(($_GET['search']));

    foreach ($recettes as $recipe) {

        if (str_contains(strtolower($recipe["titre"]), strtolower($search))) {
            $recettesFilter = [$recipe];
        }
    }
} else {
    $recettesFilter = $recettes;
}


?>
<main>
    <section class="recipes">

        <h1 class="recipes__title">Recettes</h1>

        <!-- Searchbar -->
        <form class="recipes-form" action="recettes.php" method="GET">
            <input class="recipes-form__input" type="text" name="search" placeholder="Rechercher une recette">
            <div class="recipes-form__buttons">
                <button class="recipes-form__button" type="submit">Rechercher</button>
                <a class="recipes-form__reset" href="recettes.php">Réinitialiser</a>
            </div>
        </form>
        <div class="recipes__list">
            <?php if (!$recettesFilter) { ?>
                <p class="recipes__noresult">Aucune recette trouvée</p>

            <?php } else { ?>

                <?php foreach ($recettesFilter as $recipe) {
                    $link = makeUrl($recipe["slug"]);;
                ?>

                    <div class="recipes-item">
                        <h2 class="recipes-item__title"><a class="recipes-item__link" href=<?= $link; ?>>
                                <?= $recipe["titre"]; ?>
                            </a></h2>

                        <img class="recipes-item__picture" src="<?= $recipe["photo"] ?>" alt="<?= "Photo de la recette : " . $recipe["titre"]; ?>">

                        <p class="recipes-item__time">
                            Durée : <?php echo $recipe["temps"]; ?>
                        </p>
                        <div class="recipes-item-difficulty__container">
                            <p class="recipes-item-difficulty__title">
                                Difficulté :
                            </p>
                            <div class="recipes-item-difficulty__stars">
                                <?php
                                switch ($recipe["difficulte"]) {
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
                        <p class="recipes-item__desc">
                            <?= $recipe["description"]; ?>
                        </p>


                    </div>
            <?php }
            } ?>
        </div>
    </section>
</main>
<?php
include 'includes/footer.php';
?>