<?php
session_start();
require '../products/config.php'; // Database connection

if (isset($_POST['ProID'], $_POST['name'], $_POST['price'], $_POST['quantity'])) {
    $ProID = $_POST['ProID'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = (int) $_POST['quantity'];

    // If product is already in cart, update quantity
    if (isset($_SESSION["cart"][$ProID])) {
        $_SESSION["cart"][$ProID]["quantity"] += $quantity;
    } else {
        // Otherwise, add new item
        $_SESSION["cart"][$ProID] = [
            "name" => $name,
            "price" => $price,
            "quantity" => $quantity
        ];
    }
}

header("Location: ../account/cart.php"); // Redirect to cart page
exit;