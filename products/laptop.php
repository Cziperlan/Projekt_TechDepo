<?php
require 'config.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $productID = $_GET['id']; // Since it's VARCHAR, no need for numeric check

    $sql = "SELECT l.*, r.price 
            FROM webshop.notebooks l 
            JOIN webshop.products r ON l.ProID = r.ProID 
            WHERE l.ProID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $productID); // Bind as string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        die("Product not found.");
    }
} else {
    die("Invalid Product ID.");
}
?>


<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="../images/favicon_white.ico" type="image/x-icon">
    <title><?= htmlspecialchars($product['name']); ?></title>
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
            <div class="topright topnav-dis">
                <a href="./pages/about.html">Cégünkről</a>
            </div>
        </div>
    </header>
    <div class="product-page">
        <div class="product-container">

            <div class="slideshow-section">
                <div class="slideshow">
                    <img src="../Képek/1/<?= urlencode($product['ProID']); ?>.jpg" alt="Product Image 1" class="active">
                    <img src="../Képek/1/<?= urlencode($product['ProID']); ?>-1.jpg" alt="Product Image 2">
                </div>
                <div class="thumbnails">
                    <div class="thumbnail active" data-index="0">
                        <img src="../Képek/1/<?= urlencode($product['ProID']); ?>.jpg" alt="Thumbnail 1">
                    </div>
                    <div class="thumbnail" data-index="1">
                        <img src="../Képek/1/<?= urlencode($product['ProID']); ?>-1.jpg" alt="Thumbnail 2">
                    </div>
                </div>
            </div>

            <div class="details-section">
                <h1><?= htmlspecialchars($product['name']); ?></h1>
                <p class="price"><?= htmlspecialchars($product['price']); ?> FT</p>
                <div class="description">
                    <p>Processzor: <?= htmlspecialchars($product['cpu_type']); ?>, <?= $product['cpu_clock']; ?>,
                        <?= $product['cpu_cores']; ?> mag
                    </p>
                    <p>Memória: <?= htmlspecialchars($product['ram_size']); ?> GB, <?= $product['ram_type']; ?></p>
                    <p>Videókártya: <?= htmlspecialchars($product['gpu']); ?></p>
                    <p>Háttértár: <?= htmlspecialchars($product['drive_size']); ?> GB, <?= $product['drive_type']; ?>
                    </p>
                    <p>Képernyő mérete: <?= htmlspecialchars($product['screen_size']); ?> col</p>
                    <p>Felbontás: <?= htmlspecialchars($product['resolution']); ?></p>
                    <p>Frissítési ráta: <?= htmlspecialchars($product['refresh_rate']); ?></p>
                </div>

                <form action="../account/add_to_cart.php" method="post">
                    <input type="hidden" name="ProID" value="<?= htmlspecialchars($product['ProID']); ?>">
                    <input type="hidden" name="name" value="<?= htmlspecialchars($product['name']); ?>">
                    <input type="hidden" name="price" value="<?= $product['price']; ?>">
                    <div class="options">
                        <label for="color">Szín:</label>
                        <select id="color">
                            <option value="color"><?= htmlspecialchars($product['color']); ?></option>
                        </select>

                        <label for="quantity">Mennyiség:</label>
                        <input type="number" id="quantity" value="1" min="1">
                    </div>
                    <button type="submit">Kosárba</button>
                </form>
            </div>
        </div>

        <!-- Tabs Section -->
        <div class="tabs">
            <div class="tab-buttons">
                <button data-tab="technical">Specifikációk</button>
            </div>
            <div class="flex-table">
                <div class="table-row">
                    <div class="table-bcell">Gyártó:</div>
                    <div class="table-cell"><?= $product['maker']; ?></div>
                </div>
                <div class="table-row">
                    <div class="table-bcell">Képernyő méret:</div>
                    <div class="table-cell"><?= $product['screen_size']; ?></div>
                </div>
                <div class="table-row">
                    <div class="table-bcell">Felbontás:</div>
                    <div class="table-cell"><?= $product['resolution']; ?></div>
                </div>
                <div class="table-row">
                    <div class="table-bcell">Képarány:</div>
                    <div class="table-cell"><?= $product['aspect_ratio']; ?></div>
                </div>
                <div class="table-row">
                    <div class="table-bcell">Frissítési ráta:</div>
                    <div class="table-cell"><?= $product['refresh_rate']; ?></div>
                </div>
                <div class="table-row">
                    <div class="table-bcell">Processzor típusa:</div>
                    <div class="table-cell"><?= $product['cpu_type']; ?></div>
                </div>
                <div class="table-row">
                    <div class="table-bcell">Processzor órajele:</div>
                    <div class="table-cell"><?= $product['cpu_clock']; ?></div>
                </div>
                <div class="table-row">
                    <div class="table-bcell">Processzor magok:</div>
                    <div class="table-cell"><?= $product['cpu_cores']; ?></div>
                </div>
                <div class="table-row">
                    <div class="table-bcell">Memória mérete:</div>
                    <div class="table-cell"><?= $product['ram_size']; ?> GB</div>
                </div>
                <div class="table-row">
                    <div class="table-bcell">Memória típusa:</div>
                    <div class="table-cell"><?= $product['ram_type']; ?></div>
                </div>
                <div class="table-row">
                    <div class="table-bcell">Videókártya:</div>
                    <div class="table-cell"><?= $product['gpu']; ?></div>
                </div>
                <div class="table-row">
                    <div class="table-bcell">Háttértár mérete:</div>
                    <div class="table-cell"><?= $product['drive_size']; ?> GB</div>
                </div>
                <div class="table-row">
                    <div class="table-bcell">Háttértár típusa:</div>
                    <div class="table-cell"><?= $product['drive_type']; ?></div>
                </div>
                <div class="table-row">
                    <div class="table-bcell">Optikai meghajtó:</div>
                    <div class="table-cell"><?= $product['optical_drive']; ?></div>
                </div>
                <div class="table-row">
                    <div class="table-bcell">Csatlakozók:</div>
                    <div class="table-cell"><?= $product['ports']; ?></div>
                </div>
                <div class="table-row">
                    <div class="table-bcell">Wlan szabvány</div>
                    <div class="table-cell"><?= $product['wlan_version']; ?></div>
                </div>
                <div class="table-row">
                    <div class="table-bcell">Bluetooth:</div>
                    <div class="table-cell"><?= $product['bluetooth']; ?></div>
                </div>
                <div class="table-row">
                    <div class="table-bcell">Bluetooth verzió:</div>
                    <div class="table-cell"><?= $product['bluetooth_version']; ?></div>
                </div>
                <div class="table-row">
                    <div class="table-bcell">Akkumulátor kapacitás:</div>
                    <div class="table-cell"><?= $product['battery']; ?></div>
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
    <script>
        const slideshowImages = document.querySelectorAll('.slideshow img');
        const thumbnails = document.querySelectorAll('.thumbnail');
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');
        const tabButtons = document.querySelectorAll('.tab-buttons button');
        const tabContents = document.querySelectorAll('.tab-content');

        let currentIndex = 0;
        const changeImage = (index) => {
            slideshowImages.forEach(image => image.classList.remove('active'));
            thumbnails.forEach(thumb => thumb.classList.remove('active'));

            slideshowImages[index].classList.add('active');
            thumbnails[index].classList.add('active');
        };

        thumbnails.forEach((thumbnail, index) => {
            thumbnail.addEventListener('click', () => {
                currentIndex = index;
                changeImage(currentIndex);
            });
        });

        prevButton.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + slideshowImages.length) % slideshowImages.length;
            changeImage(currentIndex);
        });

        nextButton.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % slideshowImages.length;
            changeImage(currentIndex);
        });

        setInterval(() => {
            currentIndex = (currentIndex + 1) % slideshowImages.length;
            changeImage(currentIndex);
        }, 10000);

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                button.classList.add('active');
                document.getElementById(button.dataset.tab).classList.add('active');
            });
        });
    </script>
    <script src="./js/sandwitch.js"></script>
</body>

</html>