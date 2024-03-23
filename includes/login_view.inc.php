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
