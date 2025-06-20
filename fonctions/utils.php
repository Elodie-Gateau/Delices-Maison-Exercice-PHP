<?php

// Créer un slug pour chaque titre
function slugify($string)
{
    $string = mb_strtolower($string, 'UTF-8');
    $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
    $string = preg_replace('/[^a-z0-9]+/i', '-', $string);
    $string = trim($string, '-');

    return $string;
}

// Créer l'URL vers les recettes détaillées
function makeUrl($slug)
{
    return "/arinfo/recettes-cuisine/recipe_detail.php?slug=$slug";
}

// Extraire les catégories de recettes
function extractCategories($recipes)
{
    $categories = [];

    foreach ($recipes as $recipe) {
        $name = $recipe["categorie"];

        $checkCategory = false;

        foreach ($categories as $cat) {
            if ($name === $cat["name"]) {
                $checkCategory = true;
                break;
            }
        }

        if (!$checkCategory) {
            $categories[] = [
                "name" => $name,
                "link" => '/arinfo/recettes-cuisine/recettes.php?categorie=' . slugify($name)
            ];
        };
    }
    return $categories;
}


// Sélectionner une recette aléatoire

function randomRecipe($recettes)
{

    $number = rand(0, count($recettes));
    $recipeRandom = $recettes[$number];

    return $recipeRandom;
}


// Active la page en cours

function activePage($page)
{
    $currentPage = basename($_SERVER['PHP_SELF']);
    if ($currentPage === $page["link"]) {
        echo "active";
    }
}


// Convertisseur en minutes

function convertMinutes($string)
{
    $minutes = "";
    if (str_contains($string, 'heure') && str_contains($string, 'minutes')) {
        $minutes = str_replace(" heure ", ":", $string);
        $minutes = str_replace(" minutes", "", $minutes);
        $minutes = "0" . $minutes;
    } else if (str_contains($string, 'heure') && !str_contains($string, 'minutes')) {
        $minutes = str_replace(" heure", ":00", $string);
        $minutes = "0" . $minutes;
    } else if (!str_contains($string, 'heure') && str_contains($string, 'minutes')) {
        $minutes = str_replace(" minutes", "", $string);
        $minutes = "00:" . $minutes;
    }

    // $date = date_create($minutes);
    $elements = explode(":", $minutes);
    $hours = (int)$elements[0];
    $mins = (int)$elements[1];
    $totalMinutes = $hours * 60 + $mins;

    return $totalMinutes;
}

// Extraire les niveaux de difficulté

function extractLevel($recipes)
{
    $levels = [];
    $n = 0;
    foreach ($recipes as $recipe) {
        $levelName = $recipe["difficulte"];

        $checkLevel = false;

        foreach ($levels as $level) {
            if ($levelName === $level["name"]) {
                $checkLevel = true;
                break;
            }
        }


        if (!$checkLevel) {
            $n += 1;
            $levels[] = [
                "name" => $levelName,
                "score" => $n
            ];
        };
    }
    return $levels;
}

// Ajouter le score de difficulté dans le tableau de datas
function convertScore($difficulty, $recipes)
{
    $levels = extractLevel($recipes);
    $score = 0;
    foreach ($levels as $level) {
        if ($difficulty === $level["name"]) {
            $score = $level["score"];
        }
    }
    return $score;
}


//  Fonction de comparaison pour le usort
function cmp($a, $b)
{
    if ($a["score"] === $b["score"]) {
        return 0;
    }
    return ($a["score"] < $b["score"]) ? -1 : 1;
}

// Affichage des étoiles pour le niveau de difficulté
function showStars($difficulty)
{
    switch ($difficulty) {
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
}


// Nombre de recettes
function countRecipes($recipes)
{
    $nEasy = 0;
    $nMedium = 0;
    $nStrong = 0;
    $nMinutes = 0;
    $AverageMinutes = 0;
    $nTotal = 0;
    foreach ($recipes as $recipe) {
        $nTotal += 1;
        $nMinutes += $recipe["minutes"];
        switch ($recipe["score"]) {
            case 1:
                $nEasy += 1;
                break;
            case 2:
                $nMedium += 1;
                break;
            case 3:
                $nStrong += 1;
                break;
        }
    }
    $AverageMinutes = $nMinutes / $nTotal;
    $tabCount = [
        "Facile" => $nEasy,
        "Moyen" => $nMedium,
        "Difficile" => $nStrong,
        "Average" => $AverageMinutes,
        "Total" => $nTotal
    ];

    return $tabCount;
}
