<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/general.css">
    <title>TechDepo - Regisztáció</title>
</head>

<body>
    <h2>Regisztráció</h2>
    <form action="includes/formhandler.inc.php" method="POST">
        <label for="username">Felhasználónév</label>
        <input type="text" name="username" placeholder="Felhasználónév">
        <label for="pwd">Jelszó</label>
        <input type="text" name="pwd" placeholder="Jelszó">
        <label for="email">E-Mail cím</label>
        <input type="text" name="email" placeholder="E-Mail cím">
        <label for="firstname">Keresztnév</label>
        <input type="text" name="firstname" placeholder="Keresztnév">
        <label for="lastname">Vezetéknév</label>
        <input type="text" name="lastname" placeholder="Vezetéknév">
        <button type="submit">Regisztráció</button>
    </form>
</body>

</html>