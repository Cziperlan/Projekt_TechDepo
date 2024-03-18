<?php
        require 'config.php'
  ?>



<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <title>TechDepo - Számítógépek</title>
</head>

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
                    <a class="header-dis2" href="../pages/tracking.php">TRACK YOU ORDER</a>
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







   



    <body>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <h5>Szűrők</h5>
                    <hr>
                        <!--Márkák-->
                    <h6 class="text-info">Márka</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT Márka from laptopok ORDER BY Márka";
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

                                <!--RAM típusa-->

                    <h6 class="text-info">RAM típusa</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT RAM_típusa from laptopok ORDER BY RAM_típusa";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc()){
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product-check" value="<?=$row['RAM_típusa']?>" id="RAM_típusa"><?=$row['RAM_típusa']?>
                                </label>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                                <!--RAM Mérete-->

                    <h6 class="text-info">RAM méret(Gb)</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT RAM_mérete from laptopok ORDER BY RAM_mérete";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc()){
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product-check" value="<?=$row['RAM_mérete']?>" id="RAM_mérete"><?=$row['RAM_mérete']?>
                                </label>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                                 <!--Processzor-->
                    <h6 class="text-info">Processzor</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT Processzor from laptopok ORDER BY Processzor";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc()){
                        ?>
                        <li class="list-group-item ">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product-check" value="<?=$row['Processzor']?>" id="Processzor"><?=$row['Processzor']?>
                                </label>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                         <!--Merevlemez_típusa-->
                         <h6 class="text-info">Merevlemez típusa</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT Merevlemez_típusa from laptopok ORDER BY Merevlemez_típusa";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc()){
                        ?>
                        <li class="list-group-item ">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product-check" value="<?=$row['Merevlemez_típusa']?>" id="Merevlemez_típusa"><?=$row['Merevlemez_típusa']?>
                                </label>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                                <!--Merevlemez_mérete-->
                    <h6 class="text-info">Merevlemez mérete(Gb)</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT Merevlemez_mérete from laptopok ORDER BY Merevlemez_mérete";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc()){
                        ?>
                        <li class="list-group-item ">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product-check" value="<?=$row['Merevlemez_mérete']?>" id="Merevlemez_mérete"><?=$row['Merevlemez_mérete']?>
                                </label>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                                <!--Felbontás-->
                    <h6 class="text-info">Felbontás</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT Felbontás from laptopok ORDER BY Felbontás";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc()){
                        ?>
                        <li class="list-group-item ">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product-check" value="<?=$row['Felbontás']?>" id="Felbontás"><?=$row['Felbontás']?>
                                </label>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                                <!--Képfrissítés-->
                    <h6 class="text-info">Képfrissítés</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT Képfrissítés from laptopok ORDER BY Képfrissítés";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc()){
                        ?>
                        <li class="list-group-item ">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product-check" value="<?=$row['Képfrissítés']?>" id="Képfrissítés"><?=$row['Képfrissítés']?>
                                </label>
                            </div>
                        </li>
                        <?php }?>
                    </ul>
                            <!--Videókártya-->
                    <h6 class="text-info">Videókártya</h6>
                    <ul class="list-group">
                        <?php
                            $sql="SELECT DISTINCT Videókártya from laptopok ORDER BY Videókártya";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc()){
                        ?>
                        <li class="list-group-item ">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product-check" value="<?=$row['Videókártya']?>" id="Videókártya"><?=$row['Videókártya']?>
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
                                        // Query to fetch data from both tables using JOIN
                                        $sql = "SELECT l.*, r.Ár
                                                FROM laptopok l
                                                JOIN raktár r ON l.LaptopID = r.TermékID";
                                        
                                        // Execute the query
                                        $result = $conn->query($sql);

                                        // Check if there are any results
                                        if ($result->num_rows > 0) {
                                            // Fetching data row by row
                                            while ($row = $result->fetch_assoc()) {
                                                // Retrieve image path for the current laptop
                                                $image_name = $row["LaptopID"];
                                                $image_path = "../Képek/" . $image_name . ".png";



                                                // Displaying laptop information
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
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                
                $(".product_check").click(function(){
                    $("#loader").show();

                    var action = 'data';
                    var Márka = get_filter_text('Márka');
                    var RAM_típusa = get_filter_text('RAM_típusa');
                    var RAM_mérete = get_filter_text('RAM_mérete');
                    var Processzor = get_filter_text('Processzor');
                    var Merevlemez_típusa = get_filter_text('Merevlemez_típusa');
                    var Merevlemez_mérete = get_filter_text('Merevlemez_mérete');
                    var Felbontás = get_filter_text('Felbontás');
                    var Képfrissítés = get_filter_text('Képfrissítés');
                    var Videókártya = get_filter_text('Videókártya');

                    $.ajax({
                        url:'action.php',
                        method:'POST',
                        data:{action:action,Márka:Márka,RAM_típusa:RAM_típusa,RAM_mérete:RAM_mérete,Processzor:Processzor,Merevlemez_típusa:Merevlemez_típusa,Merevlemez_mérete:Merevlemez_mérete,Felbontás:Felbontás,Képfrissítés:Képfrissítés,Videókártya:Videókártya},

                        success: function(response)
                        { 
                        $("#result").html(response);
                        $("#loader").hide();
                        $("#textChange").text("Filtered Products");
                        }
                            
                    });


                });

                function get_filter_text(text_id){
                    var filterData = [];
                    $('#'+text_id+':checked').each(function(){
                        filterData.push($(this).val());
                    });
                    return filterData;
                }

            });
        </script>
    </body>
















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

</html>