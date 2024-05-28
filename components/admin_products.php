<?php
require_once './inc/functions.php';

$products = $controllers->products()->get_all_products();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Products</title>
    <!-- Add your CSS styles here -->
</head>
<body>
<div class="container">
    <div class="row">
        <?php foreach ($products as $product): ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100">
                <img src="<?= htmlspecialchars($product['Image'], ENT_QUOTES) ?>" 
                     class="card-img-top img-fluid" 
                     alt="image of <?= htmlspecialchars($product['Description'], ENT_QUOTES) ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($product['Product_name'], ENT_QUOTES) ?></h5>
                    <p class="card-text"><?= htmlspecialchars($product['Description'], ENT_QUOTES) ?></p>
                    <p class="card-text">Category: <?= htmlspecialchars($product['Category'], ENT_QUOTES) ?></p>
                    <p class="card-text">Price: £<?= htmlspecialchars($product['Price'], ENT_QUOTES) ?></p>
                    <p class="card-text">Quantity: <?= htmlspecialchars($product['Quantity'], ENT_QUOTES) ?></p>
                    <a href="edit_product.php?id=<?= htmlspecialchars($product['Product_id'], ENT_QUOTES) ?>" class="btn btn-primary">Edit</a>
                    <a href="delete_product.php?id=<?= htmlspecialchars($product['Product_id'], ENT_QUOTES) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
