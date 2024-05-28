<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Include the necessary files and initialize the database connection
require_once __DIR__ . '/classes/DatabaseController.php'; 
$db = new DatabaseController("mysql:host=127.0.0.1;dbname=broadleigh_db;charset=utf8", "root", "");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the review data from the form
    $comment = $_POST["reviewText"];
    $rating = $_POST["rating"]; // Retrieve the selected rating from the form

    // Insert the review into the database
    $query = "INSERT INTO reviews (Comment, Rating) VALUES (:comment, :rating)";
    $stmt = $db->getConnection()->prepare($query);
    $stmt->bindParam(":comment", $comment);
    $stmt->bindParam(":rating", $rating); // Bind the retrieved rating from the form
    $stmt->execute();

    // Redirect to the display_reviews page
    header("Location: display_reviews.php");
    exit();
}
?>
