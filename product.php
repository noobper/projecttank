<?php  
  session_start();
  $session_id = session_id();
  require('./connect/connect.php');

?>
  <?php 
    require_once('head.php');
    require_once('header_bar.php'); 
  ?>
<div class="container bg-white">
<hr>
  <ol class="breadcrumb">
    <li><a href="index.php">หน้าแรก</a></li>
    	<?php $sql="SELECT * FROM tb_product 
    				INNER JOIN tb_producttype on tb_product.product_type = tb_producttype.product_type
    				WHERE product_id=".$_GET['id']." ";
    		  $q=$objCon->query($sql);
    		  $item=$q->fetch_assoc(); ?>
    <li><a href="shop.php?type=<?php echo $item['product_type']; ?>">
    	<?php echo $item['type_name']; ?>    		
    	</a>
    </li>
   	<li><?php echo $item['product_name']; ?></li>
  </ol>
  	<div class="text-center">
      <br>
  		<h3><?php echo $item['product_name']; ?></h3>
      <img class="thumbnail center" src="./img/<?php echo $item['picture'];?>">
      <br><br>
  	<?php
    $sql="SELECT * from tb_list WHERE product_id=".$_GET['id']." ";
    // c - check
    $sql1=$sql." LIMIT 1";
    $q1=$objCon->query($sql1);
    $c=$q1->fetch_assoc();
    ?>
	<table class="table table-bordered width-100 text-center">
    <thead>
    	<tr>
        <?=!empty($c['color'])?'<td>สี</td>':'';?>
        <?=!empty($c['capacity'])?'<td>ความจุ (ลิตร)</td>':'';?>
        <?=!empty($c['center'])?'<td>เส้นผ่านศูนย์กลาง (เมตร)</td>':'';?>
        <?=!empty($c['height'])?'<td>ความสูง (เมตร)</td>':'';?>
        <?=!empty($c['inlet'])?'<td>ทางน้ำเข้า (นิ้ว)</td>':'';?>
        <?=!empty($c['waterout'])?'<td>ทางน้ำออก (นิ้ว)</td>':'';?>
        <?=!empty($c['waterdie'])?'<td>ทางน้ำทิ้ง (นิ้ว)</td>':'';?>
        <?=!empty($c['stand'])?'<td>ขาตั้ง (เมตร)</td>':'';?>
	    	<td>ราคา (บาท)</td>
	    	<td></td>
	    </tr>
    </thead>
  <?php $q = $objCon->query($sql);
        while ($r = $q->fetch_assoc()){ 
  ?>
      	<tr>
          <?=!empty($r['color'])?'<td>'.$r['color'].'</td>':'';?>
          <?=!empty($r['capacity'])?'<td>'.$r['capacity'].'</td>':'';?>
          <?=!empty($r['center'])?'<td>'.$r['center'].'</td>':'';?>
          <?=!empty($r['height'])?'<td>'.$r['height'].'</td>':'';?>
          <?=!empty($r['inlet'])?'<td>'.$r['inlet'].'</td>':'';?>
          <?=!empty($r['waterout'])?'<td>'.$r['waterout'].'</td>':'';?>
          <?=!empty($r['waterdie'])?'<td>'.$r['waterdie'].'</td>':'';?>
          <?=!empty($r['stand'])?'<td>'.$r['stand'].'</td>':'';?>
          <td><?php echo number_format($r['price']); ?></td>
          <td><a href="update_cart.php?id=<?php echo $r['list_id']; ?>" class="btn btn-primary btn-block">เลือกชิ้นนี้ </a></td>
      	</tr>      
<?php } ?>      
    </table>
    <br>
</div>
</div>
<?php 
  require_once('script.php');
  $objCon->close();
?>
</body>
</html>
