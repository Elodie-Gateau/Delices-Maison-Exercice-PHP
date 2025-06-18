<?php
require_once './fonctions/utils.php';

$recettes = [
    [
        'titre' => 'Spaghettis à la carbonara',
        'photo' => './images/spaghettis-photo.png',
        'temps' => '25 minutes',
        'difficulte' => 'Facile',
        'description' => 'Un grand classique italien à base de pâtes, œufs, pancetta et parmesan.',
        'ingredients' => [
            '200g de spaghetti',
            '100g de pancetta',
            '2 œufs',
            '50g de parmesan râpé',
            'Poivre noir',
            'Sel'
        ],
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
        'ingredients' => [
            '1 poulet entier',
            '2 citrons',
            '4 gousses d’ail',
            'Herbes de Provence',
            'Huile d’olive',
            'Sel et poivre'
        ],
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
        'ingredients' => [
            '1 pâte brisée',
            '4 pommes',
            '50g de sucre',
            '20g de beurre',
            'Cannelle (facultatif)'
        ],
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
        'ingredients' => [
            '200g de riz arborio',
            '150g de champignons de Paris',
            '1 oignon',
            '50cl de bouillon de légumes',
            '30g de parmesan',
            '20g de beurre',
            'Huile d’olive',
            'Sel et poivre'
        ],
        'instructions' => [
            'Faire revenir l’oignon et les champignons.',
            'Ajouter le riz et le nacrer.',
            'Verser le bouillon chaud petit à petit en remuant.',
            'Ajouter le parmesan et le beurre en fin de cuisson.',
            'Saler, poivrer et servir bien chaud.'
        ]
    ]
];

foreach ($recettes as &$recipe) {
    $slug = slugify($recipe["titre"]);
    $recipe["slug"] = $slug;
}
unset($recipe);
