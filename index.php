
<?php
    require_once './includes/config.session.inc.php';
    require './products/action.php';
?>


<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="images/favicon_white.ico" type="image/x-icon">
    <title>TechDepo - Főoldal</title>
</head>
<body id="body" onload="NowShow(1)">
    <header>
        <div class="header">
                    <a href="index.php">
                         <img src="logo.png" alt="TechDepo logó">
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
                    <a  class="header-dis" href="./pages/account.php"><i class="fas fa-user" aria-hidden="true"></i></a>
                    <a class="header-dis" href="./account/wishlist.php"><i class="fas fa-star" aria-hidden="true"></i></a>
                    <a href="./account/cart.php"><i class="fas fa-shopping-cart" aria-hidden="true"></i></a>
                    <a class="header-dis2" href="./pages/tracking.php">TRACK YOUR ORDER</a>
                </div>
        </div>
        <div class="sidenav" id="navSide">
                            <a href="" class="closebtn" onclick="closeNav()"><i class="fa fa-xmark"></i></a>
                            <a href="./products/featured.php">Ajánlataink</a>
                            <a class="sidedrop" onclick="dropSide()">Termékeink <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                <div class="sidecont">
                                    <a href="./products/towers.php"> - Számítógépek</a>
                                    <a href="./products/notebooks.php"> - Laptopok</a>
                                    <a href="./products/monitors.php"> - Monitorok</a>
                                    <a href="./products/headphones.php"> - Fejhallgatók</a>
                                </div>
                            <a class="sidedrop" onclick="dropSide2()">Rólunk <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                <div class="sidecont2">
                                    <a href="./pages/about.html"> - Cégünkről</a>
                                    <a href=""> - Az oldal használata</a>
                                    <a href="./pages/forum.php"> - Fórum</a>
                                </div>
                        </div>
        <div class="topnav">
                    <div class="menu">
                        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i></a>
                        <a href="./pages/account.php"><i class="fa fa-user" aria-hidden="true"></i></a>
                        <a href="./account/wishlist.php"><i class="fa fa-star" aria-hidden="true"></i></a>
                    </div>
                    <button id="hambi" class="sandwitch dropbtn"  onclick="openNav()">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </button>
                <a class="topnav-dis" href="index.php">Kezdőlap</a>
                <a class="topnav-dis" href="./products/featured.php">Ajánlataink</a>
                <a class="topnav-dis" href="./products/onsale.php">Akcióink</a>
                <div class="dropdown topnav-dis">
                <button class="dropbtn">Termékeink</button>
                    <div class="dropdown-content">
                            <a href="./products/towers.php">Számítógépek</a>
                            <a href="./products/notebooks.php">Laptopok</a>
                            <a href="./products/headphones.php">Fejhallgatók</a>
                            <a href="./products/monitors.php">Monitorok</a>
                    </div>
                </div>
                <div class="dropdown topright topnav-dis">
                    <button class="dropbtn" style="padding-right: 50px">Rólunk</button>
                        <div class="dropdown-content">
                            <a href="./pages/about.html">Cégünkről</a>
                            <a href="">Az oldal használata</a>
                            <a href="./pages/forum.php">TechDepo fórum</a>
                        </div>
                </div>
        </div>
    </header>
    <a class="jumper" href="#jump"><i class="fas fa-angle-double-down"></i></a>
    <div class="slideshow">
        <div class="S">
            <div class="Scont">
                <img class="Spic" src="./gallery/index_S_PC2.png" alt="Számítógépek">
                <div class="overlayer">
                    <p class="overlayer_text">Számítógépek</p>
                    <a href="./products/towers.php"><button class="ov_button" >- megtekint -</button></a>
                </div>
            </div>
        </div>
        <div class="S">
            <div class="Scont">
                <img class="Spic" src="./gallery/index_S_laptop2.jpg" alt="Laptopok">
                <div class="overlayer">
                    <p class="overlayer_text">Laptopok</p>
                    <a href="./products/notebooks.php"><button class="ov_button" >- megtekint -</button></a>
                </div>
            </div>
        </div>
        <div class="S">
            <div class="Scont">
                <img class="Spic" src="./gallery/index_S_headphones2.webp" alt="Fejhallgatók">
                <div class="overlayer">
                    <p class="overlayer_text">Fejhallgatók</p>
                    <a href="./products/headphones.php"><button class="ov_button" >- megtekint -</button></a>
                </div>
            </div>
        </div>
        <div class="S">
            <div class="Scont">
                <img class="Spic" src="./gallery/index_S_monitors2.jpg" alt="monitors">
                <div class="overlayer">
                    <p class="overlayer_text">Monitorok</p>
                    <a href="./products/monitors.php"><button class="ov_button" >- megtekint -</button></a>
                </div>
            </div>
        </div>
        <div class="S">
            <div class="Scont">
                <img class="Spic" src="./gallery/index_S_peripherals.webp" alt="peripherals">
                <div class="overlayer">
                    <p class="overlayer_text">Perifériák</p>
                    <a href="./products/accessories.php"><button class="ov_button" >- megtekint -</button></a>
                </div>
            </div>
        </div>
        <a class="prev" onclick="Skip(-1)">❮</a>
        <a class="next" onclick="Skip(1)">❯</a>
    </div>
    <br>
    <div style="text-align:center">
        <span class="dind activus" onclick="NowShow(1)"></span>
        <span class="dind" onclick="NowShow(2)"></span>
        <span class="dind" onclick="NowShow(3)"></span>
        <span class="dind" onclick="NowShow(4)"></span>
        <span class="dind" onclick="NowShow(5)"></span>
    </div>
    <span id="jump"></span>
    <div class="container-fluid">
    <div class="row topgin">
            <div class="col-lg-12">
                                <h1 class="text-center bottomgin" id="textChange">Számítógépek</h1>
                                <hr>
                                <div class="text-center">
                                    <img src="./images/loader.gif" if="loader" width="200" style="display: none;">
                                </div>
                                <div class="row" id="result">
                                        <?php
                                        $sql = "SELECT l.*, r.Ár
                                                FROM webshop.laptopok l
                                                JOIN webshop.raktár r ON l.LaptopID = r.TermékID LIMIT 4;";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $image_name = $row["LaptopID"];
                                                $image_path = "./Képek/" . $image_name . ".png";
                                                ?>
                                                <div class="col-md-3 mb-2">
                                                    <div class="cars-deck">
                                                        <div class="card border-secondary">
                                                            <img src="<?= $image_path ?>" class="card-img-top">
                                                            <div class="card-img-overlay">
                                                                <h6 style="margin-top:175px;" class="text-light bg-info text-center rounded p-1 "><?= $row['Név']; ?></h6>
                                                            </div>
                                                            <div class="card-body">
                                                                <h4 class="card-title text-danger">Ár : <?= number_format($row['Ár']); ?>/-</h4>
                                                                <p>
                                                                    RAM : <?= $row['RAM_mérete']; ?> Gb<br>
                                                                    Processzor : <?= $row['Processzor']; ?><br>
                                                                    Merevlemez_mérete : <?= $row['Merevlemez_mérete']; ?><br>
                                                                </p>
                                                                <a href="#" class="btn btn-success btn-block">Kosárba</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            echo "Nincs találat";
                                        }
                                                 ?>
                                    </div>
            </div>
    </div>
    <div class="row topgin">
                <div class="col-lg-12">
                                <h1 class="text-center bottomgin" id="textChange">Számítógépek</h1>
                                <hr>
                                <div class="text-center">
                                    <img src="./images/loader.gif" if="loader" width="200" style="display: none;">
                                </div>
                                <div class="row" id="result">
                                        <?php
                                        $sql = "SELECT l.*, r.Ár
                                                FROM webshop.pc  l
                                                JOIN webshop.raktár r ON l.PCID = r.TermékID LIMIT 4;";
                                                
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $image_name = $row["PCID"];
                                                $image_path = "./Képek/" . $image_name . ".png";
                                                ?>
                                                <div class="col-md-3 mb-2">
                                                    <div class="cars-deck">
                                                        <div class="card border-secondary">
                                                            <img src="<?= $image_path ?>" class="card-img-top">
                                                            <div class="card-img-overlay">
                                                                <h6 style="margin-top:175px;" class="text-light bg-info text-center rounded p-1 "><?= $row['Név']; ?></h6>
                                                            </div>
                                                            <div class="card-body">
                                                                <h4 class="card-title text-danger">Ár : <?= number_format($row['Ár']); ?>/-</h4>
                                                                <p>
                                                                    Márka : <?= $row['Márka']; ?><br>
                                                                    Processzor típusa : <?= $row['Processzor_típusa']; ?><br>
                                                                    Videókártya : <?= $row['Videókártya']; ?><br>
                                                                </p>
                                                                <a href="#" class="btn btn-success btn-block">Kosárba</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            echo "Nincs találat";
                                        }
                                                 ?>
                                </div>
                            </div>
    </div>
    <div class="row topgin">
            <div class="col-lg-12 bottomgin">
                                <h1 class="text-center bottomgin" id="textChange">Monitorok</h1>
                                <hr>
                                <div class="text-center">
                                    <img src="./images/loader.gif" if="loader" width="200" style="display: none;">
                                </div>
                                <div class="row" id="result">
                                        <?php
                                        $sql = "SELECT l.*, r.Ár
                                                FROM webshop.monitorok  l
                                                JOIN webshop.raktár r ON l.MonitorID = r.TermékID LIMIT 4;";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $image_name = $row["MonitorID"];
                                                $image_path = "./Képek/" . $image_name . ".png";
                                                ?>
                                                <div class="col-md-3 mb-2">
                                                    <div class="cars-deck">
                                                        <div class="card border-secondary">
                                                            <img src="<?= $image_path ?>" class="card-img-top">
                                                            <div class="card-img-overlay">
                                                                <h6 style="margin-top:175px;" class="text-light bg-info text-center rounded p-1 "><?= $row['Név']; ?></h6>
                                                            </div>
                                                            <div class="card-body">
                                                                <h4 class="card-title text-danger">Ár : <?= number_format($row['Ár']); ?>/-</h4>
                                                                <p>
                                                                    Márka : <?= $row['Márka']; ?><br>
                                                                    Felbontás : <?= $row['Felbontás']; ?><br>
                                                                    Képfrissítés: <?= $row['Képfrissítés']; ?><br>
                                                                </p>
                                                                <a href="#" class="btn btn-success btn-block">Kosárba</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            echo "Nincs találat";
                                        }
                                                 ?>
                                    </div>
                </div>
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
                        <a href="./policies/privacy-policy.html">Adatvédelmi tájékoztató</a>
                    </li>
                    <li>
                        <a href="./policies/refund-policy.html">Pénzvisszatérítési garancia</a>
                    </li>
                    <li>
                        <a href="./policies/refund-policy.html">Szállítás</a>
                    </li>
                    <li>
                        <a href="./pages/faq.html">GYIK</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12 und">
                <h1 class="footer-title">Rólunk</h1>
                <ul class="f-ul">
                    <li>
                        <a href="./pages/about.html">Cégünkről</a>
                    </li>
                    <li>
                        <a href="">Az oldal használata</a>
                    </li>
                    <li>
                        <a href="./pages/forum.php">A TechDepo fórum</a>
                    </li>
                    <li>
                        <a href="./policies/terms-of-service.html">Szolgáltatási feltételek</a>
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
                        <span><a href="mailto:techdepo.hungary@gmail.com">techdepo.hungary@gmail.com</a></span>
                    </li>
                    <li>
                        <span>Nyitvatartás: hétköznap 8:00 - 17:00</span>
                    </li>
                    <li>
                        <span>Térkép: <a href="https://maps.app.goo.gl/fA2Jti1fcJiZY9f98"><img src="./images/map1.png" alt="" class="f-ikon"></a></span>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 und">
                <h1 class="footer-title">Követnél minket?</h1>
                <div class="social-links">
                        <ul class="f-ul">
                            <p>Az alábbi linkeken megteheted:</p>
                                <a href="https://www.instagram.com" target="_blank">
                                    <img src="./images/icon1.png" alt="Instagramm" class="f-ikon">
                                </a>
                                <a href="https://www.facebook.com" target="_blank">
                                    <img src="./images/icon2.png" alt="Facebook" class="f-ikon">
                                </a>
                                <a href="https://twitter.com/?lang=hu" target="_blank">
                                    <img src="./images/icon3.png" alt="Twitter" class="f-ikon">
                                </a>
                        </ul>
                </div>
            </div>
            <div>
                <p class="f-center">@ 2024-2024 www.techdepo.hu Minden jog fenntartva</p>
            </div>
    </footer>
    <script src="./js/slideshow.js"></script>
    <script src="./js/sandwitch.js"></script>
</body>

</html>