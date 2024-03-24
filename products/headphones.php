<?php
        require 'config.php';
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
    <title>TechDepo - Fejhallgatók</title>
</head>
<body>
    <header>
        <div class="header">
                    <a href="../index.php">
                         <img src="../logo.png" alt="TechDepo logó">
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
                    <a  class="header-dis" href="../pages/account.php"><i class="fas fa-user" aria-hidden="true"></i></a>
                    <a class="header-dis" href="../account/wishlist.php"><i class="fas fa-star" aria-hidden="true"></i></a>
                    <a href="../account/cart.php"><i class="fas fa-shopping-cart" aria-hidden="true"></i></a>
                    <a class="header-dis2" href="../pages/tracking.php">TRACK YOUR ORDER</a>
                </div>
        </div>
        <div class="sidenav" id="navSide">
                            <a href="" class="closebtn" onclick="closeNav()"><i class="fa fa-xmark"></i></a>
                            <a href="../products/featured.php">Ajánlataink</a>
                            <a class="sidedrop" onclick="dropSide()">Termékeink <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                <div class="sidecont">
                                    <a href="../products/towers.php"> - Számítógépek</a>
                                    <a href="../products/notebooks.php"> - Laptopok</a>
                                    <a href="../products/monitors.php"> - Monitorok</a>
                                    <a href="../products/headphones.php"> - Fejhallgatók</a>
                                </div>
                            <a class="sidedrop" onclick="dropSide2()">Rólunk <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                <div class="sidecont2">
                                    <a href="../pages/about.html"> - Cégünkről</a>
                                    <a href=""> - Az oldal használata</a>
                                    <a href="../pages/forum.php"> - Fórum</a>
                                </div>
                        </div>
        <div class="topnav">
                    <div class="menu">
                        <a href="../index.php"><i class="fa fa-home" aria-hidden="true"></i></a>
                        <a href="../pages/account.php"><i class="fa fa-user" aria-hidden="true"></i></a>
                        <a href="../account/wishlist.php"><i class="fa fa-star" aria-hidden="true"></i></a>
                    </div>
                    <button id="hambi" class="sandwitch dropbtn"  onclick="openNav()">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </button>
                <a class="topnav-dis" href="../index.php">Kezdőlap</a>
                <a class="topnav-dis" href="../products/featured.php">Ajánlataink</a>
                <a class="topnav-dis" href="../products/onsale.php">Akcióink</a>
                <div class="dropdown topnav-dis">
                <button class="dropbtn">Termékeink</button>
                    <div class="dropdown-content">
                            <a href="../products/towers.php">Számítógépek</a>
                            <a href="../products/notebooks.php">Laptopok</a>
                            <a href="../products/headphones.php">Fejhallgatók</a>
                            <a href="../products/monitors.php">Monitorok</a>
                    </div>
                </div>
                <div class="dropdown topright topnav-dis">
                    <button class="dropbtn" style="padding-right: 50px">Rólunk</button>
                        <div class="dropdown-content">
                            <a href="../pages/about.html">Cégünkről</a>
                            <a href="">Az oldal használata</a>
                            <a href="../pages/forum.php">TechDepo fórum</a>
                        </div>
                </div>
        </div>
    </header>
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <h5>Szűrők</h5>
                    <hr>
                    <h6 class="text-info">Márka</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT Márka from webshop.fejhallgatók ORDER BY Márka;";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc()){
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product-check" value="<?=$row['Márka']?>" id="Márka"><?=$row['Márka']?>
                                </label>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                    <h6 class="text-info">Típus</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT Típusa from webshop.fejhallgatók ORDER BY Típusa;";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc()){
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product-check" value="<?=$row['Típusa']?>" id="Típusa"><?=$row['Típusa']?>
                                </label>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                    <h6 class="text-info">Jelátvitel</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT Jelátvitel from webshop.fejhallgatók ORDER BY Jelátvitel;";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc()){
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product-check" value="<?=$row['Jelátvitel']?>" id="Jelátvitel"><?=$row['Jelátvitel']?>
                                </label>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                    <h6 class="text-info">Csatlakozók</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT Csatlakozók from webshop.fejhallgatók ORDER BY Csatlakozók;";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc()){
                        ?>
                        <li class="list-group-item ">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product-check" value="<?=$row['Csatlakozók']?>" id="Csatlakozók"><?=$row['Csatlakozók']?>
                                </label>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                    <h6 class="text-info">Érzékenység (32 Ohm)</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT Érzékenység from webshop.fejhallgatók ORDER BY Érzékenység;";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc()){
                        ?>
                        <li class="list-group-item ">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product-check" value="<?=$row['Érzékenység']?>" id="Érzékenység"><?=$row['Érzékenység']?>
                                </label>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                    <h6 class="text-info">Szín</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT Szín from webshop.fejhallgatók ORDER BY Szín;";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc()){
                        ?>
                        <li class="list-group-item ">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product-check" value="<?=$row['Szín']?>" id="Szín"><?=$row['Szín']?>
                                </label>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                </div>
                <div class="col-lg-9">
                                <h5 class="text-center" id="textChange"> Termékek</h5>
                                <hr>
                                <div class="text-center">
                                    <img src="../images/loader.gif" if="loader" width="200" style="display: none;">
                                </div>
                                <div class="row" id="result">
                                        <?php
                                        require 'action.php';
                                        $sql = "SELECT l.*, r.Ár
                                                FROM webshop.fejhallgatók l
                                                JOIN webshop.raktár r ON l.FejID = r.TermékID";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $image_name = $row["FejID"];
                                                $image_path = "../Képek/" . $image_name . ".png";
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
                                                                    Típus : <?= $row['Típusa']; ?><br>
                                                                    Frekvencia átvitel : <?= $row['Frekvenciátvitel']; ?><br>
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
                        <a href="">Az oldal használata</a>
                    </li>
                    <li>
                        <a href="../pages/forum.php">A TechDepo fórum</a>
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
                        <span>techdepo@nincsmail.hu</span>
                    </li>
                    <li>
                        <span>Nyitvatartás: hétköznap 8:00 - 17:00</span>
                    </li>
                    <li>
                        <span>Térkép: <a href="https://maps.app.goo.gl/fA2Jti1fcJiZY9f98"><img src="../images/map1.png" alt="" class="f-ikon"></a></span>
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
                        </ul>
                </div>
            </div>
            <div>
                <p class="f-center">@ 2024-2024 www.techdepo.hu Minden jog fenntartva</p>
            </div>
    </footer>
    <script src="../js/sandwitch.js"></script>
</body>
</html>