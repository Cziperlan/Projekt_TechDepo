<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>TechDepo - Főoldal</title>
</head>

<body id="body" onload="NowShow(1)">
    <header>
        <div class="header">
                    <a href="index.php">
                         <img src="../logo.png" alt="TechDepo logó">
                    </a> 
                <div>
                    <form action="" method="get">
                        <input type="text" id="search" name="search" placeholder="Keresés...">
                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                <div>  
                    <a class="header-dis" href="../account/signup.php"><i class="fas fa-user" aria-hidden="true"></i></a>
                    <a class="header-dis" href="../account/wishlist.html"><i class="fas fa-star" aria-hidden="true"></i></a>
                    <a href="/account/cart.html"><i class="fas fa-shopping-cart" aria-hidden="true"></i></a>
                    <a class="header-dis2" href="../pages/tracking.php">TRACK YOU ORDER</a>
                </div>
        </div>
        <div class="topnav">
                <div class="menu">
                   <a href=""><i class="fa fa-home" aria-hidden="true"></i></a>
                   <a href=""><i class="fa fa-user" aria-hidden="true"></i></a>
                   <a href=""><i class="fa fa-star" aria-hidden="true"></i></a>
                </div>
              <div class="sandwitch" onclick="tranSandwitch(this)">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
                <a class="topnav-dis" href="../pages/index.php">Kezdőlap</a>
                <a class="topnav-dis" href="">Ajánlataink</a>
                <div class="dropdown top topnav-dis">
                    <button class="dropbtn">Termékeink</button>
                        <div class="dropdown-content">
                            <div class="subdown">
                                <button class="subbtn">Számítógépek</button>
                                    <div class="subdown-content">
                                        <a href="">Gamer PC</a>
                                        <a href="">Irodai PC</a>
                                    </div>
                            </div>
                            <div class="subdown">
                                <button class="subbtn">Laptopok</button>
                                    <div class="subdown-content subdown-second">
                                        <a href="">Gamer Laptopok</a>
                                        <a href="">Notebookok</a>
                                    </div>
                            </div>
                            <div class="subdown">
                                <button class="subbtn">Kiegészítők</button>
                            <div class="subdown-content subdown-third">
                                        <a href="">Fejhallgatók</a>
                                        <a href="">Monitorok</a>
                                        <a href="">Perifériák</a>
                                    </div>
                            </div>
                        </div>
                </div>
            
                <a class="topnav-dis" href="">Brandek</a>
                <a class="topnav-dis" href="">Akciós Termékeink</a>
                <div class="dropdown topright topnav-dis">
                    <button class="dropbtn">Rólunk</button>
                        <div class="dropdown-content">
                            <a href="">Cégünkről</a>
                            <a href="">Az oldal használata</a>
                            <a href="../pages/forum.php">TechDepo fórum</a>
                        </div>
                </div>
        </div>
    </header>
    <a class="jumper" href="#jump"><i class="fas fa-angle-double-down"></i></a>
    <div class="slideshow">
        <div class="S">
            <div class="Scont">
                <img class="Spic" src="../gallery/index_S_PC2.png" alt="Számítógépek">
                <div class="overlayer">
                    <p class="overlayer_text">Számítógépek</p>
                    <a href="../products/towers.html"><button class="ov_button" >- megtekint -</button></a>
                </div>
            </div>
        </div>
        <div class="S">
            <div class="Scont">
                <img class="Spic" src="../gallery/index_S_laptop2.jpg" alt="Laptopok">
                <div class="overlayer">
                    <p class="overlayer_text">Laptopok</p>
                    <a href="../products/notebooks.html"><button class="ov_button" >- megtekint -</button></a>
                </div>
            </div>
        </div>
        <div class="S">
            <div class="Scont">
                <img class="Spic" src="../gallery/index_S_headphones2.webp" alt="Fejhallgatók">
                <div class="overlayer">
                    <p class="overlayer_text">Fejhallgatók</p>
                    <a href="../products/headphones.html"><button class="ov_button" >- megtekint -</button></a>
                </div>
            </div>
        </div>
        <div class="S">
            <div class="Scont">
                <img class="Spic" src="../gallery/index_S_monitors2.jpg" alt="monitors">
                <div class="overlayer">
                    <p class="overlayer_text">Monitorok</p>
                    <a href="../products/monitors.html"><button class="ov_button" >- megtekint -</button></a>
                </div>
            </div>
        </div>
        <div class="S">
            <div class="Scont">
                <img class="Spic" src="../gallery/index_S_peripherals.webp" alt="peripherals">
                <div class="overlayer">
                    <p class="overlayer_text">Perifériák</p>
                    <a href="../products/monitors.html"><button class="ov_button" >- megtekint -</button></a>
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
    <!--
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="carousel carousel-showmanymoveone slide" id="itemslider">
                    <div class="carousel-inner">

                        <div class="item active">
                            <div class="col-xs-12 col-sm-6 col-md-2">
                                <a href="#">
                                    <img src="" class="img-responsive center-block"></a>
                                <h4 class="text-center"></h4>
                                <h5 class="text-center"></h5>
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-xs-12 col-sm-6 col-md-2">
                                <a href="#">
                                    <img src="" class="img-responsive center-block">
                                </a>
                                <h4 class="text-center"></h4>
                                <h5 class="text-center"></h5>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-xs-12 col-sm-6 col-md-2">
                                <a href="#">
                                    <img src="" class="img-responsive center-block">
                                </a>
                                <span class="badge"></span>
                                <h4 class="text-center"></h4>
                                <h5 class="text-center"></h5>
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-xs-12 col-sm-6 col-md-2">
                                <a href="#">
                                    <img src="" class="img-responsive center-block">
                                </a>
                                <h4 class="text-center"></h4>
                                <h5 class="text-center"></h5>
                            </div>
                        </div>
                    </div>
                        <div id="slider-control">
                            <a class="left carousel-control" href="#itemslider" data-slide="prev">
                                <img src="https://cdn0.iconfinder.com/data/icons/website-kit-2/512/icon_402-512.png"
                                    alt="Left" class="img-responsive">
                            </a>
                            <a class="right carousel-control" href="#itemslider" data-slide="next">
                                <img src="http://pixsector.com/cache/81183b13/avcc910c4ee5888b858fe.png" alt="Right"
                                    class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
    <footer id="topgin">
        <div class="footer row mx-0">
            <div class="col-lg-3 col-md-6 col-sm-12 und">
                <h1 class="footer-title">Regisztrálj a hírlevelünre!</h1>
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
                        <span>Térkép: <a href="térkép"></a></span>
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
    <script src="../js/index.js"></script>
    <script src="../js/slideshow.js"></script>
    <script src="../js/sandwitch.js"></script>
    <script src="../js/carousel.js"></script>
</body>

</html>