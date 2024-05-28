<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        <img src="<?= htmlspecialchars($product['Image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['Product_name']) ?>">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($product['Product_name']) ?></h5>
            <p class="card-text"><?= htmlspecialchars($product['Description']) ?></p>
                <span class="text-muted">£<?= number_format($product['Price'], 2) ?></span>
        </div>
    </div>
</div>
