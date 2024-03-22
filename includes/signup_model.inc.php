<?php

declare(strict_types=1);

function get_username(object $pdo, string $username) {
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username",$username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email) {
    $query = "SELECT email FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email",$email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $username,string $pwd,string $email, string $lastname,string $firstname, string $defaddress, string $tel, bool $tos) {
    $query = "INSERT INTO webshop.users (username, lastname, firstname, email, pwd, defaddress, tel, tos) VALUES (:username, :lastname, :firstname, :email, :pwd, :defaddress, :tel, :tos);";

    $options = [
        'cost' => 12
    ];

    $hashPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username',$username);
    $stmt->bindParam(':pwd',$hashPwd);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':lastname',$lastname);
    $stmt->bindParam(':firstname',$firstname);
    $stmt->bindParam(':defaddress',$defaddress);
    $stmt->bindParam(':tel',$tel);
    $stmt->bindParam(':tos',$tos);
    $stmt->execute();
}