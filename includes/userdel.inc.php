<?php

if ($_SERVER["REQEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once 'dnhandler.inc.php';

        $query = "DELETE FROM users WHERE id=1; ";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $pwd);

        $stmt->execute([]);

        $pdo = null;
        $stmt = null;

        header("Location: ../pages/index.php");

        die();

    } catch (PDOException $exep) {
        die("Query failed" . $exep->getMessage());
        }
        
    
} else {
    header("Location: ../account/signup.php");
        }
