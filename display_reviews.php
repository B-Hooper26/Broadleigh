<?php require __DIR__ . "/inc/header.php"; ?>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Include the necessary files and initialize the database connection
require_once "./classes/DatabaseController.php";
require_once "./classes/ReviewController.php";

$db = new DatabaseController("mysql:host=127.0.0.1;dbname=broadleigh_db;charset=utf8", "root", "");
$reviewController = new ReviewController($db);

// Check if a review ID is provided for deletion
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete_review'])) {
    $reviewId = $_POST['delete_review'];
    // Delete the review from the database
    $reviewController->deleteReview($reviewId);
}

// Fetch all reviews from the database
$reviews = $reviewController->getAllReviews();
?>
<section class="vh-100 text-center">
    <div class="container py-5 h-75">
        <h2>All Reviews</h2>
        <?php
        // Display the reviews
        foreach ($reviews as $review) {
            echo "<div class='review'>";
            echo "<p class='review-comment'>Review: " . htmlspecialchars($review["Comment"]) . "</p>";
            echo "<p class='review-rating'>Rating: " . htmlspecialchars($review["Rating"]) . "</p>";

            // Check if the logged-in user is an admin
            if (isset($_SESSION['Is_Admin']) && $_SESSION['Is_Admin'] === true) {
                echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post' style='display:inline;'>";
                echo "<input type='hidden' name='delete_review' value='" . $review['Reviews_id'] . "'>";
                echo "<button type='submit' class='btn btn-danger'>Delete</button>";
                echo "</form>";
            }
            else{}

            echo "</div>";
        }
        ?>
    </div>
    <style>
        .container {
            max-width: 50%; /* Adjust according to your design */
            margin: auto;
        }

        .review {
            background-color: #7FC382;
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
            color: black;
        }

        .review-comment {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .review-rating {
            font-size: 16px;
            font-style: italic;
        }

        /* Adjustments for mobile responsiveness */
        @media (max-width: 768px) {
            .review {
                width: 100%; /* Adjust the width for smaller screens */
            }
        }
    </style>
</section>
<?php require __DIR__ . "/inc/footer.php"; ?>
