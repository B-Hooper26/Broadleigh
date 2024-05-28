<?php
require_once './inc/functions.php';

$products = $controllers->products()->get_all_products();
?>

<div class="container">
    <div class="row">
        <?php foreach ($products as $product): ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100">
                <img src="<?= $product['Image'] ?>" 
                     class="card-img-top img-fluid" 
                     alt="image of <?= htmlspecialchars($product['Description'], ENT_QUOTES, 'UTF-8') ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($product['Product_name'], ENT_QUOTES, 'UTF-8') ?></h5>
                    <p class="card-text">Description: <?= htmlspecialchars($product['Description'], ENT_QUOTES, 'UTF-8') ?></p>
                    <p class="card-text">Price: £<?= htmlspecialchars($product['Price'], ENT_QUOTES, 'UTF-8') ?></p>
                    <p class="card-text">Category: <?= htmlspecialchars($product['Category'], ENT_QUOTES, 'UTF-8') ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
.card-img-top {
    height: auto;
    max-width: 100%;
    object-fit: cover;
}

.card-title {
    font-size: 1.25rem;
    font-weight: bold;
}

.card-text {
    font-size: 1rem;
}

@media (max-width: 576px) {
    .card {
        padding: 10px;
        margin: 20px;
    }

    .card-title {
        font-size: 1rem;
    }

    .card-text {
        font-size: 0.875rem;
    }

    .card-img-top {
        max-height: 300px; /* Limit the image height */
    }
}
</style>
