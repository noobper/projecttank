<?php  
  session_start();
  $session_id = session_id();
  require('./connect/connect.php');

  
/*        if($_GET['success'] == 1){
            echo '<div id="alert" class="success callout" style="margin-bottom:-8px;"></div>';
        }else if($_GET['Error'] == 1){
            echo '<div id="alert-2" class="alert callout" style="margin-bottom:-8px;"></div>';  
        }
    }
    */
 $user_id = null;
  if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION['user_id'];
    $sql = $objCon->query("SELECT * FROM tb_user WHERE user_id = '".$_SESSION['user_id']."'");
    $data = $sql->fetch_assoc();
   // echo $data['username'];
  }else {
    //echo "error";
  };
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="css/stylesheet.css">
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="css/foundation.min.css" />
<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="css/app.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
<meta charset="utf-8">
<title>JudoTANK (Water Tank)</title>
</head>
<body>
  <!-- หัว  -->
  <div class="container-fluid" style="background-color: black;height: 250px">
  	
  	</div>
  <!-- เมนู -->
  <nav class="navbar navbar-default" role="navigation">
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
   <?php require_once('login.php'); ?>
<hr>
<div class="container">
  <h4 class="text-center"><b>ประเภทสินค้า<b></h4>
    <table class="table table-hover">
  <?php
    $sql="SELECT * from tb_producttype";
    $p = $objCon->query($sql);
    while ($r = $p->fetch_assoc()){ ?>
      <tr>
        <td class="col-md-3">
          <a href="shop.php?type=<?php echo $r['product_type']; ?> " class="btn" role="button">
            <!--<img class="thumbnail" title="<?php echo $type_name." รุ่น ".$r['product_name'];?>" src="./img/<?php echo $r['picture'];?>">-->
          </a>
        </td>
        <td id="mid01" class="mid01" style="vertical-align: middle;">
          <h6><b><?php echo $r['type_name'];?></b></h6>
          <p><a href="shop.php?type=<?php echo $r['product_type']; ?> " class="btn btn-primary btn-lg" role="button" title="ดูรายละเอียดของ <?php echo $r['type_name'];?>">ดูรายละเอียด</a></p>
        </td>
      </tr>      
<?php } ?>      
    </table>
</div>

<footer>
  <div class="container-fluid">

  </div>
</footer>
<script src="js/vendor/jquery.min.js"></script> 
<script src="js/vendor/what-input.min.js"></script> 
<script src="js/foundation.min.js"></script> 
<script src="js/app.js"></script> 

<script src="js/bootstrap.js"></script>
<script src="js/funtion.js" ></script>
</body>
<?php require_once('connect/function.php'); $objCon->close(); ?>
</html>