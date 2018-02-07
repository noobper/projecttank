<?php
session_start();
include '../connect/connect.php';
if ($_SESSION['status']!="2") {
	header('location:../index.php');
}


$data1=$objCon->query('SELECT * FROM tb_order');
$total_cart=$data1->num_rows;
$data2=$objCon->query('SELECT * FROM tb_product');
$total_product=$data2->num_rows;
$data3=$objCon->query('SELECT * FROM tb_user');
$total_member=$data3->num_rows;

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../css/style.css">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/foundation.css" />
<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/app.css" />

<meta charset="utf-8">
<title>Judotank(admin)</title></head>
<body>
	<div class="container-fluid" style="background-color: black; height: 250px" ></div>


<div class="row" id="content">
	<div class="medium-2 columns" data-sticky-container>
		<!--<div class="sticky" data-sticky data-anchor="content">-->
			<ul class="side-nav">
                <li><a href="index.php"><i class="fa fa-home"></i> หน้าแรก</a></li>
                <li><a href="#"><i class="fa fa-cart-arrow-down"></i> รายการสั่งซื้อ</a></li>
                <li><a href="product_view.php">รายการสินค้า</a></li>
                <li><a href="ad_product.php"><i class="fa fa-product-hunt"></i> เพิ่มสินค้า</a></li>
                <li><a href="#"><i class="fa fa-exclamation-triangle"></i> รายงานปัญหา</a></li>
                <li><a href="#"><i class="fa fa-male"></i> เพิ่มช่าง</a></li>
                <li><a href="#"><i class="fa fa-list-alt"></i> แก้ใขช่าง</a></li>
                <li><a href="#"><i class="fa fa-user"></i> จักการสมาชิค</a></li>
                <li><a href="../logout.php">ออกจากระบบ</a></li>
            </ul>
		<!--</div>-->
	</div>



		<div class="medium-9 columns">
		<div class="row">
 		<div class="header">
            <div class="large-4 small-6 columns text-center">
            <div class="callout callout-style-1">
              <span><i class="fa fa-cart-arrow-down fa-5x fa-inverse"></i></span>
              <div>
                <h5><a href="order_view.php">New Orders (<?php echo $total_cart;?>)</a></h5>
              </div>
            </div>
            </div>
 
            <div class="large-4 small-6 columns text-center">
            <div class="callout callout-style-2">
               <span><i class="fa fa-gift fa-5x fa-inverse"></i></span>
              <div>
                <h5><a href="product.php">All Product (<?php echo $total_product;?>)</a></h5>
              </div>
            </div>
            </div>
 
            <div class="large-4 small-6 columns text-center">
            <div class="callout callout-style-3">
              <span><i class="fa fa-users fa-5x fa-inverse"></i></span>
              <div>
                <h5><a href="user_view.php">All User (<?php echo $total_member;?>)</a></h5>
              </div>
            </div>
            </div>
		</div>
		</div>







	  <div class="container">
	  	<table class="table-bordered">
	  	<?php require('order_view.php') ?>
	  		<thead>
	  			<tr>
	  				<th>เลขที่สั่งซื้อ</th>
	  				<th>ผู้ซื้อ</th>
	  				<th>สินค้า</th>
	  				<th>จำนวน</th>
	  				<th>ราคาต่อหน่วย</th>
	  				<th>ราคารวม</th>
	  				<th>วันที่สั่งซื้อ</th>
	  				<th>ยืนยัน</th>
	  			</tr>
	  		</thead>
	  		<tbody>
	  			<tr>
	  				<td></td>
	  			</tr>
	  		</tbody>
	  	</table>
	  </div>	
	  </div>
	  
	</div>


<script src="../js/bootstrap.min.js"></script>
<script src="../js/vendor/jquery.min.js"></script> 
<script src="../js/vendor/what-input.min.js"></script> 
<script src="../js/foundation.min.js"></script> 
<script src="../js/app.js"></script> 
</body>
</html>
<?php
$objCon->close();
?>