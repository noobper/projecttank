<?php  
  session_start();
  require_once('./connect/connect.php');
  require_once('head.php');
  require_once('header_bar.php');
  $sql='select * from tb_blog where blog_id = "'.$_GET['id'].'"';
  $q=$objCon->query($sql);
?>
<div class="container bg-white">
    <?php
        if ($r=$q->fetch_assoc()) {
    ?>
    <hr>
    <ol class="breadcrumb">
        <li><a href="index.php">หน้าแรก</a></li>
        <li><a href="blog.php">บทความ</a></li>
        <li><?=$r['blog_title']; ?></li>
    </ol>
    <div class="text-center">
        <h4><b><?=$r['blog_title']; ?></b></h4>
        <img src="img/blog/<?=$r['blog_pic']; ?>" alt="">
    </div>
        <br><br>
        <div class="col-md-10 col-md-offset-1">
            <h5><?=nl2br($r['blog_body']); ?></h5>
        </div>
<?php
  }
?>
<hr>
</div>
<?php
  require_once('script.php');
  $objCon->close();
?>
</body>
</html>
