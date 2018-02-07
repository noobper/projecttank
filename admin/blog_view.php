<?php
    require_once('../connect/connect.php');
    require_once('layouts/top.php');
?> 
    <div class="pull-left">
        <h3>&emsp;บทความในระบบ</h3>
    </div>
    <div class="pull-right">
        <h3></h3>
        <a href="add_blog.php" class="btn btn-default">เพิ่มบทความ</a>
    </div>
    <table class="table width-100 text-middle">
        <tr>
            <th>ID</th>
            <th>รุปภาพ</th>
            <th>หัวข้อ</th>
            <th>เนิ้อหา</th>
            <th></th>
        </tr>
        <?php
            $sql = 'select * from tb_blog';
            $q = $objCon->query($sql);
            while ($r=$q->fetch_assoc()) {
        ?>
        <tr>
                <td><?=$r['blog_id'];?></td>
                <td><img src="../img/blog/<?=$r['blog_pic']; ?>" width='300'></td>
                <td><?=$r['blog_title']; ?></td>
                <td><?=mb_substr($r['blog_body'],0,69,'UTF-8'); ?>...</td>
                <td>
                    <a href="blog_detail.php?id=<?=$r['blog_id']; ?>" class="btn btn-success btn-block">แก้ใข</a>
                    <a href="save_blog.php?id=<?=$r['blog_id']; ?>" class="btn btn-danger btn-block">ลบ</a>
                </td>
        </tr>
        <?php
        $body=$r['blog_body'];
            }
        ?>
    </table>
<?php
    require_once('layouts/buttom.php');
?>