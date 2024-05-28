<?php require __DIR__ . "/inc/header.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} ?>
<h1 style="color: black; text-align: center; padding-top: 15px">Admin Dashboard</h1>
<section class="vh-100 text-center">
    <div class="container py-5 h-75">
        <a href="register.php" target="_blank">
        </a>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <?php require __DIR__ . "/components/admin_products.php"; ?>
            <?php require __DIR__ . "/components/add-product-form.php"; ?>
        </div>
    </div>
    
</section>  
<?php require __DIR__ . "/inc/footer.php"; ?>
<style>
    .register-button {
        font-size: 1.25rem; /*  font size */
        padding: 10px 20px; /*  padding */
        border-radius: 15px; /*  corners */
        transition: background-color 0.s, transform 0.3s; /*  transitions */
    }

    .register-button:hover {
        background-color: #0056b3; /* Darker blue on hover */
        transform: scale(1.05); 
    }
</style>