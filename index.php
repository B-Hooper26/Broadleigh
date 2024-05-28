<?php require __DIR__ . "/inc/header.php"; ?>
<section class="vh-100 text-center">
    <div class="container py-5 h-75">
        <p class="card-text">Welcome to Broadleigh Gardens website. Here you can browse our amazing range of products from flowers to equipment!</p>
        <a href="register.php" target="_blank">
            <button class="btn btn-primary register-button">Register Now</button><!-- User can click the button to register-->
        </a>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <?php require __DIR__ . "/components/products.php"; ?>
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
