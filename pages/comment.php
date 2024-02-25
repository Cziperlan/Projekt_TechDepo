<div class="comment">
  <h4>Név: <?php echo $data['name']; ?></h4>
  
  <p class="comment_box">Kérdés: <?php echo $data['comment']; ?></p>
  <p class="dátum"><?php echo $data['date']; ?></p>
  <?php $reply_id = $data['id']; ?>
  <button class="reply" onclick = "reply(<?php echo $reply_id; ?>, '<?php echo $data['name']; ?>');"><span>válasz</span></button>

  
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
    .h4{
        text-align: center;
    }
    .comment_box{
        text-align: left;
        font-size: large;
        font-weight: bold;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }
   
    
    button {
        border-radius: 1px;
        background-color: #5ca1e1;
        border: none;
        color: #fff;
        text-align: center;
        font-size: 16px;

        width: auto;
        transition: all 0.5s;
        cursor: pointer;

        box-shadow: 0 10px 20px -8px rgba(0, 0, 0,.7);
        }

    button{
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
        }

    button:after {
        content: '»';
        position: absolute;
        opacity: 0;  
        top: 14px;
        right: -20px;
        transition: 0.5s;
        }

    button:hover{
        padding-right: 24px;
        padding-left:8px;
        }

    button:hover:after {
        opacity: 1;
        right: 10px;
        }
  </style>
</div>