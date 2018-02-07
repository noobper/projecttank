<?php  
  session_start();
  require_once('./connect/connect.php');
  require_once('head.php');
  require_once('header_bar.php');
?>
<div class="container bg-white">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1" ></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class= "item active">
      <img src="img/slidbar/sl01.png" style="float:right"> 
      <div class="text-slide">
        <a href="shop.php?type=2" class="text-center">
          <h4>
          ถังเก็บน้ำบนดิน</br>
          OnGround Water Tank
        </h4>
        </a>
      &emsp;ถังเก็บน้ำบนดิน สะอาด ปลอดภัย ด้วยเทคโนโลยีทันสมัยหนึ่งเดียว วัสดุที่ใช้ผลิต คือ ELIXIR ควบคุมการผลิตโดยกลุ่มปิโตรเคมี เครือซีเมนต์ไทย ไม่เป็นสนิม ป้องกันแสง UV ไม่เกิดตะไคร่น้ำ สีสวยไม่จืดจาง ผลิตจากวัสดุที่สัมผัสอาหารได้
    </div>
  </div>
  <div class="item">
    <img src="img/slidbar/sl02.png" class="img-center" style="float:right">
    <div class="text-slide">
      <a href="shop.php?type=2" class="text-center">
        <h4>
          ถังสแตนเลส</br>
          Stainless Steel Tank
        </h4>
      </a>
      &emsp;ถังเก็บน้ำสแตนเลส ชนิดผิวเงา ทนทานด้วยคุณภาพและความปลอดภัย ไม่เป็นสนิม ไม่เกิดตะไคร่น้ำ แข็งแรงทนทาน ไม่ก่อให้เกิดสารละลายที่มีพิษต่อร่างกาย
           ถังเก็บน้ำสแตนเลส ชนิดผิวเงา ทนทานด้วยคุณภาพและความปลอดภัย ไม่เป็นสนิม ไม่เกิดตะไคร่น้ำ แข็งแรงทนทาน ไม่ก่อให้เกิดสารละลายที่มีพิษต่อร่างกาย
    </div>
  </div>
  <div class="item">
    <img src="img/slidbar/sl03.png" class="img-center" style="float:right">
    <div class="text-slide">
      <a href="shop.php?type=2" class="text-center">
        <h4>
          ถังบำบัดน้ำเสีย</br>Waste Water Tank
        </h4>
      </a>
      &emsp;ถังบำบัดน้ำเสีย สะอาด คุณภาพแห่งความปลอดภัยของระบบบำบัดน้ำเสีย ด้วยราคาที่ประหยัดกว่า เป็นระบบบำบัดน้ำเสียที่ได้รับการออกแบบเพื่อบำบัดน้ำเสียทุกชนิด เพื่อให้ได้คุณภาพน้ำที่ดีปลอดภัยต่อสิ่งแวดล้อม
    </div>
  </div>
  <div class="item">
    <img src="img/slidbar/sl04.png" class="img-center" style="float:right">
    <div class="text-slide">
      <a href="shop.php?type=2" class="text-center">
        <h4>
        ถังเก็บน้ำบนดิน</br>OnGround Water Tank
        </h4>
      </a>
      &emsp;ถังเก็บน้ำบนดิน สะอาด ปลอดภัย ด้วยเทคโนโลยีทันสมัยหนึ่งเดียว วัสดุที่ใช้ผลิต คือ ELIXIR ควบคุมการผลิตโดยกลุ่มปิโตรเคมี เครือซีเมนต์ไทย ไม่เป็นสนิม ป้องกันแสง UV ไม่เกิดตะไคร่น้ำ สีสวยไม่จืดจาง ผลิตจากวัสดุที่สัมผัสอาหารได้
    </div>
  </div>
</div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span  class="fa fa-3x fa-chevron-circle-left bottom" ></span>
    <span  class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
  <br><br><br><br><br><br><br>
    <span class="fa fa-3x fa-chevron-circle-right bottom"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br><br>
  <h4 class="text-center"><b>ประเภทสินค้า<b></h4>
    <table class="text-center">
  <?php
    $sql="SELECT * from tb_producttype";
    $p = $objCon->query($sql);
    while ($r = $p->fetch_assoc()){ ?>
      <tr>
        <td>
          <a href="shop.php?type=<?php echo $r['product_type']; ?> " class="btn" role="button">
            <img class="thumbnail" title="<?= $r['type_name'];?>" src="./img/type/<?php echo $r['type_pic'];?>">
          </a>
          <a href="shop.php?type=<?php echo $r['product_type']; ?>">
            <h6><b><?php echo $r['type_name'];?></b></h6>
          </a>
        </td>
      </tr>
<?php } ?>      
    </table>
</div>
<?php
  require_once('script.php');
  $objCon->close();
?>
</body>
</html>
