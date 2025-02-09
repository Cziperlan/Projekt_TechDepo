<?php
require_once '../includes/config.session.inc.php';
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
    <title>LeveL PC - Kosár</title>
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
    <div>
            <div class="product-box">
                <h1 class="product-title"></h1>
            </div>
        <?php if (!isset($_SESSION["user_id"])) { ?>
            <div class="product-box">
                <h1 class="product-title"></h1>
            </div>
            <div class="bigbox">
                <div class="bigbox-inner">
                    <h1><a href="../pages/account.php">A kosár használatához <br> jelentkezz be!</a></h1>
                </div>
            </div>
            <div class="product-box topgin">
                <h1 class="product-title"></h1>
            </div>
        <?php } else { ?>
            <div class="bigbox">
                <div class="bigbox-inner">
                    <?php if (!empty($_SESSION["cart"])) {
                           $totalPrice = 0; 
                           ?>
                        <h1 style="margin-top: 0px">A kosarad</h1>
                        <div class="flex-table topgin">
                        <?php foreach ($_SESSION["cart"] as $ProID => $item) {
                            $itemTotal = $item["price"] * $item["quantity"];
                            $totalPrice += $itemTotal; 

                            if (strpos($ProID, "L") === 0) {
                                $image_path = "../Képek/1/" . $ProID . ".jpg";
                            } else {
                                $image_path = "../Képek/" . $ProID . ".jpg";
                            }

                            ?>
                            
                            
                                <div class="table-row-ver2 topgin">
                                    <div class="table-bcell"><img style="width: 100px" src="<?= $image_path; ?>" alt="Product Image"> </div>
                                    <div class="table-cell">Termék: <?= htmlspecialchars($item["name"]); ?></div>
                                    <div class="table-cell">Mennyiség: <?= $item["quantity"]; ?></div>
                                    <div class="table-cell">Ár: <?= $itemTotal; ?> FT</div>
                                </div>

                                <span class="topgin"><a href="../account/remove_from_cart.php?ProID=<?= $ProID ?>">Eltávolítás a kosárból</a></span>
                                <?php } ?>
                                <div class="table-row">
                                    <div class="table-bcell">Összesítve </div>
                                    <div class="table-cell"></div>
                                    <div class="table-cell"></div>
                                    <div class="table-cell"><?= $totalPrice; ?> FT</div>
                                </div>
                        </div>
                        <a class="checkout" href="checkout.php"><button>Tovább a fizetéshez</button></a>
                    <?php } else { ?>
                        <h1>A kosarad üres!</h1>
                        <p><a href="../index.php">Térj vissza a vásárláshoz!</a></p>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <div class="product-box">
                <h1 class="product-title"></h1>
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