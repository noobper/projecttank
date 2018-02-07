<?php require_once('layouts/top.php'); ?>
<?php
$sql = "select * from tb_order
				inner join tb_user on tb_order.user_id = tb_user.user_id
				inner join tb_address on tb_order.address_id = tb_address.address_id
				inner join tb_transport on tb_order.transport_id = tb_transport.transport_id
				where tb_order.transport_id >= 2 
				order by tb_order.transport_id desc";
if ($q = $objCon->query($sql)) {
    if ($q->num_rows) { ?>
	<div class="pull-left">
		<h3>&emsp;รายการเปลี่ยนสถาณะสินค้า</h3>
	</div>
	<!--<div class="pull-right"><h3></h3>สถานะ <button><span class="fa fa-caret-down"></span></button></div>-->
			<table class="hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>ชื่อผู้สั่งสินค้า</th>
						<th>อีเมล์</th>
						<th>เบอร์ติดต่อ</th>
						<th>สินค้า</th>
						<th>สถาณะ</th>
						<th>เปลี่ยนสถาณะ</th>
						<th>เมื่อ</th>
						<th></th>
					</tr>
				</thead>
		<?php
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
									<?php echo $r2['product_name']; ?>
									<b>ความจุ</b> <?php echo number_format($r2['capacity']); ?>
									<b>จำนวน</b> <?php echo $r2['qty']; ?>
								</p>
						<?php } ?>
				</td>
				<td><?=$r['transport_name']; ?></td>
				<td>
					<select name="transport" id="">
						<?php 
							$q2=$objCon->query('select * from tb_transport where transport_id > 2');
							while ($t = $q2->fetch_assoc()) {
						?>
							<option value="<?=$t['transport_id']; ?>"><?=$t['transport_name']; ?></option>
						<?php
							}
						?>
					</select>
				</td>
				<td><?php echo $r['order_date']; ?></td>
				<td>
					<a href="order_detail.php?id=<?php echo $r['order_id']; ?>" class="btn btn-info">บันทึก</a>
				</td>
			</tr>
			<?php
		}
		echo "</table>";
	} else {
		echo "no information";
	}
} else {
	echo "failed query",'<br>';
  die($objCon->error);
  $objCon->close();
}
?>
<?php require_once('layouts/buttom.php'); ?>