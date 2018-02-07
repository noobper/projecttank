<?php

    require_once('../connect/connect.php');
    require_once('layouts/top.php');
?>
    <div class="pull-left"><h3>&emsp;รายการช่าง </h3></div>
    <div class="pull-right"><h3></h3> <a href="add_installer.php" class="btn btn-default">เพิ่มช่าง</a></div>  
    <?php
        $sql = 'select * from tb_worker_team';
        $q=$objCon->query($sql);
    ?>
    <table class="table table-hover text-center text-middle width-100">
        <tr>
            <th>ID</th>
            <th>ชื่อทีม</th>
            <th>เบอร์ติดต่อ</th>
            <th>พื้นที่บริการ</th>
            <th></th>
        </tr>
    <?php
        while ($r=$q->fetch_assoc()) {
    ?>
        <tr>
            <td><?=$r['worker_team_id']; ?></td>
            <td><?=$r['worker_team_name']; ?></td>
            <td><?=$r['worker_team_tel']; ?></td>
            <td><?=$r['worker_team_area']; ?></td>
            <td>
               <a href="member_install.php?id=<?=$r['worker_team_id'];?>" class="btn btn-success">รายละเอียดสมาชิก</a>
            </td>
        </tr>
    <?php
        }
    ?>
    </table>
<?php
    require_once('layouts/buttom.php');
?>