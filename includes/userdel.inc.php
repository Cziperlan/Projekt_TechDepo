<?php

if ($_SERVER["REQEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $user_id = $_SESSION["user_id"];

    try {
        require_once 'dnhandler.inc.php';

        $query = "DELETE FROM webshop.users WHERE felhasznalo_id=:user_id; ";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $pwd);
        $stmt->bindParam(":user_id",$user_id);

        $stmt->execute([]);

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");

        die();

    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
        }
        
    
} else {
    header("Location: ../pages/account.php");
        }
