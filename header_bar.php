<!-- หัว  -->
<img src="./img/anigif.gif" width="100%">
  <nav id="nav_bar" class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">หจก. ยูโดแท้งค์</a>
    </div>
    <ul class="nav navbar-nav">
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="shop.php">ผลิตภัณฑ์
        <span class="fa fa-caret-down"></span></a>
	        <ul class="dropdown-menu">
	          <?php $sql="SELECT * FROM tb_producttype";
	                $q=$objCon->query($sql);
	                while ($r=$q->fetch_assoc()) { ?>
	          <li><a href="shop.php?type=<?php echo $r['product_type']; ?>"><?php echo $r['type_name']; ?></a></li>
	          <?php } ?>
			  <li><a href="custom.php">สั่งทำขนาดพิเศษ</a></li>
	        </ul>
      	</li>
        <li><a href="about.php">เกี่ยวกับเรา</a></li>
        <li><a href="blog.php">บทความ</a></li>
        <li><a href="contactus.php">ติดต่อเรา</a></li>
    </ul>
 	<ul class="nav navbar-nav navbar-right ml-auto">
    <?php
    	if (isset($_SESSION["user_id"])) { ?>
        	<li class="nav-item dropdown">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
	            	<span class="fa fa-user-o"> </span> 
	              	<b><?php echo $_SESSION['username']; ?> </b>
	              	<span class="fa fa-caret-down"></span> 
	            </a>
	            <ul id="login-dp" class="dropdown-menu">
	             	<div class="row text-center">
		                <li><a href="profile.php" class="btn btn-success"><span class="fa fa-edit"></span> <b>Profile</b></a></li><br>
		                <li><a href="logout.php" id="btn_logout" class="btn btn-danger"> 
		                	<span class="fa fa-sign-out"></span> <b>Logout</b></a>
		                </li>
	              	</div>
	              <hr>
	            </ul>
          	</li>
						<li>
						<?php
						if (isset($_SESSION['strQty'])) {
						
							$cart=0;
								foreach ($_SESSION['strQty'] as $item) {
								$cart=$cart+(int)$item;
							};
						?>
							<div class="btn-cart">
							<a href="cart.php" class="btn btn-cart">
								<span class="fa fa-shopping-basket fa-lg"> <b> <?=$cart;?></b></span>
							</a>
							</div>
						</li>
		<?php
						} 
		}else { ?>
			<li id="dropdown-open" class="nav-item dropdown">
  				<a href="#" id="droplogin" class="dropdown-toggle" data-toggle="dropdown">
    				<b><i class="fa fa-user-o"></i> Login</b>
  				</a>
    			<ul id="login-dp" class="dropdown-menu">
      				<li>
        				<div class="row">
          				<div class="col-md-12">
            				<form name="loginfrm" id="loginfrm" method="post" action="" class="form-inline login-form"> <br>
            					ชื่อผู้ใช้
              					<input type="text" id="user_name" name="user_name" placeholder="Username" maxlength="20" class="form-control" required>
              					รหัสผ่าน
								  <input type="password" id="user_pass" name="user_pass" placeholder="Password" maxlength="16" class="form-control" required>
								<li><br></li>
	              				<li><input type="submit" name="submit" id="Login" value="เข้าสู่ระบบ" class="button small expanded"></li>
	              				<!--<li><a href="#">ลืมรหัสผ่าน ?</a></li>-->
	              				<hr>
	              				<li><a href="register.php">สมัคสมาชิก</a></li>
												<li><br></li>
            				</form>
          				</div>
        				</div>
      				</li>
    			</ul>
  			</li>
  		<?php } ?>
    </ul>
   </div>
</nav>