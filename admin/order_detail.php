<?php
require_once('../connect/connect.php');
require_once('layouts/top.php');
$sql = "select * from tb_order
        inner join tb_user on tb_order.user_id = tb_user.user_id
        inner join tb_sex on tb_user.sex_id = tb_sex.sex_id
        inner join tb_address on tb_order.address_id = tb_address.address_id
        where order_id = '".$_GET['id']."'    
    ";
$q = $objCon -> query($sql);
if ($r=$q->fetch_assoc()) {
?>
    <h3>&emsp;รายละเอียดรายการสั่งสินค้า</h3>
    <dl class="dl-horizontal">
        <dt>ผู้สั่ง</dt>
        <dd><?php echo $r['username']; ?></dd>
        <dt>ชื่อเต็ม</dt>
        <dd><?php echo $r['fullname']; ?></dd>
        <dt>เพศ</dt>
        <dd><?php echo $r['sexname']; ?></dd>
        <dt>เบอร์ติดต่อ</dt>
        <dd><?php echo $r['tel']; ?></dd>
        <dt>อีเมล์</dt>
        <dd><?php echo $r['email']; ?></dd>
        <dt>สถาณที่จัดส่ง</dt>
        <dd><?php echo $r['address']; ?></dd>
        <dt>จังหวัด</dt>
        <dd><?php echo $r['city']; ?></dd>
        <dt>รหัสไปรษณีย์</dt>
        <dd><?php echo $r['postcode']; ?></dd>
        <dt>สถานะ</dt>
        <dd><?php echo ($r['status']==2)?'แจ้งชำระเงินแล้ว':'ยังไม่ได้แจ้งชำระ'; ?></dd>
    </dl>
    <?php
        $sql2 = "select * from tb_orderdetail
            inner join tb_list on tb_orderdetail.list_id = tb_list.list_id
            inner join tb_product on tb_list.product_id = tb_product.product_id
            inner join tb_producttype on tb_product.product_type = tb_producttype.product_type
            inner join tb_owner on tb_product.product_owner = tb_owner.product_owner
            where order_id = '".$_GET['id']."'";
        $q2 = $objCon ->query($sql2);
    ?>
    <h3>&emsp;รายละเอียดสินค้า</h3>
    <table class="table table-bordered text-center text-middle">
        <tr>
            <th></th>
            <th>ประเภท</th>
            <th>สินค้า</th>
            <th>ขนาด</th>
            <th>จำนวน</th>
            <th>ราคา/ชิ้น</th>
            <th>บริษัท</th>
        </tr>
        <?php while ($r2=$q2->fetch_assoc()) {
        ?>
        <tr>
            <td><img src="../img/<?php echo $r2['picture']; ?>" height="200px"> </td>
            <td><?php echo $r2['type_name']; ?></td>
            <td><?php echo $r2['product_name']; ?></td>
            <td><?php echo number_format($r2['capacity']); ?></td>
            <td><?php echo $r2['qty']; ?></td>
            <td><?php echo number_format($r2['price']); ?></td>
            <td><?php echo $r2['owner_name']; ?></td>
        </tr>
        <?php 
        } ?>
        <tr>
            <td colspan="7"><b class="pull-right">
                รวม <?php echo number_format($r['totalprice']); ?> บาท </b> 
            </td>
        </tr>
    </table>
    <div class="text-center">
        <a href="save_order.php?id=<?php echo $_GET['id']; ?>" class="btn btn-danger">ลบรายการสั่งซื้อนี้</a>
    </div>
<?php
}
?>
<br><br>
<?php
require_once('layouts/buttom.php');
?>