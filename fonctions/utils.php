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
