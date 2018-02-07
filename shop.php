<?php  
  session_start();
  $session_id = session_id();
  require('./connect/connect.php');
 $user_id = null;
  if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION['user_id'];
    $sql = $objCon->query("SELECT * FROM tb_user WHERE user_id = '".$_SESSION['user_id']."'");
    $data = $sql->fetch_assoc();
   // echo $data['username'];
  }else {
    //echo "error";
  };
?>
<?php require_once('head.php'); ?>
  <!-- เมนู -->
<?php require_once('header_bar.php'); ?>
<div class="container bg-white">
  <hr>
  <ol class="breadcrumb">
    <li><a href="index.php">หน้าแรก</a></li>
    <li><?php $sql="SELECT type_name FROM tb_producttype WHERE product_type=".$_GET['type']." ";
          $q=$objCon->query($sql);
          $r=$q->fetch_assoc();
          $type_name= $r['type_name'];
          echo $r['type_name']; ?></li>
  </ol>
  <h4><b>รายการสินค้า<b></h4>
    <table class="table table-hover">
  <?php
    $sql="SELECT * from tb_product WHERE product_type =".$_GET['type']." ";
    $p = $objCon->query($sql);
    while ($r = $p->fetch_assoc()){ ?>
      <tr>
        <td class="col-md-3">
          <a href="product.php?id=<?php echo $r['product_id']; ?> " class="btn" role="button">
            <img class="thumbnail" title="<?php echo $type_name." รุ่น ".$r['product_name'];?>" src="./img/<?php echo $r['picture'];?>">
          </a>
        </td>
        <td id="mid01" class="mid01" style="vertical-align: middle;">
          <h6><b><?php echo $r['product_name'];?></b></h6>
          <h6><?php echo $r['description'];?></h6>
          <p><a href="product.php?id=<?php echo $r['product_id']; ?> " class="btn btn-primary btn-lg" role="button" title="ดูรายละเอียดของรุ่น <?php echo $r['product_name'];?>">ดูรายละเอียด</a></p>
        </td>
      </tr>      
<?php } ?>      
    </table>
</div>
<footer>
  <div class="container-fluid">

  </div>
</footer>
<?php 
require_once('script.php');
require_once('./connect/function.php'); $objCon->close();
?>
</body>
</html>
