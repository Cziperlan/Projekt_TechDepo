<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>TechDepo - Számítógépek</title>
</head>
<body>
    <header>
        <div class="header">
                    <a href="../pages/index.php">
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
                    <a  class="header-dis" href="../account/signup.php"><i class="fas fa-user" aria-hidden="true"></i></a>
                    <a class="header-dis" href="../account/wishlist.html"><i class="fas fa-star" aria-hidden="true"></i></a>
                    <a href="/account/cart.html"><i class="fas fa-shopping-cart" aria-hidden="true"></i></a>
                    <a class="header-dis2" href="../pages/tracking.php">TRACK YOUR ORDER</a>
                </div>
        </div>
        <div class="sidenav" id="navSide">
                            <a href="" class="closebtn" onclick="closeNav()"><i class="fa fa-xmark"></i></a>
                            <a href="">Ajánlataink</a>
                            <a class="sidedrop" onclick="dropSide()">Termékeink <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                <div class="sidecont">
                                    <a href=""> - Számítógépek</a>
                                    <a href=""> - Laptopok</a>
                                </div>
                            <a href="">Brandek</a>
                            <a href="">Rólunk</a>
                            <a href="../pages/forum.php">Fórum</a>
                        </div>
        <div class="topnav">
                    <div class="menu">
                        <a href="../pages/index.php"><i class="fa fa-home" aria-hidden="true"></i></a>
                        <a href=""><i class="fa fa-user" aria-hidden="true"></i></a>
                        <a href=""><i class="fa fa-star" aria-hidden="true"></i></a>
                    </div>
                    <button id="hambi" class="sandwitch dropbtn"  onclick="openNav()">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </button>
                <a class="topnav-dis" href="../pages/index.php">Kezdőlap</a>
                <a class="topnav-dis" href="">Ajánlataink</a>
                <div class="dropdown topnav-dis">
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
    <div class="split-box">
        <div class="split-left">
            <div class="split-inner">
                <h1>Szűrök</h1>
                <div>
                    <form action="" method="get">
                        <input type="checkbox" name="instock" value="true">
                        <label for="instock">Raktáron</label>
                        <input type="checkbox" name="outstock" value="true">
                        <label for="outstock">Előrendeléses</label>
                    </form>
                </div>
                <div class="split-ranger">
                    <h3>Ár</h3>
                    <div class="split-slider">
                        <input id="fromSlider" type="range" value="1000" min="1000" max="1000000"/>
                        <input id="toSlider" type="range" value="1000000" min="1000" max="1000000"/>
                    </div>
                    <div class="split-form">
                        <div class="split-form-cont">
                            <div >Min</div>
                            <input  type="number" id="fromInput" value="1000" min="1000" max="1000000"/>
                        </div>
                        <div class="split-form-cont">
                            <div >Max</div>
                            <input  type="number" id="toInput" value="1000000" min="1000" max="1000000"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="split-right">
            <div class="product-inner">
                <div class="inner-cont">
                    <a href="">
                        <span class="product-link">
                            <img src="../gallery/test_pic2.jpg" alt="">
                        </span>
                        <div class="product-overlay">
                            <p class="poverlay-title"><i class="fas fa-eye"></i></p>
                        </div>
                    </a>
                    <div>
                        <a href=""><h3>Lorem Ipsum</h3></a>
                        <span>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                        <span>999$</span>
                    </div>
                </div>
            </div>
            <div class="product-inner">
                <div class="inner-cont">
                    <a href="">
                        <span class="product-link">
                            <img src="../gallery/test_pic2.jpg" alt="">
                        </span>
                        <div class="product-overlay">
                            <p class="poverlay-title"><i class="fas fa-eye"></i></p>
                        </div>
                    </a>
                    <div>
                        <a href=""><h3>Lorem Ipsum</h3></a>
                        <span>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                        <span>999$</span>
                    </div>
                </div>
            </div>
            <div class="product-inner">
                <div class="inner-cont">
                    <a href="">
                        <span class="product-link">
                            <img src="../gallery/test_pic2.jpg" alt="">
                        </span>
                        <div class="product-overlay">
                            <p class="poverlay-title"><i class="fas fa-eye"></i></p>
                        </div>
                    </a>
                    <div>
                        <a href=""><h3>Lorem Ipsum</h3></a>
                        <span>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                        <span>999$</span>
                    </div>
                </div>
            </div>
            <div class="product-inner">
                <div class="inner-cont">
                    <a href="">
                        <span class="product-link">
                            <img src="../gallery/test_pic2.jpg" alt="">
                        </span>
                        <div class="product-overlay">
                            <p class="poverlay-title"><i class="fas fa-eye"></i></p>
                        </div>
                    </a>
                    <div>
                        <a href=""><h3>Lorem Ipsum</h3></a>
                        <span>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                        <span>999$</span>
                    </div>
                </div>
            </div>
            <div class="product-inner">
                <div class="inner-cont">
                    <a href="">
                        <span class="product-link">
                            <img src="../gallery/test_pic2.jpg" alt="">
                        </span>
                        <div class="product-overlay">
                            <p class="poverlay-title"><i class="fas fa-eye"></i></p>
                        </div>
                    </a>
                    <div>
                        <a href=""><h3>Lorem Ipsum</h3></a>
                        <span>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                        <span>999$</span>
                    </div>
                </div>
            </div>
            <div class="product-inner">
                <div class="inner-cont">
                    <a href="">
                        <span class="product-link">
                            <img src="../gallery/test_pic2.jpg" alt="">
                        </span>
                        <div class="product-overlay">
                            <p class="poverlay-title"><i class="fas fa-eye"></i></p>
                        </div>
                    </a>
                    <div>
                        <a href=""><h3>Lorem Ipsum</h3></a>
                        <span>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                        <span>999$</span>
                    </div>
                </div>
            </div>
            <div class="product-inner">
                <div class="inner-cont">
                    <a href="">
                        <span class="product-link">
                            <img src="../gallery/test_pic2.jpg" alt="">
                        </span>
                        <div class="product-overlay">
                            <p class="poverlay-title"><i class="fas fa-eye"></i></p>
                        </div>
                    </a>
                    <div>
                        <a href=""><h3>Lorem Ipsum</h3></a>
                        <span>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                        <span>999$</span>
                    </div>
                </div>
            </div>
            <div class="product-inner">
                <div class="inner-cont">
                    <a href="">
                        <span class="product-link">
                            <img src="../gallery/test_pic2.jpg" alt="">
                        </span>
                        <div class="product-overlay">
                            <p class="poverlay-title"><i class="fas fa-eye"></i></p>
                        </div>
                    </a>
                    <div>
                        <a href=""><h3>Lorem Ipsum</h3></a>
                        <span>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                        <span>999$</span>
                    </div>
                </div>
            </div>
            <div class="product-inner">
                <div class="inner-cont">
                    <a href="">
                        <span class="product-link">
                            <img src="../gallery/test_pic2.jpg" alt="">
                        </span>
                        <div class="product-overlay">
                            <p class="poverlay-title"><i class="fas fa-eye"></i></p>
                        </div>
                    </a>
                    <div>
                        <a href=""><h3>Lorem Ipsum</h3></a>
                        <span>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                        <span>999$</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
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
    <script src="../js/slideshow.js"></script>
    <script src="../js/sandwitch.js"></script>
    <script src="../js/carousel.js"></script>
    <script src="../js/range-slider.js"></script>
</body>
</html>