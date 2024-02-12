<?php

if ($_SERVER["REQEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];

    try {
        require_once "dnhandler.inc.php";

        $query = "INSERT INTO users (username, pwd, email, firstname, lastname) VALUES (:username, :pwd, :email, :firstname, :lastname);";

        $statement = $pdo->prepare($query);

        $statement->bindParam(":username", $username);
        $statement->bindParam(":pwd", $pwd);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":firstname", $firstname);
        $statement->bindParam(":lastname", $lastname);

        $statement->execute([]);

        $pdo = null;
        $statement = null;

        die();

        header("Location: ../account/account.php");

    } catch (PDOException $exep) {
        die("Query failed" . $exep->getMessage());
    }
} else {
    header("Location: ../account/signup.php");
}