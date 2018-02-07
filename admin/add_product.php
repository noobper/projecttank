<?php require_once('layouts/top.php'); ?>
<form action="save_product.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="new">
<div class="col-md-6 col-md-offset-1 text-center" >
    <h3>เพิ่มสินค้า</h3>
    <dl class="dl-horizontal text-middle">
        <dt>ชื่อผลิตภัณฑ์</dt>
        <dd><input type="text" class="form-control" name="product_name"></dd>
        <dt>ประเภท</dt>
        <dd>
            <select name="product_type" id="product_type" class="form-control">
                <?php 
                    $sql="select * from tb_producttype";
                    $q = $objCon->query($sql);
                    while ($r=$q->fetch_assoc()) {
                ?>
                    <option value="<?php echo $r['product_type']; ?>"><?php echo $r['type_name']; ?></option>
                <?php } ?>
            </select>
        </dd>
        <dt>ข้อมูลผลิตภัณฑ์</dt>
        <dd><textarea name="desciption" rows="8" class="form-control"></textarea></dd>
        <dt>บริษัท</dt>
        <dd>
            <select name="product_owner" class="form-control">
                <?php
                    $sql="select * from tb_owner";
                    $q = $objCon->query($sql);
                    while ($r=$q->fetch_assoc()) {
                ?>
                    <option value="<?php echo $r['product_owner']; ?>"><?php echo $r['owner_name']; ?></option>
                <?php
                    }
                ?>
            </select>
        </dd>
        <dt>รูปภาพ</dt>
        <dd><input type="file" name="picture" class="form-control" accept="image/*" required></dd>
        <dt><span name="price" class="hidden">ราคา</span></dt>
        <dd><input type="text" name="price" class="form-control hidden"></dd>
    </dl>
    <input type="submit" value="บันทึก" id="save_product" class="btn btn-primary">
</div>
</form>
<?php 
require_once('layouts/buttom.php'); ?>