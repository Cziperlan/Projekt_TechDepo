<?php

if ($_SERVER["REQEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
    $lastname = $_POST["lastname"];
    $firstname = $_POST["firstname"];
    $defaddress = $_POST["defaddress"];
    $tel = $_POST["tel"];
    $tos = $_POST["tos"];

    try {
        require_once 'dbhandler.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_control.inc.php;';

        /*Error Handlers */
        $errors = [];
        
        if (is_input_empty($username, $pwd, $email, $firstname, $lastname, $tos)) {
            $errors["empty_input"] = "Kérjük tölse ki az összes mezőt!";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Ez az email cím nem megfelelő.";
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Ez a felhasználónév foglalt.";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "Ez az email cím már foglalt.";
        }

        require_once 'config.session.inc.php';

        if ($errors) {

            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "username" => $username,
                "email" => $email,
                "lastname" => $lastname,
                "firstname" => $firstname,
                "defaddress" => $defaddress,
                "tel" => $tel,
            ];

            $_SESSION["signup_data"] = $signupData;
            header("Location: ../account/signup.php");

            die();
        }

        create_user($pdo, $username, $pwd, $email, $lastname, $firstname, $defaddress, $tel);
        header("Location: ../pages/account.php?signup=success");

        $pdo = null;
        $stmt = null;
        
        die();

    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
    }
} else {
    header("Location: ../account/signup.php");
    die();
}