<?php
include 'includes/header.php';
require_once './fonctions/utils.php';
require_once 'data/recettes.php';

$recettesFilter = $recettes;
$link = "";

// Filtre de recherche de recettes

if (isset($_GET['search'])) {
    $recettesFilter = [];

    $search = htmlspecialchars(($_GET['search']));

    foreach ($recettes as $recipe) {

        if (str_contains(strtolower($recipe["titre"]), strtolower($search))) {
            $recettesFilter[] = $recipe;
        }
    }
}

// Extraire les catégories
$categories = extractCategories($recettesFilter);

// Filtre des catégories

if (isset($_GET['categorie'])) {
    $categoriesFiltered = [];
    $categoryFilter = htmlspecialchars($_GET['categorie']);

    $checkCategory = false;
    foreach ($categories as $category) {
        $slugCategory = slugify($category["name"]);
        if ($slugCategory === $categoryFilter) {
            $checkCategory = true;
            $addCategory = $category;
        }
    }
    if ($checkCategory) {
        $categoriesFiltered[] = $addCategory;

        $filteredByCategory = [];

        foreach ($recettesFilter as $r) {
            if ($r["categorie"] === $addCategory["name"]) {
                $filteredByCategory[] = $r;
            }
        }

        $recettesFilter = $filteredByCategory;
    }
} else {
    $categoriesFiltered = $categories;
}


// Trier par difficultés

if (isset($_GET['sortlevel'])) {

    $sortLevel = htmlspecialchars(($_GET['sortlevel']));
    if ($sortLevel === "true") {
        usort($recettesFilter, "cmp");
        $levels = extractLevel($recettes);
    }
} else {

    $sortLevel = "false";
}
?>
<main>
    <section class="recipes">

        <h1 class="recipes__title">Recettes</h1>

        <!-- Searchbar -->
        <form class="recipes-form" action="recettes.php" method="GET">
            <div class="recipes-form__container">
                <input class="recipes-form__input" type="text" name="search" placeholder="Saisir une recette">
                <button class="recipes-form__button" type="submit">Rechercher</button>
            </div>
            <div class="recipes-form__buttons">

                <!-- Bouton trie par ordre de difficulté -->
                <a class="recipes-filterByLevel__link" href="./recettes.php?sortlevel=true">Trier par difficulté</a>

                <!-- Filtres de catégories -->
                <?php foreach ($categories as $category) { ?>
                    <a class="recipes-filterByCategory__link" href="<?= $category["link"] ?>">
                        <?= $category["name"] ?>
                    </a>
                <?php } ?>

                <!-- Bouton de réinitialisation -->
                <a class="recipes-form__reset" href="recettes.php">Réinitialiser</a>
            </div>
        </form>





        <!-- Message d'erreur si aucune recette trouvée -->
        <div class="recipes__list">
            <?php if (!$recettesFilter) { ?>
                <p class="recipes__noresult">Aucune recette trouvée</p>

                <!-- Liste des recettes -->
            <?php } else { ?>

                <!-- Si les recettes sont triées par ordre de difficulté -->
                <?php if ($sortLevel === "true") { ?>

                    <?php foreach ($levels as $level) { ?>
                        <div class="recipes-level">
                            <h2 class="recipes-level__title">
                                <?= $level["name"]; ?>
                                <?php showStars($level["name"]); ?>
                            </h2>
                            <div class="recipes-level__list">
                                <?php foreach ($recettesFilter as $recipe) {
                                    if ($recipe["difficulte"] === $level["name"]) {
                                        $link = makeUrl($recipe["slug"]);
                                        include 'includes/recipe_card.php';
                                    }
                                } ?>
                            </div>
                        </div>
                    <?php } ?>
    </section>
    <?php } else {
                    foreach ($categoriesFiltered as $category) { ?>
        <div class="recipes-category">
            <h2 class="recipes-category__title">
                <?= $category["name"]; ?>
            </h2>
            <div class="recipes-category__list">
        <?php foreach ($recettesFilter as $recipe) {
                            if ($recipe["categorie"] === $category["name"]) {
                                $link = makeUrl($recipe["slug"]);

                                include 'includes/recipe_card.php';
                            }
                        }
                    }
                } ?>

    <?php
            } ?>
            </div>
        </div>
        </div>
        </section>

        <section class="recipe-stats">
            <?php $tabCount = countRecipes($recettes);    ?>
            <h2 class="recipes-stats__title">Statistiques</h2>
            <table>
                <thead>
                    <th>Recettes</th>
                    <th>Statistiques</th>

                </thead>
                <tbody>
                    <tr>
                        <th>Niveau <?php showStars("Facile") ?> </th>
                        <td><?= $tabCount["Facile"]; ?> recettes</td>
                    </tr>
                    <tr>
                        <th>Niveau <?php showStars("Moyen") ?> </th>
                        <td><?= $tabCount["Moyen"]; ?> recettes</td>
                    </tr>
                    <tr>
                        <th>Niveau <?php showStars("Difficile") ?> </th>
                        <td><?= $tabCount["Difficile"]; ?> recettes</td>
                    </tr>
                    <tr>
                        <th>Nombre de recettes total</th>
                        <td><?= $tabCount["Total"]; ?> recettes</td>
                    </tr>
                    <tr>
                        <th>Temps moyen de préparation</th>
                        <td><?= $tabCount["Average"]; ?> minutes</td>
                    </tr>
                </tbody>
            </table>
        </section>

</main>
<?php
include 'includes/footer.php';
?>