<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('location:index.php');
    }
    require_once('./connect/connect.php');
    require_once('head.php');
    require_once('header_bar.php');
?>
<div class="container bg-white">
    <hr>
    <div class="col-md-6">
    <?php
        $sql='select * from tb_user 
            inner join tb_sex on tb_user.sex_id = tb_sex.sex_id 
            where user_id = "'.$_SESSION['user_id'].'" ';
        $q=$objCon->query($sql);
        if ($r=$q->fetch_assoc()) {
    ?>
        <h3>&emsp;ข้อมูลส่วนตัว</h3>
        <form action="save_profile.php" method="post"></form>
            <dl class="dl-horizontal text-middle">
                <dt>ชื่อบัญชี</dt>
                <dd><input type="text" name="username" value="<?=$r['username'];?>" disabled>    
                </dd>
                <dt>ชื่อ - นามสกุล</dt>
                <dd><input type="text" name="fullname" value="<?=$r['fullname'];?>"></dd>
                <dt>เพศ</dt>
                <dd><input type="text" name="sexname" value="<?=$r['sexname'];?>" disabled></dd>
                <dt>เบอร์ติดต่อ</dt>
                <dd><input type="text" name="tel" value="<?=$r['tel'];?>"></dd>
                <dt>อีเมล์</dt>
                <dd><input type="text" name="email" value="<?=$r['email'];?>" disabled></dd>    
            
        <?php
            $sql='select * from tb_address where address_id = "'.$r['address_id'].'" ';
            $q = $objCon -> query($sql);
            if ($r2=$q->fetch_assoc()) {
            ?>
                <dt>ที่อยู่</dt>
                <dd><textarea name="address" rows='3'><?=$r2['address']; ?></textarea></dd>
                <dt>จังหวัด</dt>
                <dd><input type="text" name="city" value="<?=$r2['city']; ?>"></dd>
                <dt>รหัสไปรษณีย์</dt>
                <dd><input type="text" name="postcode" value="<?=$r2['postcode']; ?>"></dd>
        <?php
            }
        ?>
            </dl>
            <div class="text-center">
                <input type="submit" value="บันทึก" class="btn btn-success">
            </div>
           
            <br><br>
        </from>

    <?php
        }
    ?>
    </div>
    <div class="col-md-6">
        <h3>รายการสั่งซื้อล่าสุด</h3>
        <table>
        <?php
            $sql='select * from tb_order 
                inner join tb_transport on tb_order.transport_id = tb_transport.transport_id
                where user_id = "'.$_SESSION['user_id'].'" && date(order_date)>=date_add(curdate(),interval -3 month) 
                order by order_id desc,tb_order.transport_id desc limit 3';
            $q=$objCon->query($sql);
            echo $objCon->error;
            if ($q->num_rows) {
                while ($r = $q->fetch_assoc()) {
        ?>
        <thead>
            <td colspan="3" class="text-right">
                ลงวันที่ <?=date('d-m-Y',strtotime($r['order_date'])); ?>
                <a href="delete_order.php?id=<?=$r['order_id']; ?>" title="ลบรายการนี้" class="red delbutton">
                    <span class="fa fa-times fa-lg"></span>
                </a>
            </td>
        </thead>    
            <?php
                $sql2='select * from tb_orderdetail
                    inner join tb_list on tb_orderdetail.list_id = tb_list.list_id
                    inner join tb_product on tb_list.product_id = tb_product.product_id
                    inner join tb_producttype on tb_product.product_type = tb_producttype.product_type
                    where order_id = "'.$r['order_id'].'" ';
                $q2=$objCon->query($sql2);
                while ($r2=$q2->fetch_assoc()) {
            ?>
            
            <tr>
                    <td><?=$r2['type_name']; ?></td>
                    <td><?=$r2['product_name']; ?><?=!empty($r2['capacity'])?'ขนาด'.number_format($r2['capacity']).'ลิตร':''; ?></td>
                    <td>จำนวน <?=$r2['qty']; ?> ชิ้น</td>
            </tr>
        <?php
                }
        ?> 
            <tr>
                <td colspan='3' class="text-right">
                    <b>รวม <?=number_format($r['totalprice']); ?> บาท</b> 
                </td>
            </tr>
            <tr>
                <td class="red text-center" colspan='3'>
                    <b><?=$r['transport_name']; ?></b>
                </td>
            </tr>
        <?php
            if ($r2['with_setup']==2) {
        ?>
            <tr>
                <td colspan='3'><a href="installer.php" class="button expanded"><span class="fa fa-search"></span> รายละเอียดช่างติดตั้ง</a></td>
            </tr>
        <?php
            }
        }
            }else{
        ?>
            <tr>
                <td>ยังไม่มีรายการสั่งซื้อ</td>
            </tr>
            <?php } ?>
        </table>
        <br><br>
        <form action="save_report.php" method="post">
            <textarea name="report" rows="3" class="form-control" required></textarea>
        <input type="submit" value="แจ้งปัญหา" class="secondary button expanded">
        </form>
        <br>
    </div>
</div>
<?php
    require_once('script.php');
?>
<script type="text/javascript">
    $(document).ready(function(){
  
});
</script>
</body>
</html>
