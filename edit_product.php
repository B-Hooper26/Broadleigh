<?php
require __DIR__ . "/inc/header.php";
require_once './inc/functions.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id = $_GET['id'] ?? '';

if (!empty($id)) {
    $product = $controllers->products()->get_product_by_id($id);

    if ($product):
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your stylesheet -->
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Product</h1>
        <form action="update_product.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $product['Product_id'] ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="Product_name" value="<?= $product['Product_name'] ?>">
            <label for="description">Description:</label>
            <textarea id="description" name="Description"><?= $product['Description'] ?></textarea>
            <label for="category">Category:</label>
            <input type="text" id="category" name="Category" value="<?= $product['Category'] ?>">
            <label for="quantity">Quantity:</label>
            <input type="text" id="quantity" name="Quantity" value="<?= $product['Quantity'] ?>">
            <label for="price">Price:</label>
            <input type="text" id="price" name="Price" value="<?= $product['Price'] ?>">
            <label for="image">Image URL:</label>
            <input type="text" id="image" name="Image" value="<?= $product['Image'] ?>">
            <input type="submit" value="Update Product">
        </form>
    </div>
</body>
</html>

<?php require __DIR__ . "/inc/footer.php"; ?>

<?php 
    else: 
        redirect("not-found"); // 404 file not found
    endif;
} else {
    redirect("not-found"); // 404 file not found
}
?>
