<?php

declare(strict_types=1);

function is_input_empty(string $username, string $pwd, string $email, string $lastname, string $firstname, string $defaddress, string $tel, bool $tos) {
    if (empty($username) || empty($pwd) || empty($email) || empty($lastname) || empty($firstname) || empty($defaddress) || empty($tel) || empty($tos)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_username_taken(object $pdo, string $username) {
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

function is_email_registered(object $pdo, string $email) {
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $username, string $pwd, string $email, string $lastname, string $firstname, string $defaddress, string $tel) {
    set_user($pdo, $username, $pwd, $email, $lastname, $firstname, $defaddress, $tel);
}
