<head>
    <link rel="stylesheet" href="../css/forum.css">
</head>

<div class="comment">
  <h4>Név: <?php echo $data['name']; ?></h4>
  
  <p class="comment_box">Kérdés: <?php echo $data['comment']; ?></p>
  <p class="dátum"><?php echo $data['date']; ?></p>
  <?php $reply_id = $data['id']; ?>
  <button class="reply" onclick = "reply(<?php echo $reply_id; ?>, '<?php echo $data['name']; ?>');"><span>válasz</span></button>

  
  <?php
  unset($datas);
  $datas = mysqli_query($conn, "SELECT * FROM tb_dataforum WHERE reply_id = $reply_id");
  if(mysqli_num_rows($datas) > 0) {
    foreach($datas as $data){
      require 'reply.php';
    }
  }
  ?>
  
</div>