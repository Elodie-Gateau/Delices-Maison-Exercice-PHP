<?php
require 'data/astuces.php';
include 'includes/header.php';
?>
<main>

    <section class="astuces">
        <h1 class="astuces__title">Astuces</h1>
        <?php foreach ($astuces as $key => $value) { ?>
            <div class="astuces-item">
                <h2 class="astuces-item__title">
                    <?= $value["titre"] ?>
                </h2>
                <p class="astuces-item__content">
                    <?= $value["contenu"] ?>
                </p>
            </div>
        <?php } ?>
    </section>
</main>
<?php
include 'includes/footer.php';
?>