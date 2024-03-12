<?php 
    require_once '../includes/config_session.inc.php';
    require_once '../includes/login_view.inc.php'
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="">
    <title>TechDepo - Fiók</title>
</head>
<body>
    <h1>
        <?php
        output_username();
        ?>
    </h1>
    <?php
        if (!isset($_SESSION["user_id"])) { 
    ?>
        <h1>Login</h1>
        <form action="../includes/login.inc.php" method="POST">
            <input type="text" name="username" placeholder="Felhasználónév">
            <input type="password" name="pwd" placeholder="Jelszó">
            <button>Login</button>
        </form>
    <?php
    }   else {
    ?>
        <!--Az oldal bejelentkezés után megjelenő tartalma.-->
    
    <?php
    }
    
    
    ?>
</body>
</html>