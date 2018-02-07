<?php
session_start();
require_once('connect/connect.php');
if (!isset($_SESSION['status'])) {
  header('location:/index.php');
}
if (isset($_POST['comment'])) {
  $_SESSION['comment']=$_POST['comment'];
}
require_once('head.php');
require_once('header_bar.php');
?>
<div class="container bg-white">
<br>
<!-- form-address -->
<?php
  $sql = "SELECT * FROM tb_user
  LEFT JOIN tb_address ON tb_user.address_id = tb_address.address_id 
  WHERE user_id = '".$_SESSION['user_id']."' ";
  $q = $objCon->query($sql);
  $r = $q->fetch_assoc();
?>
<form name="address" class="form-inline" method="post" action="save_checkout.php">
<div class="col-md-7">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4><b>ที่อยู่ที่จะจัดส่ง</b></h4>
    </div>
    <div class="panel-body">
        <table class="unstriped center">
          <tr>
            <td>ชื่อผู้สั่ง</td>
            <td><input type="text" name="txtname" value="<?php echo $r['fullname']; ?>" required></td>
          </tr>
          <tr>
            <td>ที่อยู่</td>
            <td>
              <textarea name="txtaddress" rows="3" required><?php echo $r['address']; ?></textarea>
            </td>
          </tr>
          <tr>
            <td>จังหวัด</td>
            <td><input type="text" name="txtcity" value="<?php echo $r['city']; ?>" required></td>
          </tr>
          <tr>
            <td>รหัสไปรษณีย์</td>
            <td><input type="text" name="txtpostcode" value="<?php echo $r['postcode']; ?>" required></td>
          </tr>
          <tr>
            <td>เบอร์ติดต่อ</td>
            <td><input type="text" name="txttel" value="<?php echo $r['tel']; ?>" onkeypress="autoTab(this)" required></td>
          </tr>
          <tr>
            <td colspan="2" class="text-center">
              <br>
              <button class="button" type="submit" name="submit">ยืนยันคำสั่งซื้อ</button>
              <a href="cart.php" class="button alert">ย้อนกลับ</a>
            </td>
          </tr>
        </table>
      
    </div>
  </div>
</div>
<!-- panel 2 -->
<div class="col-md-5">
  <div class="panel panel-warning">
    <div class="panel-heading">
      <h4><b>สรุปการสั่งซื้อ</b></h4>
    </div>
    <div class="panel-body padding-0">
      <table class="unstriped">
        <thead>
          <tr>
            <th>สินค้า</th>
            <th>จำนวน</th>
            <th>ราคา</th>
          </tr>
        </thead>
        <?php
        $Total = 0;
        $SumTotal = 0;
        $item = 0;

        for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
        {
          if($_SESSION["strProductID"][$i] != "")
          {
          $sql = "SELECT * FROM tb_list 
          inner join tb_product on tb_list.product_id = tb_product.product_id
          inner join tb_producttype on tb_product.product_type = tb_producttype.product_type
          WHERE list_id = '".$_SESSION["strProductID"][$i]."' ";
          $q=$objCon->query($sql);
          $r = $q -> fetch_assoc();
          $item = $item + $_SESSION["strQty"][$i];
          $Total = $_SESSION["strQty"][$i] * $r["price"];
          $SumTotal = $SumTotal + $Total;
        ?>
          <tr>
            <td><?= ($r['product_type']==5)?'':$r["type_name"].'<br>';?><?=$r["product_name"];?></td>
            <td class="text-center"><?= $_SESSION["strQty"][$i];?></td>
            <td class="text-right"><?= number_format($Total);?></td>
          </tr>
          <?php
          }
        }
        ?>
        <tr>
          <td colspan="3">&emsp;<input type="checkbox" name="with_setup">&emsp;ต้องการช่างติดตั้ง (มีค่าใช้จ่ายเพิ่มเติม) </td>
        </tr>
        <tr>
          <td colspan="3">
            &emsp;เพิ่มเติมถึงร้านค้า
            <textarea name="comment" rows="3"><?=isset($_SESSION['comment'])?$_SESSION['comment']:''; ?></textarea>
          </td>
        </tr>
    </table>
    </div>
    <div class="panel-footer">
      <b>ยอดสุทธิ</b></td>
      <b class="pull-right"><?php echo number_format($SumTotal);?> บาท</b>      
    </div>
  </div>
</div>
</form>
</div>
<?php
$_SESSION['sumtotal'] = $SumTotal;
require_once('script.php');
$objCon->close();
?>
</body>
</html>