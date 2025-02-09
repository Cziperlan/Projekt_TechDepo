<?php
require '../products/config.php'; // Database connection
require '../includes/config.session.inc.php';

if (isset($_GET['product-search']) && !empty($_GET['product-search'])) {
    $searchTerm = "%" . $_GET['product-search'] . "%"; // Add wildcards for partial matches

    // Search in notebooks (laptops) and npc (PCs)
    $sql = "
        SELECT l.ProID, l.name, r.price, 'notebook' AS category FROM webshop.notebooks l 
        JOIN webshop.products r ON l.ProID = r.ProID 
        WHERE r.visible = 1 AND (l.name LIKE ? OR l.ProID LIKE ?)
        
        UNION 
        
        SELECT n.ProID, n.name, r.price, 'npc' AS category FROM webshop.npc n 
        JOIN webshop.products r ON n.ProID = r.ProID 
        WHERE r.visible = 1 AND (n.name LIKE ? OR n.ProID LIKE ?)
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    die("Invalid search query.");
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="../images/favicon_white.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/prod-card.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Level PC - Találatok</title>
</head>
<body>
    <header>
        <div class="header">
            <a href="../index.php">
                <img src="../logo.png" alt="ZeroPC logó">
            </a>
            <div>
                <form action="search.php" method="get">
                    <input type="text" id="search" name="product-search" placeholder="Keresés...">
                    <button type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <div>
                <a class="header-dis" href="../pages/account.php"><i class="fas fa-user" aria-hidden="true"></i></a>
                <a href="../account/cart.php"><i class="fas fa-shopping-cart" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="sidenav" id="navSide">
            <a href="" class="closebtn" onclick="closeNav()"><i class="fa fa-xmark"></i></a>
            <a href="../products/featured.php">Ajánlataink</a>
            <a class="sidedrop" onclick="dropSide()">Termékeink <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <div class="sidecont">
                <a href="../products/towers.php"> - Számítógépek</a>
                <a href="../products/notebooks.php"> - Laptopok</a>
            </div>
        </div>
        <div class="topnav">
            <div class="menu">
                <a href="../index.php"><i class="fa fa-home" aria-hidden="true"></i></a>
                <a href="../pages/account.php"><i class="fa fa-user" aria-hidden="true"></i></a>
            </div>
            <button id="hambi" class="sandwitch dropbtn" onclick="openNav()">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </button>
            <a class="topnav-dis" href="../index.php">Kezdőlap</a>
            <a class="topnav-dis" href="../products/featured.php">Ajánlataink</a>
            <a class="topnav-dis" href="../products/towers.php">Számítógépek</a>
            <a class="topnav-dis" href="../products/notebooks.php">Laptopok</a>
            <div class="topright topnav-dis">
                <a href="./pages/about.html">Cégünkről</a>
            </div>
        </div>
    </header>
    <div class="product-title topgin"><h1>Keresési eredmények</h1></div>
    <div class="product-box">
    <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['category'] === 'notebook') {
                    $product_page = "laptop.php?id=" . urlencode($row['ProID']);
                    $image_path = "../Képek/1/" . $row["ProID"] . ".jpg"; // Notebook images
                } else {
                    $product_page = "pc.php?id=" . urlencode($row['ProID']);
                    $image_path = "../Képek/" . $row["ProID"] . ".jpg"; // PC images
                }
        ?>
                <div class="product-card">
                    <span class="product-badge">Top Deal</span>
                    <a href="<?= $product_page ?>">
                        <img src="<?= $image_path ?>" alt="Product Image" class="product-image">
                        <h3 class="product-title1"><?= htmlspecialchars($row['name']); ?></h3>
                    </a>
                    <p class="product-price"><?= $row['price']; ?> FT</p>
                    <button class="add-to-cart">Kosárba</button>
                </div>
        <?php
            }
        } else {
            echo "<p>Nincs találat.</p>";
        }
        ?>
    </div>
    <footer>
        <div class="footer row mx-0">
            <div class="col-lg-3 col-md-6 col-sm-12 und">
                <h1 class="footer-title">Regisztrálj a hírlevelünkre!</h1>
                <form class="f-form" action="" method="post">
                    <label for="email">Értesülj mindig a legújabb akcióinkról!</label>
                    <br>
                    <input type="text" id="email" name="email" placeholder="E-Mail cím" required>
                    <input type="submit" name="newsletter" id="newsletter">
                </form>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 und">
                <h1 class="footer-title">Irányelveink</h1>
                <ul class="f-ul">
                    <li>
                        <a href="../policies/privacy-policy.html">Adatvédelmi tájékoztató</a>
                    </li>
                    <li>
                        <a href="../policies/refund-policy.html">Pénzvisszatérítési garancia</a>
                    </li>
                    <li>
                        <a href="../policies/refund-policy.html">Szállítás</a>
                    </li>
                    <li>
                        <a href="../pages/faq.php">GYIK</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 und">
                <h1 class="footer-title">Rólunk</h1>
                <ul class="f-ul">
                    <li>
                        <a href="../pages/about.html">Cégünkről</a>
                    </li>
                    <li>
                        <a href="../policies/terms-of-service.html">Szolgáltatási feltételek</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 und">
                <h1 class="footer-title">Személyes átvétel</h1>
                <ul class="f-ul">
                    <li>
                        Győr, Szent István utca 7, 9021
                    </li>

                    <li>
                        <span>+36 20 468 8923</span>
                    </li>
                    <li>
                        <span>level-tech@nincsmail.hu</span>
                    </li>
                    <li>
                        <span>Nyitvatartás: hétköznap 8:00 - 17:00</span>
                    </li>
                    <li>
                        <span>Térkép: <a href="https://maps.app.goo.gl/fA2Jti1fcJiZY9f98"><img src="../images/map1.png"
                                    alt="" class="f-ikon"></a></span>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 und">
                <h1 class="footer-title">Követnél minket?</h1>
                <div class="social-links">
                    <ul class="f-ul">
                        <p>Az alábbi linkeken megteheted:</p>
                        <a href="https://www.instagram.com" target="_blank">
                            <img src="../images/icon1.png" alt="Instagramm" class="f-ikon">
                        </a>
                        <a href="https://www.facebook.com" target="_blank">
                            <img src="../images/icon2.png" alt="Facebook" class="f-ikon">
                        </a>
                        <a href="https://twitter.com/?lang=hu" target="_blank">
                            <img src="../images/icon3.png" alt="Twitter" class="f-ikon">
                        </a>
                        <a href="https://www.youtube.com" target="_blank">
                            <img src="../images/icon4.png" alt="Youtube" class="f-ikon">
                        </a>
                    </ul>
                </div>
            </div>
            <div>
                <p class="f-center">@ 2024-2024 level-tech.domain-expansion.vip Minden jog fenntartva</p>
            </div>
    </footer>
    <script src="../js/sandwitch.js"></script>
</body>
</html>
