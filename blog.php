<?php  
  session_start();
  require_once('./connect/connect.php');
  require_once('head.php');
  require_once('header_bar.php');
  $sql='select * from tb_blog';
  $q=$objCon->query($sql);
?>
<div class="container bg-white">
    <hr>
    <ol class="breadcrumb">
        <li><a href="index.php">หน้าแรก</a></li>
        <li>บทความ</a></li>
    </ol>
    <div class="text-center">
        <?php
            while ($r=$q->fetch_assoc()) {
        ?>
        <a href="blog_view.php?id=<?=$r['blog_id']; ?>"><h3><?=$r['blog_title']; ?></h3></a>
        <a href="blog_view.php?id=<?=$r['blog_id']; ?>">
            <img src="img/blog/<?=$r['blog_pic']; ?>" alt="">
        </a>
        <br><br>
        <a href="blog_view.php?id=<?=$r['blog_id']; ?>" class="btn btn-primary">อ่านเพิ่มเติม...</a>
        <br><br><br>

<?php
  }
?>
    </div>
</div>
<?php
  require_once('script.php');
  $objCon->close();
?>
</body>
</html>
