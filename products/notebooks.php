<?php
require_once '../includes/config.session.inc.php';
require 'config.php';

$makers = $conn->query("SELECT DISTINCT maker FROM webshop.notebooks WHERE ProID IN (SELECT ProID FROM webshop.products)");
$cpu_types = $conn->query("SELECT DISTINCT cpu_type FROM webshop.notebooks WHERE ProID IN (SELECT ProID FROM webshop.products)");
$ram_sizes = $conn->query("SELECT DISTINCT ram_size FROM webshop.notebooks WHERE ProID IN (SELECT ProID FROM webshop.products)");
$gpus = $conn->query("SELECT DISTINCT gpu FROM webshop.notebooks WHERE ProID IN (SELECT ProID FROM webshop.products)");
$resolutions = $conn->query("SELECT DISTINCT resolution FROM webshop.notebooks WHERE ProID IN (SELECT ProID FROM webshop.products)");
$refresh_rates = $conn->query("SELECT DISTINCT refresh_rate FROM webshop.notebooks WHERE ProID IN (SELECT ProID FROM webshop.products)");
$screen_sizes = $conn->query("SELECT DISTINCT screen_size FROM webshop.notebooks WHERE ProID IN (SELECT ProID FROM webshop.products)");
$drive_sizes = $conn->query("SELECT DISTINCT drive_size FROM webshop.notebooks WHERE ProID IN (SELECT ProID FROM webshop.products)");
$drive_types = $conn->query("SELECT DISTINCT drive_type FROM webshop.notebooks WHERE ProID IN (SELECT ProID FROM webshop.products)");
$bluetooth_versions = $conn->query("SELECT DISTINCT bluetooth_version FROM webshop.notebooks WHERE ProID IN (SELECT ProID FROM webshop.products)");
$batterys = $conn->query("SELECT DISTINCT battery FROM webshop.notebooks WHERE ProID IN (SELECT ProID FROM webshop.products)");
$colors = $conn->query("SELECT DISTINCT color FROM webshop.notebooks WHERE ProID IN (SELECT ProID FROM webshop.products)");

