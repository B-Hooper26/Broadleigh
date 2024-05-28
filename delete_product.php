<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once './inc/functions.php';

$id = $_GET['id'] ?? '';

if (!empty($id)) {
    $controllers->products()->delete_product($id);
    redirect("Admin"); // Redirect to the list of products after deletion
} else {
    redirect("not-found"); // 404 file not found
}
?>
