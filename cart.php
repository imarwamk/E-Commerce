<?php
session_start();
include('db.php');

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);

    if (!$product) {
        echo "Product not found.";
        exit;
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $cart_item = array(
        'id' => $product['id'],
        'name' => $product['name'],
        'price' => $product['price'],
        'image' => $product['image'], 
        'quantity' => 1
    );

   
    $product_found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $product_id) {
            $item['quantity']++;
            $product_found = true;
            break;
        }
    }

    if (!$product_found) {
        $_SESSION['cart'][] = $cart_item;
    }

    header('Location: view_cart.php');
}
?>