$price_range = $conn->query("SELECT MIN(CAST(REPLACE(price, '.', '') AS UNSIGNED)) as min_price, MAX(CAST(REPLACE(price, '.', '') AS UNSIGNED)) as max_price FROM webshop.products WHERE ProID IN (SELECT ProID FROM webshop.notebooks)");
$price = $price_range->fetch_assoc();
$min_price = $price['min_price'];
$max_price = $price['max_price'];
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
    <title>Level PC - Laptopok</title>
    <style>
        /*Filter*/
        .filter-container {
            background: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            width: 100%;
        }

        .filter-container label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            padding-bottom: 5px;
            border-bottom: 1px solid #ccc;
        }

        .filter-container select,
        .filter-container input {
            margin-bottom: 10px;
            padding: 5px;
            width: 100%;
        }

        .filter-button {
            display: block;
            width: 100%;
            padding:13px;
            background-color:black;
            color: white;
            border: none;
            border-radius:16px;
            cursor: pointer;
            font-size:x-large;
            margin-top:10px;
        }

        .filter-button:hover {
            background-color:#1a1818;
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
                <a class="header-dis" href="../account/wishlist.php"><i class="fas fa-star" aria-hidden="true"></i></a>
                <a href="../account/cart.php"><i class="fas fa-shopping-cart" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="sidenav" id="navSide">
            <a href="" class="closebtn" onclick="closeNav()"><i class="fa fa-xmark"></i></a>
            <a href="./products/featured.php">Ajánlataink</a>
            <a class="sidedrop" onclick="dropSide()">Termékeink <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <div class="sidecont">
                <a href="towers.php"> - Számítógépek</a>
                <a href="notebooks.php"> - Laptopok</a>
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
            <a class="topnav-dis" href="featured.php">Ajánlataink</a>
            <a class="topnav-dis" href="towers.php">Számítógépek</a>
            <a class="topnav-dis" href="notebooks.php">Laptopok</a>
        </div>
    </header>
    <div class="split-box">
        <div class="split-left">
            <div class="filter-container">
                <h1>Szűrők</h1>
                <form id="filter-form" class="filter-container">

                    <label>Ár szerinti rendezés:</label>
                    <select name="price_order" id="price_order">
                        <option value="">Nincs</option>
                        <option value="asc">Ár szerint növekvő</option>
                        <option value="desc">Ár szerint csökkenő</option>
                    </select>

                    <label>Gyártó:</label>
                    <select name="maker" id="maker">
                        <option value="">Mind</option>
                        <?php while ($row = $makers->fetch_assoc()) {
                            echo "<option value='{$row['maker']}'>{$row['maker']}</option>";
                        } ?>
                    </select>

                    <label>Felbontás:</label>
                    <select name="resolution" id="resolution">
                        <option value="">Mind</option>
                        <?php while ($row = $resolutions->fetch_assoc()) {
                            echo "<option value='{$row['resolution']}'>{$row['resolution']}</option>";
                        } ?>
                    </select>

                    <label>Képfrissítés:</label>
                    <select name="refresh_rate" id="refresh_rate">
                        <option value="">Mind</option>
                        <?php while ($row = $refresh_rates->fetch_assoc()) {
                            echo "<option value='{$row['refresh_rate']}'>{$row['refresh_rate']}</option>";
                        } ?>
                    </select>

                    <label>Képernyő átmérő:</label>
                    <select name="screen_size" id="screen_size">
                        <option value="">Mind</option>
                        <?php while ($row = $screen_sizes->fetch_assoc()) {
                            echo "<option value='{$row['screen_size']}'>{$row['screen_size']}</option>";
                        } ?>
                    </select>

                    <label>Processzor:</label>
                    <select name="cpu_type" id="cpu_type">
                        <option value="">Mind</option>
                        <?php while ($row = $cpu_types->fetch_assoc()) {
                            echo "<option value='{$row['cpu_type']}'>{$row['cpu_type']}</option>";
                        } ?>
                    </select>

                    <label>Memória méret:</label>
                    <select name="ram_size" id="ram_size">
                        <option value="">Mind</option>
                        <?php while ($row = $ram_sizes->fetch_assoc()) {
                            echo "<option value='{$row['ram_size']}'>{$row['ram_size']} GB</option>";
                        } ?>
                    </select>

                    <label>GPU:</label>
                    <select name="gpu" id="gpu">
                        <option value="">Mind</option>
                        <?php while ($row = $gpus->fetch_assoc()) {
                            echo "<option value='{$row['gpu']}'>{$row['gpu']}</option>";
                        } ?>
                    </select>

                    <label>Háttértár mérete:</label>
                    <select name="drive_size" id="drive_size">
                        <option value="">Mind</option>
                        <?php while ($row = $drive_sizes->fetch_assoc()) {
                            echo "<option value='{$row['drive_size']}'>{$row['drive_size']}</option>";
                        } ?>
                    </select>

                    <label>Háttértár típusa:</label>
                    <select name="drive_type" id="drive_type">
                        <option value="">Mind</option>
                        <?php while ($row = $drive_types->fetch_assoc()) {
                            echo "<option value='{$row['drive_type']}'>{$row['drive_type']}</option>";
                        } ?>
                    </select>

                    <label>Bluetooth verzió:</label>
                    <select name="bluetooth_version" id="bluetooth_version">
                        <option value="">Mind</option>
                        <?php while ($row = $bluetooth_versions->fetch_assoc()) {
                            echo "<option value='{$row['bluetooth_version']}'>{$row['bluetooth_version']}</option>";
                        } ?>
                    </select>

                    <label>Akkumulátor kapacitás:</label>
                    <select name="battery" id="battery">
                        <option value="">Mind</option>
                        <?php while ($row = $batterys->fetch_assoc()) {
                            echo "<option value='{$row['battery']}'>{$row['battery']}</option>";
                        } ?>
                    </select>

                    <label>Szín: </label>
                    <select name="color" id="color">
                        <option value="">Mind</option>
                        <?php while ($row = $colors->fetch_assoc()) {
                            echo "<option value='{$row['color']}'>{$row['color']}</option>";
                        } ?>
                    </select>


                    <button type="button" class="filter-button" id="apply-filters">Szűrés indítása</button>
                </form>
            </div>
        </div>
        <div class="split-right" id="product-list">
            <?php
            $sql = "SELECT l.*, r.price FROM webshop.notebooks l JOIN webshop.products r ON l.ProID = r.ProID WHERE r.visible = 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $image_name = $row["ProID"];
                    $image_path = "../Képek/1/" . $image_name . ".jpg";
                    ?>
                    <div class="product-card">
                        <span class="product-badge">Top Deal</span>
                        <a href="laptop.php?id=<?= urlencode($row['ProID']); ?>">
                            <img src="<?= $image_path ?>" alt="Product Image" class="product-image">
                            <h3 class="product-title1"><?= htmlspecialchars($row['name']); ?></h3>
                        </a>
                        <p class="product-price"><?= $row['price']; ?> FT</p>
                        <a href="../account/cart.php?id=<?= urlencode($row['ProID']); ?>">
                            <button class="add-to-cart">Kosárba</button>
                        </a>
                    </div>
                    <?php
                }
            } else {
                echo "Nincs találat";
            }
            ?>
        </div>
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
                        <a href="../pages/faq.html">GYIK</a>
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
    <script src="../js/filter2.js"></script>
</body>

</html>