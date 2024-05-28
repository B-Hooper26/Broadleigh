<?php require __DIR__ . "/inc/header.php"; 
if (session_status() === PHP_SESSION_NONE) {
   session_start();
}?>
     
   <h1>Add Product!</h1>

   <?php require __DIR__ . "/components/add-product-form.php"; ?>

<?php require __DIR__ . "/inc/footer.php"; ?>