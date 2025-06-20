<?php
require_once './fonctions/utils.php';

?>
<div class="recipes-item">
    <h2 class="recipes-item__title"><a class="recipes-item__link" href=<?= $link; ?>>
            <?= $recipe["titre"]; ?>
        </a></h2>

    <img class="recipes-item__picture" src="<?= $recipe["photo"] ?>" alt="<?= "Photo de la recette : " . $recipe["titre"]; ?>">

    <p class="recipes-item__time">
        Durée : <?php echo $recipe["temps"]; ?></p>
    <p><strong>Minutes :</strong> <?= $recipe["minutes"]; ?> minutes
    </p>
    <div class="recipes-item-difficulty__container">
        <p class="recipes-item-difficulty__title">
            Difficulté :
        </p>
        <div class="recipes-item-difficulty__stars">
            <?php
            showStars($recipe["difficulte"]);
            ?>
        </div>
    </div>
    <p class="recipes-item__desc">
        <?= $recipe["description"]; ?>
    </p>


</div>