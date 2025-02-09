<?php
require_once '../includes/config.session.inc.php';
require_once '../products/config.php';
require_once '../includes/login_view.inc.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: ../account.php");
    exit;
}

$user_id = $_SESSION["user_id"];

// Fetch all orders for the logged-in user
$stmt = $conn->prepare("SELECT OrderID, total_price, shipping_address, status, order_date FROM webshop.orders WHERE UID = ? ORDER BY order_date DESC");
$stmt->bind_param("s", $user_id);
$stmt->execute();
$orders = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="../images/favicon_white.ico" type="image/x-icon">
    <title>Level PC - Rendelések</title>
</head>

<body>
    <header>
        <div class="header">
            <a href="../index.php">
                <img src="../logo.png" alt="ZeroPC logó">
            </a>
            <div>
                <form action="../pages/search.php" method="get">
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
    <div>
        <?php
        if (!isset($_SESSION["user_id"])) {
            header("Location: ../pages/account.php");
        } else { ?>
            <div class="product-box topgin">
                <h1 class="product-title"></h1>
            </div>
            <div class="bigbox">
                <div class="bigbox-inner">
                <?php output_username(); ?>
                    <div class="bigbox-inner-navi" style="margin-bottom: 0px;">
                        <a href="../pages/account.php">Fiókinformáció</a>
                        <a href="../account/modify.php">Fiókbeállítások</a>
                        <a class="activee" href="">Rendelések</a>
                        <a class="last" href="../account/delete.php">Fióktörlés</a>
                    </div>
                    <div class="flex-table">
                    <?php if (empty($orders)): ?>
            <p>Nincsenek rendeléseid.</p>
        <?php else: ?>
            <?php foreach ($orders as $order): ?>
                <h2>Rendelés #<?= $order["OrderID"]; ?></h2>
                <div class="table-row" style="border-top:1px solid black ; border-bottom:1px solid black ;">
                    <div class="table-cell">Dátum: <?= htmlspecialchars($order["order_date"]); ?></div>
                    <div class="table-cell">Szállítási cím: <?= htmlspecialchars($order["shipping_address"]); ?></div>
                    <div class="table-cell">Állapot: <?= htmlspecialchars($order["status"]); ?></div>
                    <div class="table-cell">Összeg: <?= number_format($order["total_price"], 2, ',', '.'); ?> FT</div>
                </div>

                <?php
                // Fetch products in this order
                $stmt = $conn->prepare("
                    SELECT s.ProID, s.quantity, s.price,
                        CASE 
                            WHEN s.ProID LIKE 'L%' THEN (SELECT name FROM webshop.notebooks WHERE ProID = s.ProID)
                            ELSE (SELECT name FROM webshop.npc WHERE ProID = s.ProID)
                        END AS product_name
                    FROM webshop.sinorder s
                    WHERE s.OrderID = ?
                ");
                $stmt->bind_param("i", $order["OrderID"]);
                $stmt->execute();
                $products = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                ?>

                <?php foreach ($products as $item): ?>
                    <?php 
                    $itemTotal = $item["price"] * $item["quantity"];
                    $image_name = $item["ProID"];

                    // Determine correct image path based on ProID prefix
                    if (strpos($image_name, "L") === 0) {
                        $image_path = "../Képek/1/" . $image_name . ".jpg"; // Laptop
                    } else {
                        $image_path = "../Képek/" . $image_name . ".jpg"; // PC
                    }
                    ?>
                    <div class="table-row topgin" style="border-bottom:1px solid black ;">
                        <div class="table-bcell">
                            <img style="width: 100px" src="<?= htmlspecialchars($image_path); ?>" alt="Product Image" onerror="this.src='../Képek/default.jpg'">
                        </div>
                        <div class="table-cell">Termék: <?= htmlspecialchars($item["product_name"]); ?></div>
                        <div class="table-cell">Mennyiség: <?= $item["quantity"]; ?></div>
                        <div class="table-cell">Ár: <?= number_format($itemTotal, 2, ',', '.'); ?> FT</div>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endif; ?>
                    </div>

                </div>
            </div>
            <div class="product-box topgin">
                <h1 class="product-title"></h1>
            </div>
        <?php } ?>
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