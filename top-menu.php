<?php require_once('connect/connect.php'); ?>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">หจก. ยูโดแท้งค์</a>
    </div>
    <ul class="nav navbar-nav">
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">ผลิตภัณฑ์
        <span class="caret"></span></a>
         <ul class="dropdown-menu">
          <?php $sql="SELECT * FROM tb_producttype";
                $q=$objCon->query($sql);
                while ($r=$q->fetch_assoc()) { ?>
          <li><a href="shop.php?type=<?php echo $r['product_type']; ?>"><?php echo $r['type_name']; ?></a></li>
          <?php } ?>
          <li><a href="#">สั่งทำขนาดพิเศษ</a></li>
        </ul>
      </li>
        <li><a href="#">เกี่ยวกับเรา</a></li>
        <li><a href="#">บทความ</a></li>
        <li><a href="#">ติดต่อเรา</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <!-- สมาชิก -->

    <?php
          if (isset($_SESSION["user_id"])) { ?>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
              <span class="glyphicon glyphicon-user"> </span> 
              <b><?php echo $_SESSION['username']; ?> </b>
              <span class="caret"></span> 
            </a>
            <ul class="dropdown-menu">
              <div class="panel text-center"><br>
                <li></li>
                <li><a href="#" class="btn btn-success"> <span class="glyphicon glyphicon-edit"></span> <b>Profile</b></a></li>
                <br>
                <li><a href="logout.php" class="btn btn-danger"> <span class="glyphicon glyphicon-log-out"></span>  <b>Logout</b></a></li>
                </div>
              </ul> 

            </li>
          <!-- ล็อกอิน -->         
            <?php }else {             
              require_once('login.php');
             }; ?>
          

    </ul>
  </div>
</nav>