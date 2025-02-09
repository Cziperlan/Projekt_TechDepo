<?php
require_once '../includes/config.session.inc.php';
require_once '../products/config.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: ../account.php?rec=checkout.php");
    exit;
}

$user_id = $_SESSION["user_id"];
$totalPrice = 0;

// Fetch user data
$stmt = $conn->prepare("SELECT email FROM webshop.users WHERE UID = ?");
$stmt->bind_param("s", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

// Calculate total price of cart
foreach ($_SESSION["cart"] as $ProID => $item) {
    $totalPrice += $item["price"] * $item["quantity"];
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["checkout"])) {
    $postal_code = $_POST["postal_code"] ?? "";
    $city = $_POST["city"] ?? "";
    $address = $_POST["address"] ?? "";

    // Validate required address fields
    if (empty($postal_code) || empty($city) || empty($address)) {
        die("Error: Töltsön ki minden mezőt.");
    }

    // Construct full shipping address
    $shipping_address = $postal_code . ' ' . $city . ', ' . $address;

    // Validate credit card details
    $card_number = $_POST["card_number"] ?? "";
    $card_expiry = $_POST["card_expiry"] ?? "";
    $card_cvv = $_POST["card_cvv"] ?? "";

    if (empty($card_number) || empty($card_expiry) || empty($card_cvv)) {
        die("Error: Töltse ki a mezőket bankkártya információival.");
    }

    // Insert order into database
    $stmt = $conn->prepare("INSERT INTO webshop.orders (UID, total_price, shipping_address, status) VALUES (?, ?, ?, 'Fizetve')");
    if (!$stmt) {
        die("Prepare failed (orders): " . $conn->error);
    }

    $stmt->bind_param("sds", $user_id, $totalPrice, $shipping_address);
    if (!$stmt->execute()) {
        die("Execute failed (orders): " . $stmt->error);
    }

    // Get last inserted OrderID
    $order_id = $conn->insert_id;

    if (!$order_id) {
        die("Failed to retrieve OrderID.");
    }

    // Save order items
    foreach ($_SESSION["cart"] as $ProID => $item) {
        $stmt = $conn->prepare("INSERT INTO webshop.sinorder (OrderID, ProID, quantity, price) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed (sinorder): " . $conn->error);
        }

        $stmt->bind_param("isid", $order_id, $ProID, $item["quantity"], $item["price"]);
        if (!$stmt->execute()) {
            die("Execute failed (sinorder): " . $stmt->error);
        }
    }

    // Clear cart after checkout
    unset($_SESSION["cart"]);

    // Redirect to orders page
    header("Location: orders.php");
    exit;
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
    <title>LeveL PC - Rendelés befejezése</title>
    <style>
        .checkout-container {
            max-width: 100%;
            padding: 20px;
        }

        .checkout-container .accordion {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 10px;
        }

        .checkout-container .accordion h2 {
            margin: 0;
            cursor: pointer;
        }

        .checkout-container .content {
            display: block;
            padding: 10px 0;
        }

        .checkout-container .form-group {
            margin-bottom: 15px;
        }

        .checkout-container label {
            display: block;
            margin-bottom: 5px;
        }

        .checkout-container input,
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .checkout-container .btn {
            color: white;
            padding: 20px;
            border-radius: 14px;
            background-color: black;
            border: 1px black solid;
            font-size: x-large;
            cursor: pointer;
            width: 100%;
        }

        .checkout-container .btn:hover {
            background-color: #1a1818;
            transition-duration: 0.5s ease;
            transform: scale(1.01);
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        }
    </style>
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
                <a href="../account/wishlist.php"><i class="fa fa-star" aria-hidden="true"></i></a>
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
        </div>
    </header>
    <div class="product-box">
        <h1 class="product-title"></h1>
    </div>
    <div class="bigbox">
        <div class="checkout-container">
            <h1>Rendelés befejezése</h1>
            <form method="post" action="checkout.php">
                <div class="accordion">
                    <h2>Fiók</h2>
                    <div class="content">
                        <p><?= htmlspecialchars($user["email"]); ?></p>
                    </div>
                </div>
                <div class="accordion">
                    <h2>Szállítási cím</h2>
                    <div class="content">
                        <div class="form-group">
                            <label>Ország</label>
                            <select>
                                <option>Magyarország</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Irányítószám: </label>
                            <input type="text" name="postal_code" required>
                        </div>
                        <div class="form-group">
                            <label>Város: </label>
                            <input type="text" name="city" required>
                        </div>
                        <div class="form-group">
                            <label>Cím: </label>
                            <input type="text" name="address" required>
                        </div>
                    </div>
                </div>
                <!-- Shipping Method -->
                <div class="accordion">
                    <h2>Szállítás</h2>
                    <div class="content">
                        <div class="form-group">
                            <label>Standard Szállítás - 7-20 Nap</label>
                            <p>INGYENES</p>
                        </div>
                    </div>
                </div>
                <!-- Product Price -->
                <div class="accordion">
                    <h2>Termék(ek) Ára</h2>
                    <div class="content">
                        <div class="form-group">
                            <p><?= number_format($totalPrice, 2, ',', '.'); ?> FT</p>
                        </div>
                    </div>
                </div>
                <!-- Payment -->
                <div class="accordion">
                    <h2>Fizetési mód</h2>
                    <div class="content">
                        <div class="form-group">
                            <label>Kártyaszám:</label>
                            <input type="text" name="card_number" placeholder="1234 5678 9012 3456" required>
                        </div>
                        <div class="form-group">
                            <label>Lejárati dátum:</label>
                            <input type="text" name="card_expiry" placeholder="12/24" required>
                        </div>
                        <div class="form-group">
                            <label>CVV</label>
                            <input type="text" name="card_cvv" placeholder="123" required>
                        </div>
                    </div>
                </div>
                <button class="btn" type="submit" name="checkout">Megrendelés</button>
            </form>
        </div>
    </div>
    <div class="product-box">
        <h1 class="product-title"></h1>
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
</body>

</html>