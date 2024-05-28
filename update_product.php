<?php
require_once './inc/functions.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$id = $_POST['id'];
$name = $_POST['Product_name'];
$description = $_POST['Description'];
$category = $_POST['Category'];
$quantity = $_POST['Quantity'];
$price = $_POST['Price'];
$image = $_POST['Image'];

$productData = [
    'id' => $id,
    'Product_name' => $name,
    'Description' => $description,
    'Category' => $category,
    'Quantity' => $quantity,
    'Price' => $price,
    'Image' => $image
];

$controllers->products()->update_product($productData);

redirect("Admin"); // Redirect to the Admin page after updating
?>
