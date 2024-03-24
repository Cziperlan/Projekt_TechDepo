<?php 

declare(strict_types=1);

function check_login_errors() {
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION['errors_login'];

        echo '<br>';

        foreach ($errors as $error) {
            echo '<p style="color:red;">'. $error . '</p>';
        }

        unset($_SESSION['errors_login']);
    }
    else if (isset($_GET["login"]) && $_GET["login"] === "success") {
        echo '<br>';
        echo '<p style="color:green;">Belépés sikeres!</p>';
    }
}
function output_username() {
    if (isset($_SESSION["user_id"])) {
       echo '<h1>Üdv újra, '. $_SESSION["user_username"]. '!</h1>';
    } else {
        echo "<h1>Bejelentkezés</h1>";
    }
}

function output_userdata() {
    if (isset($_SESSION["user_id"])) {
        echo '<div class="bigbox-output">';
        echo '<p>Megadott email címed: '. $_SESSION["email"]. '</p>';
        echo '<p>Vezeték neved: '. $_SESSION["lastname"] . '</p>';
        echo '<p>Vezeték neved: '. $_SESSION["firstname"] . '</p>';
        echo '<p>Telefonszámod: '. $_SESSION["tel"]. '</p>';
        echo '<p>Otthoni címed: '. $_SESSION["homeaddress"]. '</p>';
        echo '<p>Szállítási címed: '. $_SESSION["delivery_address"]. '</p>';
        echo '<p>Regisztráció időpontja: '. $_SESSION["join_date"]. '</p>';
        echo '</div>';
    }
    else {
        echo '<h1>Hiba történt!</h1>';
    }
}