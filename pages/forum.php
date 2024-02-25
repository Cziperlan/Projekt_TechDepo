
<?php
$conn = mysqli_connect("localhost", "root", "", "data");

if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $comment = $_POST["comment"];
  $date = date('F d Y, h:i:s A');
  $reply_id = $_POST["reply_id"];

  $query = "INSERT INTO tb_data VALUES('', '$name', '$comment', '$date', '$reply_id')";
  mysqli_query($conn, $query);
}
?>

<html>

   
  <style>
    *{
      margin: 0px;
      padding: 0px;
    }
    body{
      background: #212523;
    }
    .container{
      background: white;
      width: 700px;
      margin: 0 auto;
      padding-top: 6px;
      padding-bottom: 5px;
    }
    .comment, .reply{
      margin-top: 5px;
      padding: 10px;
      border-bottom: 1px solid black;
    }
    .reply{
      border: 1px solid #ccc;
    }
    p{
      margin-top: 5px;
      margin-bottom: 5px;
    }
    form{
      margin: 10px;
      text-align: center;
    }
    form h3{
      margin-bottom: 5px;
    }

   
    form input, form textarea{
      width: 100%;
      padding: 5px;
      margin-bottom: 10px;
    }
    form button.submit, button{
      background: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
      padding: 10px 20px;
      width: 100%;
    }
    button.reply{
      background: pink;
    }
  </style>


  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/general.css">
    <script src="../js/index.js"></script>
    <script src="../js/slideshow.js"></script>
    <script src="../js/sandwitch.js"></script>
    <script src="../js/carousel.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>TechDepo - Főoldal</title>
</head>
<body id="body" onload="NowShow(1)">
<header>
        <div class="header">
                <a href="index.html">
                     <img src="../logo.png" alt="TechDepo logó">
                </a>
                <span class="header-right"></span>
                <a href=""><i class="fas fa-search"></i></a>
                <a href="../account/account.php"><i class="fas fa-user"></i></a>
                <a href="../account/wishlist.html"><i class="fas fa-star"></i></a>
                <a href="/account/cart.html"><i class="fas fa-shopping-cart"></i></a>
                <a href="tracking.html">TRACK YOU ORDER</a>
        </div>
        <div class="topnav">
                <a href="../pages/index.html">Kezdőlap</a>
                <a href="">Ajánlataink</a>
                <a href="">Termékeink</a>
                <a href="">Brandek</a>
                <a href="">Akciós Termékeink</a>
                <a class="topright" href="">Rólunk</a>
            <!--
            <div class="sandwitch" onclick="tranSandwitch(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        -->
        </div>
    </header>



  
    <div class="container">
      <?php
      $datas = mysqli_query($conn, "SELECT * FROM tb_data WHERE reply_id = 0"); 
      foreach($datas as $data) {
        require 'comment.php';
      }
      ?>
      <form action = "" method = "post">
        <h3 id = "title">Üdvözlünk a fórumon!</h3>
        <input type="hidden" name="reply_id" id="reply_id">
        <input class="név" type="text" name="name" placeholder="A neved">
        <textarea name="comment" placeholder="Tegyél fel egy kérdést!"></textarea>
        <button class = "submit" type="submit" name="submit">Közzétesz</button>
      </form>
    </div>

    <script>
      function reply(id, name){
        title = document.getElementById('title');
        title.innerHTML = "Válasz " + name + "-nak";
        document.getElementById('reply_id').value = id;
      }
    </script>
  </body>
</html>