<?php require __DIR__ . "/inc/header.php"; 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?> <!--When the user logs in -->
<section class="vh-100 text-center">
    <div class="container py-5 h-75">
        <p class="card-text" style="color: black; font-size: x-large;">Here are all the products available in our store!</p>
        <a href="submit_review.php">
            <button class="btn btn-primary register-button">Leave us a review! </button><!-- User can click the button to register-->
        </a>
        <!-- Search form -->
        <form method="GET" action="index.php" class="mb-4">
            <input type="text" name="search" placeholder="Search products..." class="form-control" style="width: 300px; display: inline-block;">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <?php require __DIR__ . "/components/products.php"; ?>
        </div>
    </div>
</section>  
<?php require __DIR__ . "/inc/footer.php"; ?>
<style>
    .register-button {
        font-size: 1.25rem; /* font size */
        padding: 10px 20px; /* padding */
        border-radius: 15px; /* corners */
        transition: background-color 0.s, transform 0.3s; /* transitions */
    }

    .register-button:hover {
        background-color: #0056b3; /* Darker blue on hover */
        transform: scale(1.05); 
    }
</style>
