<?php 

$dbname = 'mysql:host=localhost;dbname=webshop';
$dbusername = 'root';
$dbpassword = '';

try {
    $pdo = new PDO($dbname, $dbusername, $dbpassword);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exep) {
    die("Connection failed: " . $exep ->getMessage());
}

