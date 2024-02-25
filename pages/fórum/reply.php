<div class="reply">
    <h4>Válasz</h4>
  
    <h4>Név: <?php echo $data['name']; ?></h4>
  
    <p><?php echo $data['comment']; ?></p>


    <p class="dátum"><?php echo $data['date']; ?></p>


  <?php $reply_id = $data['id']; ?>
  <button class="reply" onclick = "reply(<?php echo $reply_id; ?>, '<?php echo $data['name']; ?>');">Válasz</button>
  <?php
  unset($datas);
  $datas = mysqli_query($conn, "SELECT * FROM tb_data WHERE reply_id = $reply_id");
  if(mysqli_num_rows($datas) > 0) {
    foreach($datas as $data){
      require 'reply.php';
    }
  }
  ?>
  <style>
    p.dátum{
        font-style: italic;
        font-size: small;
        font-family: 'Courier New', Courier, monospace;
    }
  </style>
</div>