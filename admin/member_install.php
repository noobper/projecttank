<?php

    require_once('../connect/connect.php');
    require_once('layouts/top.php');
    $sql = 'select * from tb_worker_team where worker_team_id = "'.$_GET['id'].'"';
    $q=$objCon->query($sql);
    $r=$q->fetch_assoc();
?>
<div class="col-md-6">
    <h4>&emsp;รายละเอียดทีม</h4> 
    <form action="save_installer.php" method="post">
        <dl class="dl-horizontal text-middle">
            <dt>ID</dt>
            <dd><input type="text" name="edit_team_id" value="<?=$r['worker_team_id']; ?>" class="form-control" readonly></dd>
            <dt>ชื่อทีม</dt>
            <dd><input type="text" name="worker_team_name" value="<?=$r['worker_team_name']; ?>" class="form-control"></dd>
            <dt>เบอร์ติดต่อ</dt>
            <dd><input type="text" name="worker_team_tel" value="<?=$r['worker_team_tel']; ?>" class="form-control"></dd>
            <dt>พื้นที่บริการ</dt>
            <dd><input name="worker_team_area" type="text" value="<?=$r['worker_team_area']; ?>" class="form-control"></dd>
            <dd><input type="submit" value="บันทึก" class="btn btn-default"></dd>
        
        </dl>
    </form>
</div>
<div class="col-md-6">
<?php
    if (isset($_GET['edit'])) {
        $sql='select * from tb_worker where worker_id = "'.$_GET['edit'].'"';
        $q = $objCon->query($sql);
        if ($r2=$q->fetch_assoc()) {
?>
    <h4>&emsp;แก้ใขช่างในทีม</h4> 
    <form action="save_installer.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="edit_worker" value="<?=$r2['worker_id']; ?>">
        <dl class="dl-horizontal text-middle">
            <dt>ชื่อ</dt>
            <dd><input name="worker_name" type="text" class="form-control" value="<?=$r2['worker_name'];?>"></dd>
            <dt>เบอร์ติดต่อ</dt>
            <dd><input name="worker_tel" type="text" class="form-control" value="<?=$r2['worker_tel'];?>"></dd>
            <dt>หลักฐาน</dt>
            <dd><input name="worker_pic" type="file" class="form-control"></dd>
            <dd>
                <input type="submit" value="บันทึก" class="btn btn-default">
                <a href="member_install.php?id=<?=$_GET['id'];?>" class="btn btn-danger">ยกเลิก</a>
            </dd>
        </dl>
    </form>
    
<?php
        }
    }else {
?>
    <h4>&emsp;เพิ่มช่างในทีม</h4>     
    <form action="save_installer.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="new_worker" value="<?=$r['worker_team_id']; ?>">
        <dl class="dl-horizontal text-middle">
            <dt>ชื่อ</dt>
            <dd><input name="worker_name" type="text" class="form-control"></dd>
            <dt>เบอร์ติดต่อ</dt>
            <dd><input name="worker_tel" type="text" class="form-control"></dd>
            <dt>หลักฐาน</dt>
            <dd><input name="worker_pic" type="file" class="form-control"></dd>
            <dd><input type="submit" value="เพิ่ม" class="btn btn-default"></dd>
        </dl>
    </form>
<?php
    }
?>

</div>
<div class="col-md-12">

    <?php 
        $sql= 'select * from tb_worker where worker_team_id = "'.$_GET['id'].'" ';
        $q = $objCon -> query($sql);
        if ($q->num_rows) {
            $i=0;
    ?>
    <h4>&emsp;รายละเอียดสมาชิก</h4>
    <table class="table table-hover text-center text-middle width-100">
        <tr>
            <th>No</th>
            <th>รูป</th>
            <th>ชื่อ</th>
            <th>เบอร์ติดต่อ</th>
            <th>วันที่ลงทะเบียน</th>
            <th></th>
        </tr>
        <?php
            while ($r=$q->fetch_assoc()) {
            $i++;
        ?>
       
        <tr>
            <td><?=$i;?></td>
            <td><img src="../img/<?=(empty($r['worker_pic']))?'pic/no_preview.jpg':'blog/'.$r['worker_pic']; ?>" width=200></td>
            <td><?=$r['worker_name']; ?></td>
            <td><?=$r['worker_tel'];?></td>
            <td><?=$r['worker_add'];?></td>
            <td>
               <a href="member_install.php?<?='id='.$_GET['id'].'&edit='.$r['worker_id'];?>" class="btn btn-primary">แก้ไข</a>
               <a href="save_install.php?id=<?=$r['worker_id'];?>" class="btn btn-danger">ลบ</a>
            </td>
        </tr> 
        <?php
            }
        ?>
    </table>
    <?php
        }
    ?>
</div>
<?php
    require_once('layouts/buttom.php');
?>