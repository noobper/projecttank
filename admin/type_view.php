<?php
    require_once('layouts/top.php');
    $sql="select * from tb_producttype";
    $q = $objCon->query($sql);
?>
<h3>&emsp;ประเภทสินค้า</h3>
<form action="save_type.php" method="post" name="save_type">
    เพิ่มประเภทสินค้าใหม่ &emsp;<input type="text" name="type_name" class="form-control auto" autofocus>
    <input type="submit" name="submit" value="บันทึก" class="btn btn-default">
</form>
<h3>&emsp;รายการประเภทสินค้า</h3>
<table class="table table-hover text-middle">
    <tr>
        <th>ID</th>
        <th>ประเภทสินค้า</th>
        <th></th>
        <th></th>
    </tr>
    <?php while ($r = $q->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $r['product_type']; ?></td>
            <td><?php echo $r['type_name']; ?></td>
            <td><a class="btn btn-success"  data-toggle="modal" data-target="#edit<?php echo $r['product_type']; ?>">แก้ไข</a></td>
            <td><a href="save_type.php?id=<?php echo $r['product_type']; ?>" class="btn btn-danger">ลบ</a></td>
        </tr>

    <div class="modal fade" id="edit<?php echo $r['product_type']; ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="save_type.php" method="post" name="save_type">
                        <input type="hidden" name="id" value="<?php echo $r['product_type']; ?>">
                        เปลี่ยนเป็น
                        <br><br>
                        <input type="text" name="edit_type" class="form-control" value="<?php echo $r['type_name']; ?>">
                        <br>
                        <input type="submit" value="บันทึก" class="btn btn-default pull-right">
                        <br><br>
                    </form>
                </div>
            
            </div>
        </div>
    </div>
    <?php
    } ?>
        
</table>
<?php
    require_once('layouts/buttom.php');
?>
</body>
</html>