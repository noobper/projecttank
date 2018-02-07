<?php
require_once('../connect/connect.php');
require_once('layouts/top.php');
$sql = 'select * from tb_user
    inner join tb_sex on tb_user.sex_id = tb_sex.sex_id 
    where user_id = "'.$_GET['id'].'"';
$q = $objCon -> query($sql);
 if ($r=$q->fetch_assoc()) {
     ?>
     
<h3>รายละเอียดผู้ใช้งาน</h3>
<dl class="dl-horizontal text-middle">
<dt>ชื่อบัญชี</dt>
<dd><input type="text" name="username" value="<?=$r['username'];?>" class="form-control" disabled>    
</dd>
<dt>ชื่อ - นามสกุล</dt>
<dd><input type="text" name="fullname" value="<?=$r['fullname'];?>"class="form-control" ></dd>
<dt>เพศ</dt>
<dd><input type="text" name="sexname" value="<?=$r['sexname'];?>" class="form-control" disabled></dd>
<dt>เบอร์ติดต่อ</dt>
<dd><input type="text" name="tel" value="<?=$r['tel'];?>" class="form-control" ></dd>
<dt>อีเมล์</dt>
<dd><input type="text" name="email" value="<?=$r['email'];?>" class="form-control" disabled></dd>    

<?php
$sql='select * from tb_address where address_id = "'.$r['address_id'].'" ';
$q = $objCon -> query($sql);
if ($r2=$q->fetch_assoc()) {
?>
<dt>ที่อยู่</dt>
<dd><textarea name="address" rows='3' class="form-control" ><?=$r2['address']; ?></textarea></dd>
<dt>จังหวัด</dt>
<dd><input type="text" name="city" value="<?=$r2['city']; ?>" class="form-control" ></dd>
<dt>รหัสไปรษณีย์</dt>
<dd><input type="text" name="postcode" value="<?=$r2['postcode']; ?>" class="form-control" ></dd>
    <?php
        } else {
    ?>
        <h4>&emsp;ยังไม่มีรายละเอียดที่อยู่</h4>
    <?php
        }
    ?>
</dl>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<a href="" class="btn btn-danger">ย้อนกลับ</a>
<a href="" class="btn btn-primary">บันทึก</a>
<?php
 }
require_once('layouts/buttom.php');
?>