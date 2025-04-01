<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $key = $_POST['key'];
    $quantity = $_POST['quantity'];

    if (isset($_SESSION['cart'][$key])) {
        $_SESSION['cart'][$key]['quantity'] = $quantity;
    }
}

header('Location: view_cart.php');
?>
