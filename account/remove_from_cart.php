<?php
session_start();

if (isset($_GET["ProID"])) {
    $ProID = $_GET["ProID"];
    unset($_SESSION["cart"][$ProID]); // Remove product from cart
}

header("Location: cart.php");
exit;