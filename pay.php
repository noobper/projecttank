<?php  
  session_start();
  require_once('./connect/connect.php');
  require_once('head.php');
  require_once('header_bar.php');
?>
<div class="container bg-white">
<br>
  <div class="text-center">
  <h2>บันทึกหลักฐานการโอนเงินเรียบร้อย</h2>
  <br>
    <img src="img/slip/slip.jpg" alt="">
    <br><br>
    <a href="<?=$_SERVER['HTTP_REFERER']; ?>" class="alert button">ยกเลิก</a>
    <a href="index.php" class="button">กลับหน้าแรก</a>
  </div>
</div>
<?php
  require_once('script.php');
  $objCon->close();
?>
</body>
</html>