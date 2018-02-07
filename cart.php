<?php
session_start();
if (!isset($_SESSION['intLine'])) {
			header('location:index.php');
    } 
require('./connect/connect.php');
require_once('head.php');
require_once('header_bar.php'); ?>
<div class="container bg-white">
	<hr>
	<h3>&emsp;ตะกร้าสินค้า</h3>
	<br>
		<form action="update.php" method="post">
	<table class="text-center hover">
		<thead>
			<tr>
				<td></td>
				<td>รายละเอียด</td>
				<td>ราคา/ชิ้น (บาท)</td>
				<td>จำนวน</td>
				<td>ราคารวม (บาท)</td>
				<td></td>
			</tr>
		</thead>
		<?php
			$total = 0;
			$sumtotal = 0;
			for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
			{
				if($_SESSION["strProductID"][$i] != "")
				{
				$sql = "SELECT * FROM tb_list 
							INNER JOIN tb_product on tb_list.product_id=tb_product.product_id
							INNER JOIN tb_producttype on tb_product.product_type=tb_producttype.product_type
							WHERE list_id = '".$_SESSION["strProductID"][$i]."' ";
				$q = $objCon->query($sql);
				$r = $q->fetch_assoc();
				$total = $_SESSION["strQty"][$i] * $r["price"];
				$sumtotal = $sumtotal + $total;
		?>
			<input type="hidden" name="txtProductID<?php echo $i;?>" value="<?php echo $_SESSION["strProductID"][$i];?>">
			<tr>
				<td><img src="./img/<?php echo $r["picture"];?>" width="200px"></td>
				<td class="text-left"><br>
					&emsp;ชื่อผลิตภัณท์ : <?php echo $r["product_name"];?><br>
					&emsp;ประเภทสินค้า : <?php echo $r['type_name']; ?> <br>
					<?=!empty($r['color'])?'&emsp;สี : '.$r["color"].'<br>':''; ?>
					<?=!empty($r['capacity'])?'&emsp;ความจุ : '.$r["capacity"].'ลิตร<br>':''; ?>
					<?=!empty($r['center'])?'&emsp;เส้นผ่าศูนย์กลาง : '.$r["center"].'เมตร<br>':''; ?>
					<?=!empty($r['height'])?'&emsp;ความสูง : '.$r["height"].'เมตร<br>':''; ?>
				</td>
				<td><br><?php echo number_format($r["price"]);?></td>
				<td class="col-md-1"><br><input type="number" class="text-right" name="txtQty<?php echo $i;?>" value="<?php echo $_SESSION["strQty"][$i];?>" size="0"></td>
				<td><br><?php echo number_format($total);?></td>
				<td><br><a href="del_cart.php?Line=<?php echo $i;?>" class="btn btn-danger"><span class="fa fa-trash"> ลบ</span></a></td>
			</tr>
			<?php
			}
		}
		// empty cart check
		if ($total <= 0) {
		?>
			<tr>
				<td class="center" colspan="6"><h5><b>ไม่มีสินค้าในตะกร้า</b></h5></td>
			</tr>
		<?php
		}
		?>
		
	</table>
	<table>
		<tfoot>
			<tr>
				<td align="right"><input type="submit" class="button success" value="คํานวณราคาสินค้าใหม่"></td>
				<td align="right" class="col-md-4"> <h4>ราคารวมสุทธิ <?php echo number_format($sumtotal);?> บาท</h4></td>
			</tr>
		</tfoot>
		</table>
	</form>
	<form action="checkout.php" method="post">
		<label>
			เพิ่มเติมถึงร้านค้า
			<textarea name="comment" rows="3" autofocus><?=(isset($_SESSION['comment']))?$_SESSION['comment']:''; ?></textarea>
		</label>
		<br><br>
		<ul class="text-center">
			<a href="index.php" class="button warning">เลือกดูสินค้าชิ้นอื่น</a>
			<?php
				if($sumtotal > 0)
				{
			?>
				<input type="submit" class="button" value="สั่งสินค้า">
			<?php
				}
			?>
		</ul>
	</form>
</div>
<br>
<?php require_once('script.php'); ?>
</body>
</html>
<?php
$objCon->close();
?>