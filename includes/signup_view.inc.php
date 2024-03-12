<?php

declare(strict_types=1);

function check_signup_errors() {
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>'.$error.'</p>';
        }

        unset($_SESSION['errors_signup']);
    }
    else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        /*Sikeres regisztráció*/
        echo '<p>Sikeres regisztráció</p>';
    }
}

function signupInput() {

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

    echo '<input class="bigbox-input" type="text" name="lastname" placeholder="Vezetéknév">';

    echo '<input class="bigbox-input" type="text" name="firstname" placeholder="Keresztnév">';
}