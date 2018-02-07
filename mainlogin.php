<?php 
session_start();
require_once('connect/connect.php');
if (!empty($_SESSION['status'])) {
  header('location:./index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="css/stylesheet.css">
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="css/foundation.min.css" />
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="css/app.css" />
<meta charset="utf-8">
<title>JudoTANK (Water Tank)</title>
</head>
<body>
  <!-- หัว  -->
  <div class="container-fluid" style="background-color: black;height: 250px">
    
    </div>
  <!-- เมนู -->
  <nav class="navbar navbar-default">
  <div class="container" style="">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">หจก. ยูโดแท้งค์</a>
    </div>
    <ul class="nav navbar-nav">
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">ผลิตภัณฑ์
        <span class="glyphicon glyphicon-chevron-down"></span></a>
        <ul class="dropdown-menu">
          <?php $sql="SELECT * FROM tb_producttype";
                $q=$objCon->query($sql);
                while ($r=$q->fetch_assoc()) { ?>
          <li><a href="shop.php?type=<?php echo $r['product_type']; ?>"><?php echo $r['type_name']; ?></a></li>
          <?php } ?>
          <li><a href="#">สั่งทำขนาดพิเศษ</a></li>
        </ul>
      </li>
        <li><a href="#">เกี่ยวกับเรา</a></li>
        <li><a href="#">บทความ</a></li>
        <li><a href="#">ติดต่อเรา</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <!-- สมาชิก -->

    <?php require_once('login.php'); ?>
          

    </ul>
  </div>
</nav>
<hr>
<div class="container">
  <ol class="breadcrumb">
    <li><a href="index.php">หน้าแรก</a></li>
    <li><a href="mainlogin.php">บัญชีผู้ใช้งาน</a></li>
    <li>เข้าสู่ระบบ</li>
  </ol>
  <div class="col-md-6 table-bordered">
    <div class="col-md-8 col-md-offset-2">
      <form id="loginfrm" name="loginfrm" method="POST" action=""> <br>
        <h4 class="text-center">ลงชื่อเข้าสู่ระบบ</h4>
        ชื่อผู้ใช้
        <input type="text" name="user_name" id="user_name" placeholder="Username" maxlength="20" autofocus required>
        รหัสผ่าน
        <input type="password" name="user_pass" id="user_pass" placeholder="Password" maxlength="16" autocomplete="off" required> 
        <input type='checkbox' id='toggle' value='0' onchange='togglePassword(this);'>&nbsp; แสดงรหัสผ่าน <br><br>
        <input type="submit" name="submit" id="Login" value="เข้าสู่ระบบ" class="btn btn-primary btn-block btn-lg"><br>
        <!--<input type="button" id="btnlogin" name="btnlogin" value="เข้าสู่ระบบ" class="btn btn-primary btn-block btn-lg" >-->
        <p><a href="forgot_pass.php">ลืมรหัสผ่าน ?</a></p>      
      </form>
    </div>
  </div>
  <div class="col-md-5 col-md-offset-1 table-bordered" >
    <div class="col-md-8 col-md-offset-2"><br>
      <h4 class="text-center">ยังไม่มีบัญชี ?</h4><br>
      <p>ลงทะเบียนเป็นสมาชิคเป็นเพื่อซื้อสินค้า</p>
      <br><br><br><p><br></p><p><br></p>
      <a href="register.php" class="btn btn-primary btn-block btn-lg">สมัคสมาชิก</a><br><br><br>
    </div>
    
  </div>
</div>
<br><br>


<footer>
  <?php include_once('footer.php'); ?>
</footer>

<script src="js/jquery-3.2.1.js"></script> 
<script src="js/bootstrap.js"></script>
<script src="js/funtion.js"></script>
<?php require_once('./connect/function.php'); $objCon->close(); ?>
</body>
</html>

























           
 