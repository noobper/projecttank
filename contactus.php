<?php  
  session_start();
  require_once('./connect/connect.php');
  require_once('head.php');
  require_once('header_bar.php'); ?>
<div class="container bg-white">
  <hr>
  <ol class="breadcrumb">
    <li><a href="index.php">หน้าแรก</a></li>
    <li>ติดต่อเรา</a></li>
  </ol>
<table>

  <td><img src="img/pic/pro.jpg" width="300px" class="img-thumbnail"></td>
    <td class="col-md-6">
      <h2>Judotank</h2>
      <h3>หจก.ยูโดแท้งค์</h3><br>
      <h4>นางทองพูล&emsp;ภูมิพันธ์ &emsp;(คุณแดง)<br><br>
      <b>เบอร์โทรศัพท์</b> 080-2603388,02-8071662<br><br>
      43 ถ.นครลุง แขวงบางไผ่ เขตบางแค กรุงเทพมหานคร 10160
      <br><br><img src="img/pic/line.png" width="30px" > Line : 0802603388
      <br><img src="img/pic/face.png" width="30px" > facebook : Thongpool Poompan
    </td>
    <td>
      <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FDangthongpool%2F%3Fmodal%3Dadmin_todo_tour&tabs=messages&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
    </td>
  </tr>
</table>
<br><h3 class="text-center"><b>แผนที่เดินทางสู่หน้าร้าน</b></h3><br>
<ul class="embed-responsive embed-responsive-4by3">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4668.011289179247!2d100.37585481530951!3d13.735925401360852!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2965952d803d7%3A0xb4ffde463f35ad56!2s43+Soi+Nakhon+Lung+8%2C+Khwaeng+Bang+Phai%2C+Khet+Bang+Khae%2C+Krung+Thep+Maha+Nakhon+10160!5e1!3m2!1sen!2sth!4v1515980277558" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
</ul>
</div>
</div>
</div>

<?php
  require_once('script.php');
  $objCon->close();
?>
</body>
</html>
