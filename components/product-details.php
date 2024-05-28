<?php
require_once './inc/functions.php';

$id = $_GET['id'] ?? '';

if (!empty($id)) {

    $product =$controllers->products()->get_product_by_id($id);

    if ($product): ?>   
    
        <div class="card" style="width: 10%; height: 10%;">
            <img src="<?= $product['Image'] ?>" class="card-img-top" alt="image of <?= $product['Description'] ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $product['Product_name'] ?></h5>
                <p class="card-text"><?= $product['Description'] ?></p>
                <p class="card-text">Category: <?= $product['Category'] ?></p>
                <p class="card-text">Price: £<?= $product['Price'] ?></p>
                <p class="card-text">Quantity: <?= $product['Quantity'] ?></p>
            </div>
        </div>


    <?php 
     else: redirect("not-found"); //404 file not found
     endif ?>

<?php
} else {
    redirect("not-found"); //404 file not found
}
?>