<?php
include('db.php');

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id = $product_id";

    if (mysqli_query($conn, $sql)) {
        header('Location: admin.php');
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
