<?php
    session_start();
    require_once('connect/connect.php');
    require_once('head.php');
    require_once('header_bar.php');
?>
<?php
$sql = "SELECT * FROM tb_order 
  WHERE order_id = '".$_GET["OrderID"]."' ";
$q = $objCon->query($sql);
$r = $q->fetch_assoc();
?>
<div class="container bg-white">
<hr>
<h3>&emsp;สั่งสินค้าเรียบร้อย</h3>
้<h5 class="text-center text-info">
  <b>ยอดรวมทั้งสิ้น <?= number_format($r['totalprice']);?> บาท</b>
</h5>
<h4>&emsp;ชำระเงินได้ที่</h4>
<h5>
  <table class="text-center">
    <tr>
      <td><img src="img/pic/scb_logo.png" width="80px"></td>
      <td>ธนาคารไทยพาณิชย์</td>
      <td>เลขที่บัญชี : </td>
      <td>สาขา : </td>
    </tr>
  </table> 
</h5>
<h4>&emsp;แจ้งชำระเงิน</h4>
<form action="pay.php">
  <dl class="dl-horizontal text-middle">
    <dt>วันที่ชำระ</dt>
    <dd><input type="date" name="" id="" class="form-control"></dd>
    <dt>เวลาโดยประมาณ</dt>
    <dd><input type="time" name="" id="" class="form-control"></dd>
    <dt>จำนวนเงิน</dt>
    <dd><input type="text" name="" id="" class="form-control"></dd>
    <dt>หลักฐานการโอน</dt>
    <dd><input type="file" name="" id="" class="form-control"></dd>
    <dd>
      <input type="submit" value="บันทึก" class="btn btn-primary">
      <a href="index.php" class="btn btn-danger">กลับหน้าแรก</a>
    </dd>
  </dl>
  </form>
  <br>
  
<h4>&emsp;รายการสินค้า</h4>
<table class="text-center">
  <tr>
    <th></th>
    <th>ประเภท</th>
    <th>สินค้า</th>
    <th>ขนาด</th>
    <th>ราคา/ชิ้น</th>
    <th>จำนวน</th>
  </tr>
<?php

$Total = 0;
$SumTotal = 0;
 $sql='select * from tb_orderdetail 
    inner join tb_list on tb_orderdetail.list_id = tb_list.list_id
    inner join tb_product on tb_list.product_id = tb_product.product_id
    inner join tb_producttype on tb_product.product_type = tb_producttype.product_type
    where order_id = "'.$_GET['OrderID'].'" ';
$q = $objCon->query($sql);

while($r2=$q->fetch_assoc())
{
  ?>
	  <tr>
    <td><img src="./img/<?=$r2['picture'];?>" width="150px"></td>
    <td><?=$r2['type_name'];?></td>
		<td><?=$r2["product_name"];?></td>
		<td><?=$r2["capacity"];?></td>
		<td><?=number_format($r2["price"]);?></td>
		<td><?=$r2["qty"];?></td>
	  </tr>
	  <?php
 }
  ?>
</table>
</div>
<?php
    require_once('script.php');
    $objCon->close();
?>
</body>
</html>