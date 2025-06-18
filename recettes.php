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
        <form class="recipes__form" action="recettes.php" method="GET">
            <input class="recipes-form__input" type="text" name="search" placeholder="Rechercher une recette">
            <button class="recipes-form__button" type="submit">Rechercher</button>
        </form>
        <a class="recipes-form__reset" href="recettes.php">Réinitialiser la recherche</a>


        <?php if (!$recettesFilter) { ?>
            <p class="recipes__noresult">Aucune recette trouvée</p>

        <?php } else { ?>

            <?php foreach ($recettesFilter as $recipe) {
                $link = makeUrl($recipe["slug"]);;
            ?>

                <div class="recipes__container">
                    <a class="recipes-item__title" href=<?= $link; ?>>
                        <?= $recipe["titre"]; ?>
                    </a>

                    <img class="recipes-item__picture" src="<?= $recipe["photo"] ?>" alt="<?= "Photo de la recette : " . $recipe["titre"]; ?>">

                    <p class="recipes-item__time">
                        Temps : <?php echo $recipe["temps"]; ?>
                    </p>
                    <p class="recipes-item__difficulty">
                        Difficulté : <?= $recipe["difficulte"]; ?>
                    </p>
                    <p class="recipes-item__desc">
                        <?= $recipe["description"]; ?>
                    </p>


                </div>
        <?php }
        } ?>
    </section>
</main>
<?php
include 'includes/footer.php';
?>