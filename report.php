<?php  
  session_start();
  require_once('./connect/connect.php');
  require_once('head.php');
  require_once('header_bar.php');
  $sql = 'select * from tb_report where user_id = "'.$_SESSION["user_id"].'" && report_status = 1 order by report_date DESC';
  $q = $objCon -> query($sql);
  $r= $q->fetch_assoc();
?>
<div class="container bg-white">
<br>
  <div class="text-center">
  <h2>บันทึกปัญหาเรียบร้อย</h2>
  <h5><b>แจ้งปัญหาโดย : <?=$_SESSION['username']; ?></b></h5>
  <br>
    <textarea name="report" rows="10" class="form-control" disabled>
      <?=isset($r['report'])?$r['report']:''; ?> 
    </textarea>
    <p>(กรุณารอเจ้าหน้าติดต่อกลับเพื่อดำเนินการแก้ใขปัญหา)</p>
    <br>
    <a href="index.php" class="button">กลับหน้าแรก</a>
    <br>
    <br>
  </div>
</div>
<?php
  require_once('script.php');
  $objCon->close();
?>
</body>
</html>