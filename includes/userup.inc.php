<?php

if ($_SERVER["REQEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];

    try {
        require_once 'dnhandler.inc.php';

        $query = "UPDATE users SET username = :username, pwd =:pwd, email = :email, firstname = :firstname, lastname = :lastname, WHERE id=1; ";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $pwd);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":firstname", $firstname);
        $stmt->bindParam(":lastname", $lastname);

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
