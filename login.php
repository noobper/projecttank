<ul class="nav navbar-nav navbar-right ml-auto">
    <!-- สมาชิก -->
    <?php
          if (isset($_SESSION["user_id"])) { ?>
        <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
              <span class="glyphicon glyphicon-user"> </span> 
              <b><?php echo $_SESSION['username']; ?> </b>
              <span class="caret"></span> 
            </a>
            <ul id="login-dp" class="dropdown-menu">
                <div class="row text-center">
                    <li><a href="#" class="btn btn-success"> <span class="glyphicon glyphicon-edit"></span> <b>Profile</b></a></li>
                    <br>
                    <li><a href="logout.php" id="btn_logout" class="btn btn-danger"> <span class="glyphicon glyphicon-log-out"></span>  <b>Logout</b></a></li>
                </div>
                <hr>
            </ul>
        </li>
        <!-- ล็อกอิน -->
        <?php }else { ?>
        <li class="nav-item dropdown">
            <a href="#" id="droplogin" class="dropdown-toggle" data-toggle="dropdown">
    <b><i class="fa fa-user-o"></i> Login</b>
  </a>
            <ul id="login-dp" class="dropdown-menu">
                <li>
                    <div class="row">
                        <div class="col-md-12">
                            <form name="loginfrm" id="loginfrm" method="post" action="" class="form-inline login-form">
                                <br> ชื่อผู้ใช้
                                <input type="text" id="user_name" name="user_name" placeholder="Username" maxlength="20" class="form-control" required> รหัสผ่าน
                                <input type="password" id="user_pass" name="user_pass" placeholder="Password" maxlength="16" class="form-control" required>
                                <li>
                                    <input type="submit" name="submit" id="Login" value="เข้าสู่ระบบ" class="button small expanded">
                                </li>
                                <li><br><br></li>
                                <li><a href="#">ลืมรหัสผ่าน ?</a></li>
                                <hr>
                                <li><a href="register.php">สมัคสมาชิก</a></li>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
        <?php } ?>
</ul>