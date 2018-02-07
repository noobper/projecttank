<?php
    require_once('layouts/top.php');
    $sql = "select * from tb_product
            where product_id = '".$_GET['id']."'";
    $q = $objCon->query($sql);
    $r = $q->fetch_assoc();
?>
<img src="../img/<?php echo $r['picture']; ?>" class="pull-left my-frame" width="400">
    <h2>&emsp;&emsp;แก้ใขอุปกรณ์</h2><br>
    <form action="save_product.php" method="post">
    <input type="hidden" name="edit">
    <input type="hidden" name="id" value="<?php echo $r['product_id']; ?>">
    <dl class="dl-horizontal text-middle">
        <dt>ชื่อสินค้า</dt>
        <dd><input name="product_name" type="text" class="form-control" value="<?php echo $r['product_name']; ?>"></dd>
        <dt>ประเภทสินค้า</dt>
        <dd>
            <select name="product_type" id="product_type" class="form-control">
                <?php 
                    $sql1="select * from tb_producttype";
                    $q1 = $objCon->query($sql1);
                    while ($r1=$q1->fetch_assoc()) {
                ?>
                    <option value="<?php echo $r1['product_type'];?>"<?php echo ($r1['product_type']==$r['product_type']) ? 'selected' : '' ; ?>>
                        <?php echo $r1['type_name']; ?>
                    </option>
                <?php } ?>
            </select>
        </dd>
        <dt>ข้อมูลสินค้า</dt>
        <dd><textarea name="description" rows="3" class="form-control"><?php echo $r['description']; ?></textarea></dd>
        <dt>บริษัท</dt>
        <dd>
            <select name="product_owner" class="form-control">
                <?php
                    $sql1="select * from tb_owner";
                    $q1 = $objCon->query($sql1);
                    while ($r1=$q1->fetch_assoc()) {
                ?>
                    <option value="<?php echo $r1['product_owner']; ?>"<?php echo ($r1['product_owner']==$r['product_owner']) ? 'selected' : '' ; ?>>
                        <?php echo $r1['owner_name']; ?>
                    </option>
                <?php
                    }
                ?>
            </select>
        </dd>
    <?php if ($r['product_type']==5) { ?>
        <dt>ราคา</dt>
        <dd>
            <?php
                $sql1="select list_id,price,stock from tb_list where product_id = '".$_GET['id']."' ";
                $q1=$objCon->query($sql1);
                $r1=$q1->fetch_assoc();
            ?>
            <input type="hidden" name="list_id" value="<?=$r1['list_id'];?>">
            <input type="text" name="price" value="<?=$r1['price']; ?>" class="form-control">
        </dd>
        <dt>สินค้าในคลัง</dt>
        <dd><input type="text" name="stock" value="<?=$r1['stock']; ?>" class="form-control"></dd>
    <?php } ?>
        <dd><input type="submit" value="บันทึก" class="btn btn-primary">
            <a href="save_product.php?id=<?php echo $r['product_id']; ?>" class="btn btn-danger">ลบสินค้านี้</a>
        </dd>
        </form>
    </dl>
    <div class="col-md-12">
        <form action="save_product.php" class="form-inline" method="post" enctype="multipart/form-data">
            <input type="hidden" name="change_pic">
            <input type="hidden" name="id" value="<?php echo $r['product_id']; ?>">
            <input type="file" name="picture" class="form-control" accept="image/*" required>
            <input type="submit" value="เปลี่ยนรูป" class="btn btn-default">
        </form>
        <hr class="width-100">
    </div>
<?php if ($r['product_type']!=5) { ?>
<table class="table tabl-bordered text-center text-middle width-100">
    <tr>
        <th>No</th>
        <th>สี</th>
        <th>ความจุ (ลิตร)</th>
        <th>เส้นผ่านศูนย์กลาง (เมตร)</th>
        <th>ความสูง (เมตร)</th>	<th>ทางน้ำเข้า (นิ้ว)</th>
        <th>ทางน้ำออก (นิ้ว)</th>
        <th>ขาตั้ง (เมตร)</th>
        <th>ทางน้ำทิ้ง (นิ้ว)</th>
        <th>ราคา (บาท)</th>
        <th>สินค้าคงเหลือ</th>
        <th></th>
    </tr>
    <tr>
    <form action="save_list.php" method="post">
        <input type="hidden" name="new">
        <input type="hidden" name="id" value = "<?php echo $_GET['id']; ?>">
        <td>New</td>
        <td><input type="text" name="color" class="form-control"></td>
        <td><input type="text" name="capacity" class="form-control"></td>
        <td><input type="text" name="center" class="form-control"></td>
        <td><input type="text" name="height" class="form-control"></td>
        <td><input type="text" name="inlet" class="form-control"></td>
        <td><input type="text" name="waterout" class="form-control"></td>
        <td><input type="text" name="stand" class="form-control"></td>
        <td><input type="text" name="waterdie" class="form-control"></td>
        <td><input type="text" name="price" class="form-control"></td>
        <td><input type="text" name="stock" class="form-control"></td>
        <td><input type="submit" value="เพิ่ม" class="btn btn-primary btn-block"></td>
    </form>
    </tr>
<?php 
    $i = 0;
    $sql = "select * from tb_list
            where product_id = '".$_GET['id']."'
            ";
    $q = $objCon->query($sql);
    while ($r= $q->fetch_assoc()) {
    $i++;
?>
    <tr>
    <form action="save_list.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $_GET['id']; ?>">
        <input type="hidden" name="id" value="<?php echo $r['list_id']; ?>">
        <td><?php echo $i; ?></td>
        <td><input type="text" name="color" class="form-control" value="<?php echo $r['color']; ?>"></td>
        <td><input type="text" name="capacity" class="form-control" value="<?php echo $r['capacity']; ?>"></td>
        <td><input type="text" name="center" class="form-control" value="<?php echo $r['center']; ?>"></td>
        <td><input type="text" name="height" class="form-control" value="<?php echo $r['height']; ?>"></td>
        <td><input type="text" name="inlet" class="form-control" value="<?php echo $r['inlet']; ?>"></td>
        <td><input type="text" name="waterout" class="form-control" value="<?php echo $r['waterout']; ?>"></td>
        <td><input type="text" name="stand" class="form-control" value="<?php echo $r['stand']; ?>"></td>
        <td><input type="text" name="waterdie" class="form-control" value="<?php echo $r['waterdie']; ?>"></td>
        <td><input type="text" name="price" class="form-control" value="<?php echo $r['price']; ?>"></td>
        <td><input type="text" name="stock" class="form-control" value="<?php echo $r['stock']; ?>"></td>
        <td><input type="submit" value="อัปเดท" class="btn btn-success btn-sm">
            <a href="save_list.php?id=<?=$r['list_id'] ?>" class="btn btn-danger btn-sm btn-block">ลบ</a>
        </td>
    </form>
    </tr>
<?php
    }
}
?>
</table>
<?php
    require_once('layouts/buttom.php');
?>