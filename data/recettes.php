<?php
require_once './fonctions/utils.php';

$recettes = [
    [
        'titre' => 'Spaghettis à la carbonara',
        'photo' => './images/spaghettis-photo.png',
        'temps' => '25 minutes',
        'difficulte' => 'Facile',
        'description' => 'Un grand classique italien à base de pâtes, œufs, pancetta et parmesan.',
        'categorie' => 'Plat',
        'ingredients' => ['200g de spaghetti', '100g de pancetta', '2 œufs', '50g de parmesan râpé', 'Poivre noir', 'Sel'],
        'instructions' => [
            'Faire cuire les spaghetti.',
            'Faire revenir la pancetta.',
            'Mélanger les œufs avec le parmesan.',
            'Égoutter les pâtes et mélanger avec la pancetta hors du feu.',
            'Ajouter le mélange œufs-fromage.',
            'Poivrer et servir chaud.'
        ]
    ],
    [
        'titre' => 'Poulet rôti au citron',
        'photo' => './images/poulet-citron-photo.png',
        'temps' => '1 heure 15 minutes',
        'difficulte' => 'Moyen',
        'description' => 'Un délicieux poulet entier rôti au four avec citron, ail et herbes.',
        'categorie' => 'Plat',
        'ingredients' => ['1 poulet entier', '2 citrons', '4 gousses d’ail', 'Herbes de Provence', 'Huile d’olive', 'Sel et poivre'],
        'instructions' => [
            'Préchauffer le four à 200°C.',
            'Frotter le poulet avec sel, poivre, huile et herbes.',
            'Ajouter les citrons coupés et l’ail à l’intérieur.',
            'Rôtir au four 1h15 en arrosant régulièrement.'
        ]
    ],
    [
        'titre' => 'Tarte aux pommes classique',
        'photo' => './images/tarte-pommes-photo.png',
        'temps' => '50 minutes',
        'difficulte' => 'Facile',
        'description' => 'Une tarte sucrée à base de pommes fondantes et pâte brisée croustillante.',
        'categorie' => 'Dessert',
        'ingredients' => ['1 pâte brisée', '4 pommes', '50g de sucre', '20g de beurre', 'Cannelle (facultatif)'],
        'instructions' => [
            'Préchauffer le four à 180°C.',
            'Étaler la pâte dans un moule.',
            'Disposer les pommes tranchées.',
            'Saupoudrer de sucre et de cannelle.',
            'Ajouter le beurre en petits morceaux.',
            'Cuire 35 à 40 minutes.'
        ]
    ],
    [
        'titre' => 'Risotto aux champignons',
        'photo' => './images/risotto-photo.png',
        'temps' => '40 minutes',
        'difficulte' => 'Difficile',
        'description' => 'Un risotto crémeux aux champignons et parmesan, parfait pour impressionner.',
        'categorie' => 'Plat',
        'ingredients' => ['200g de riz arborio', '150g de champignons de Paris', '1 oignon', '50cl de bouillon de légumes', '30g de parmesan', '20g de beurre', 'Huile d’olive', 'Sel et poivre'],
        'instructions' => [
            'Faire revenir l’oignon et les champignons.',
            'Ajouter le riz et le nacrer.',
            'Verser le bouillon chaud petit à petit en remuant.',
            'Ajouter le parmesan et le beurre en fin de cuisson.',
            'Saler, poivrer et servir bien chaud.'
        ]
    ],
    [
        'titre' => 'Salade niçoise',
        'photo' => 'images/salade-nicoise-photo.png',
        'temps' => '20 minutes',
        'difficulte' => 'Facile',
        'description' => 'Une salade complète et fraîche avec thon, œufs, olives et légumes.',
        'categorie' => 'Entrée',
        'ingredients' => ['2 tomates', '100g de haricots verts', '1 œuf dur', '50g de thon', 'Olives noires', 'Vinaigrette'],
        'instructions' => [
            'Cuire les haricots verts et les œufs.',
            'Disposer les ingrédients sur une assiette.',
            'Assaisonner avec la vinaigrette.'
        ]
    ],
    [
        'titre' => 'Soupe à l’oignon',
        'photo' => 'images/soupe-oignon-photo.png',
        'temps' => '45 minutes',
        'difficulte' => 'Moyen',
        'description' => 'Une soupe traditionnelle française gratinée au four.',
        'categorie' => 'Entrée',
        'ingredients' => ['3 oignons', '1L de bouillon de bœuf', 'Pain', 'Gruyère râpé', 'Beurre'],
        'instructions' => [
            'Faire revenir les oignons.',
            'Ajouter le bouillon et laisser mijoter.',
            'Verser dans des bols, ajouter le pain et le fromage.',
            'Gratiner au four.'
        ]
    ],
    [
        'titre' => 'Quiche lorraine',
        'photo' => './images/quiche-lorraine-photo.png',
        'temps' => '1 heure',
        'difficulte' => 'Facile',
        'description' => 'Une tarte salée à base de lardons, œufs et crème fraîche.',
        'categorie' => 'Plat',
        'ingredients' => ['1 pâte brisée', '200g de lardons', '3 œufs', '20cl de crème fraîche', 'Poivre, sel'],
        'instructions' => [
            'Préchauffer le four à 180°C.',
            'Répartir les lardons sur la pâte.',
            'Mélanger œufs et crème, verser sur les lardons.',
            'Cuire 40 minutes.'
        ]
    ],
    [
        'titre' => 'Gâteau au chocolat fondant',
        'photo' => './images/gateau-chocolat-photo.png',
        'temps' => '35 minutes',
        'difficulte' => 'Facile',
        'description' => 'Un dessert gourmand et fondant au cœur.',
        'categorie' => 'Dessert',
        'ingredients' => ['200g de chocolat noir', '100g de beurre', '3 œufs', '100g de sucre', '50g de farine'],
        'instructions' => [
            'Faire fondre chocolat et beurre.',
            'Ajouter œufs, sucre et farine.',
            'Cuire 20 minutes à 180°C.'
        ]
    ],
    [
        'titre' => 'Velouté de potiron',
        'photo' => './images/veloute-potiron-photo.png',
        'temps' => '30 minutes',
        'difficulte' => 'Facile',
        'description' => 'Un velouté doux et crémeux parfait en automne.',
        'categorie' => 'Entrée',
        'ingredients' => ['500g de potiron', '1 oignon', '20cl de crème', 'Bouillon de légumes', 'Sel, poivre'],
        'instructions' => [
            'Faire revenir l’oignon.',
            'Ajouter le potiron et le bouillon.',
            'Mixer, ajouter la crème.',
            'Servir chaud.'
        ]
    ],
    [
        'titre' => 'Clafoutis aux cerises',
        'photo' => './images/clafoutis-photo.png',
        'temps' => '50 minutes',
        'difficulte' => 'Moyen',
        'description' => 'Un dessert moelleux aux cerises.',
        'categorie' => 'Dessert',
        'ingredients' => ['400g de cerises', '4 œufs', '100g de sucre', '80g de farine', '25cl de lait'],
        'instructions' => [
            'Préchauffer le four à 180°C.',
            'Mélanger œufs, sucre, farine, lait.',
            'Verser sur les cerises dans un plat beurré.',
            'Cuire 40 minutes.'
        ]
    ]
];

foreach ($recettes as &$recipe) {
    $recipe["slug"] = slugify($recipe["titre"]);
    $recipe["minutes"] = convertMinutes($recipe["temps"]);
    $recipe["score"] = convertScore($recipe["difficulte"], $recettes);
}
unset($recipe);
