<?php require_once('layouts/top.php');
  $sql="SELECT * FROM tb_product 
    inner join tb_producttype on tb_product.product_type = tb_producttype.product_type
    inner join tb_owner on tb_product.product_owner = tb_owner.product_owner
    ";
  $q = $objCon->query($sql);
?>

  <div class="pull-left"><h3>&emsp;จำนวนสินค้าทั้งหมด <?php echo $q->num_rows; ?> รายการ</h3></div>
  <div class="pull-right"><h3></h3> <a href="add_product.php" class="btn btn-default">เพิ่มสินค้า</a></div>  
  <table class="table table-hover text-center text-middle width-100">
    <tr>
      <th>รหัสสินค้า</th>
      <th>รูป</th>
      <th>ประเภทสินค้า</th>
      <th>ชื่อผลิตภัณฑ์</th>
      <th>รายละเอียด</th>
      <th>บริษัท</th>
      <th></th>
      
    </tr>
    <?php 
          while ($r = $q->fetch_assoc()) {
    ?>
    <tr>
      <td><?php echo $r['product_id']; ?></td>
      <td><img src="../img/<?php echo $r['picture']; ?>" height="150px"></td>
      <td><?php echo $r['type_name'] ?></td>
      <td><?php echo $r['product_name']; ?></td>
      <td><?php echo $r['description']; ?></td>
      <td><?php echo $r['owner_name'] ?></td>
      <td><a href="edit_product.php?id=<?php echo $r['product_id']; ?>" class="btn btn-success">
        <span class="fa fa-edit"></span> แก้ไข</a>
      </td>
    </tr>
    <?php } ?>
  </table>
<?php 
  require_once('layouts/buttom.php');
?>