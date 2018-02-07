<?php 
    require_once('layouts/top.php');
?>
    <table class="table table-hover text-center width-100">
        <tr>
            <thead>
                <th>ID</th>
                <th>ชื่อผู้ใช้งาน</th>
                <th>ชื่อเต็ม</th>
                <th>อีเมล์</th>
                <th>เบอร์ติดต่อ</th>
                <th>วันลงทะเบียน</th>
                <th></th>
            </thead>
        </tr>
        
            <?php
                $sql = "select * from tb_user where status_id != 2";
                $q=$objCon->query($sql);
                while ($r=$q->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $r['user_id']; ?></td>
                <td><?php echo $r['username']; ?></td>
                <td><?php echo $r['fullname']; ?></td>
                <td><?php echo $r['email']; ?></td>
                <td><?php echo $r['tel']; ?></td>
                <td><?php echo $r['reg_date']; ?></td>
                <td><a href="member_detail.php?id=<?php echo $r['user_id']; ?>" class="btn btn-success">แก้ใข</a>
                    <a href="" class="btn btn-danger">ลบ</a>
                </td>
            </tr>
            <?php
                }
            ?>
        
    </table>
<?php
    require_once('layouts/buttom.php');
?>