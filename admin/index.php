<?php require_once('layouts/top.php'); ?>



<?php
		 ?>
	<div class="pull-left">
		<h3>&emsp;รายการสั่งสินค้า</h3>
	</div>
	<div class="pull-right">
		
		<form action="index.php" method="get" class="form-inline">
			ค้นหาสถานะ
			<select name="view" class="width-auto">
					<option value="">ทั้งหมด</option>
				<?php
					$sql2 = "select * from tb_transport";
					$q2 = $objCon->query($sql2);
					while ($i=$q2->fetch_assoc()) {
				?>
					<option value="<?=$i['transport_id']; ?>"><?=$i['transport_name']; ?></option>
				<?php
					}
				?>
			</select>
			<input type="submit" value="ค้นหา" class="btn btn-default">
		</form>
	</div>
			<table class="hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>ชื่อผู้สั่งสินค้า</th>
						<th>อีเมล์</th>
						<th>เบอร์ติดต่อ</th>
						<th>รายการสินค้า</th>
						<th>สถาณะ</th>
						<th>เมื่อ</th>
						<th></th>
					</tr>
				</thead>
		<?php
		$sql = "select * from tb_order
			inner join tb_user on tb_order.user_id = tb_user.user_id
			inner join tb_address on tb_order.address_id = tb_address.address_id
			inner join tb_transport on tb_order.transport_id = tb_transport.transport_id
			";
		if (!empty($_GET['view'])) {
			$sql.= "where tb_order.transport_id = ".$_GET['view']." ";
		}
		$sql.=" order by tb_order.order_id desc ";

		$q = $objCon->query($sql);
		if ($q->num_rows) {
		while ($r = $q->fetch_assoc()) {
		?>
			<tr>
				<td><?php echo $r['order_id']; ?></td>
				<td><?php echo $r['fullname']; ?></td>
				<td><?php echo $r['email']; ?></td>
				<td><?php echo $r['tel']; ?></td>
				<td>
						<?php
						$sql2 = "select * from tb_orderdetail 
									inner join tb_list on tb_orderdetail.list_id = tb_list.list_id
									inner join tb_product on tb_list.product_id = tb_product.product_id
									where tb_orderdetail.order_id = '".(int)$r['order_id']."' ";
						$q2 = $objCon->query($sql2);
						while ($r2 = $q2 -> fetch_assoc()) { 
							?>
								<p>
									<?php echo $r2['product_name']; ?> |
									<b>ขนาด</b> <?php echo number_format($r2['capacity']); ?> |
									<b>จำนวน</b> <?php echo $r2['qty']; ?>
								</p>
						<?php } ?>
				</td>
				<td><?=$r['transport_name']; ?></td>
				<td><?php echo $r['order_date']; ?></td>
				<td><a href="order_detail.php?id=<?php echo $r['order_id']; ?>" class="btn btn-success">
					<span class="fa fa-search"></span>ตรวจสอบ</a>
				</td>
			</tr>
	<?php
		}		
	} else {
	?>
		<tr>
			<td colspan="8" class="text-center">ไม่พบข้อมูล</td>
		</tr>
<?php
	}
?>
</table>
<?php require_once('layouts/buttom.php'); ?>