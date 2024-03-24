<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];

    try {
        require_once 'dbhandler.inc.php';

        $query = "DELETE FROM webshop.users WHERE username = :username;";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);

        $stmt->execute();
        header("Location: ../index.php");

        session_unset();
        session_destroy();

        $pdo = null;
        $stmt = null;
        die(); 

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../pages/account.php");
    exit();
}

