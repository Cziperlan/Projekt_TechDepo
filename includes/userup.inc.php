<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $user_id = $_SESSION["user_id"];

    try {
        require_once 'dbhandler.inc.php';

        $query = 'UPDATE webshop.users SET username = :username, pwd =:pwd, email = :email, firstname = :firstname, lastname = :lastname WHERE felhasznalo_id=:user_id; ';

        $stmt = $pdo->prepare($query);

        $options = [
            'cost' => 12
        ];
    
        $hashPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $hashPwd);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":firstname", $firstname);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->bindParam(":user_id",$user_id);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../pages/account.php");

        die();

    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
        }
        
    
} else {
    header("Location: ../pages/account.php");
}
