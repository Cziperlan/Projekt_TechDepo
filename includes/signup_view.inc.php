<?php

declare(strict_types=1);

function check_signup_errors() {
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p style="color:red;">'.$error.'</p>';
        }

        unset($_SESSION['errors_signup']);
    }
    else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<br>';
        echo '<p >Sikeres regisztráció</p>';
    }
}

function signup_inputs() {

    if(isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
        echo '<input class="bigbox-input" type="text" name="username" placeholder="Felhasználónév" value="' .$_SESSION["signup_data"]["username"].'">';
    } else {
        echo '<input class="bigbox-input" type="text" name="username" placeholder="Felhasználónév">';
    }

    echo '<input class="bigbox-input" type="text" name="pwd" placeholder="Jelszó">';

    if(isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_used"]) && !isset($_SESSION["errors_signup"]["invalid_email"])) {
        echo '<input class="bigbox-input" type="text" name="email" placeholder="E-Mail" value="' .$_SESSION["signup_data"]["email"].'">';
    } else {
        echo '<input class="bigbox-input" type="text" name="email" placeholder="E-Mail cím">';
    }
    if(isset($_SESSION["signup_data"]["lastname"])) {
        echo '<input class="bigbox-input" type="text" name="lastname" placeholder="Vezetéknév" value="' .$_SESSION["signup_data"]["lastname"].'">';
    }
    else {
        echo '<input class="bigbox-input" type="text" name="lastname" placeholder="Vezetéknév">';
    }
    if(isset($_SESSION["signup_data"]["firstname"])) {
        echo '<input class="bigbox-input" type="text" name="firstname" placeholder="Keresztnév" value="' .$_SESSION["signup_data"]["firstname"].'">';
    }
    else {
        echo '<input class="bigbox-input" type="text" name="firstname" placeholder="Keresztnév">';
    }

    if(isset($_SESSION["signup_data"]["defaddress"])) {
        echo '<input class="bigbox-input" type="text" name="defaddress" placeholder="Lakcím" value="' .$_SESSION["signup_data"]["defaddress"].'">';
    }
    else {
        echo '<input class="bigbox-input" type="text" name="defaddress" placeholder="Lakcím">';
    }
    if(isset($_SESSION["signup_data"]["tel"])) {
        echo '<input class="bigbox-input" type="tel" name="tel" placeholder="Telefonszám" value="' .$_SESSION["signup_data"]["tel"].'">';
    }
    else {
        echo '<input class="bigbox-input" type="tel" name="tel" placeholder="Telefonszám">';
    }
}  