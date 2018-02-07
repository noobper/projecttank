<?php
require_once('../connect/connect.php');
$sql = "select * from tb_order
				inner join tb_user on tb_order.user_id = tb_user.user_id
				inner join tb_address on tb_order.address_id = tb_address.address_id
				order by tb_order.order_id desc";
if ($q = $objCon->query($sql)) {
	if ($q->num_rows) { ?>
	<b>จำนวนสินค้าทั้งหมด <?php echo $q->num_rows; ?></b>
	
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>ชื่อผู้สั่งสินค้า</th>
						<th>อีเมล์</th>
						<th>เบอร์ติดต่อ</th>
						<th>ที่จัดส่ง</th>
						<th>จังหวัด</th>
						<th>รหัสไปรษณี</th>
						<th>สินค้า</th>
						<th>ราคารวม</th>
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
				<td><?php echo $r['address']; ?></td>
				<td><?php echo $r['city']; ?></td>
				<td><?php echo $r['postcode']; ?></td>
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
				<td><?php echo number_format($r['totalprice']); ?></td>
				<td><?php echo $r['order_date']; ?></td>
				<td><a href="" class="btn btn-defalut">ตรวจสอบ</a></td>
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