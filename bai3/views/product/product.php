<?php include "views/header.php"; ?>

<div>
    <?php foreach ($products as $product) : ?>
        <div class="product">
            <a href="">
                <h3><?= $product['name'] ?></h3>
                <img src="<?= $product['image'] ?>" width="100" alt="">
                <div>
                    Price: <?= $product['price'] ?>
                </div>
            </a>
        </div>
    <?php endforeach ?>
</div>

<?php include "views/footer.php" ?>