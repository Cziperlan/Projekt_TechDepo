<?php
    if ($_SERVER["REQEST_METHOD"] == "POST") {
        $productSearch = $_GET["product-search"];
    
        try {
            require_once '../includes/dbhandler.inc.php';
    
            $query = "SELECT * FROM termekek WHERE termek = ':product-search'; ";
    
            $stmt = $pdo->prepare($query);
    
            $stmt->bindParam(":product-search", $productSearch);
    
            $stmt->execute([]);

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $pdo = null;
            $stmt = null;

        } catch (PDOException $exep) {
            die("Query failed" . $exep->getMessage());
            }
            
        
} else {
     header("Location: ../account/signup.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Találatok</title>
</head>
<body>
    
    <?php

    if (empty($results)) {
        echo "<div>";
        echo "<p>Nincs találat!</p>";
        echo "</div>";
    }
    else {
        var_dump($result);
    }

    ?>

</body>
</html>
