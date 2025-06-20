<?php
require './data/pages.php';
require_once './fonctions/utils.php';


?>
<div class="header-burger">
    <div class="header-burger__item">
        <i class="fa-solid fa-burger"></i>
        <i class="fa-solid fa-xmark"></i>
    </div>
    <div class="header-burger__logo">
        <img src="/arinfo/recettes-cuisine/images/logo.png" alt="Logo de Délices Maison">
    </div>
</div>
<nav class="header-nav close">
    <ul class="header-nav__list">
        <?php foreach ($pages as $page) { ?>
            <li class="header-nav__item <?php activePage($page);  ?>">
                <a class="header-nav__link" href="<?= $page["link"] ?>"><?= $page["title"] ?></a>
            </li>

        <?php } ?>

    </ul>
</nav>