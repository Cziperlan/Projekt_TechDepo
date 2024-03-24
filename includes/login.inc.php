<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once 'dbhandler.inc.php';    
        require_once 'login_model.inc.php';
        require_once 'login_control.inc.php';

        $errors = [];
        
        if (is_input_empty($username, $pwd)) {
            $errors["empty_input"] = "Kérjük tölse ki az összes mezőt!";
        }

        $result = get_user($pdo, $username);

        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = "Hibás felhasználónév!";
        }
        if (!is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])) {
            $errors["login_incorrect"] = "Hibás jelszó!";
        }

        require_once 'config.session.inc.php';

        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            header("Location: ../pages/account.php");

            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["felhasznalo_id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["felhasznalo_id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        $_SESSION["lastname"] = htmlspecialchars($result["lastname"]);
        $_SESSION["firstname"] = htmlspecialchars($result["firstname"]);
        $_SESSION["email"] = htmlspecialchars($result["email"]);
        $_SESSION["homeaddress"] = htmlspecialchars($result["defaddress"]);
        $_SESSION["delivery_address"] = htmlspecialchars($result["Szállítási_cím"]);
        $_SESSION["tel"] = htmlspecialchars($result["tel"]);
        $_SESSION["join_date"] = htmlspecialchars($result["Regisztráció_ideje"]);

        $_SESSION["last_regeneration"] = time();

        header("Location: ../pages/account.php?login=success");
        $pdo = null;
        $statement = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../pages/account.php");
    die();
}
