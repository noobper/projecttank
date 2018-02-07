<?php
session_start();
require_once('connect/connect.php');
require_once('head.php');
require_once('header_bar.php');
?>
<div class="container bg-white">
<hr>
  <ol class="breadcrumb">
    <li><a href="index.php">หน้าแรก</a></li>
    <li><a href="mainlogin.php">บัญชีผู้ใช้งาน</a></li>
    <li>ลงทะเบียนผู้ใช้ใหม่</li>
  </ol>
 <form class="form-horizontal" id="regform" name="regform" method="post" action="" >
<fieldset>

<!-- Form Name -->
<legend>สร้างบัญชีลูกค้าใหม่</legend>

  <label class="col-md-4 control-label" for="regname">ชื่อบัญชีผู้ใช้งาน</label>  
  <div class="col-md-5">
  <input id="regname" name="regname" type="text" maxlength="20" placeholder="Username" class="form-control input-md" title="ชื่อผู้ใช้งาน 6-20 ตัวอักษร" autofocus>
  <span class="help-block">6-20 ตัวอักษร</span> 
  </div>

  <label class="col-md-4 control-label" for="fullname">ชื่อ และ นามสกุล</label>  
  <div class="col-md-5">
  <input id="fullname" name="fullname" type="text" placeholder="Fisrtname  Lastname" class="form-control input-md" >
  </div>

  <label class="col-md-4 control-label" for="regpass">รหัสผ่าน</label>
  <div class="col-md-5">
    <input id="regpass" name="regpass" type="password" placeholder="Password" class="form-control input-md" maxlength="16">
    <span class="help-block">8-16 ตัวอักษร</span>
  </div>

  <label class="col-md-4 control-label" for="confirmpass">ยืนยันรหัสผ่าน</label>
  <div class="col-md-5">
    <input id="confirmpass" name="confirmpass" type="password" placeholder="Confirm Password" class="form-control input-md" maxlength="16"> 
    <span class="help-block" id="message"></span>   
  </div>

  <label class="col-md-4 control-label" for="sex">เพศ</label>
  <div class="col-md-5"> 
    <label class="radio-inline" for="sex-0">
      <input type="radio" name="sex" id="sex-0" value="1" checked="checked">
      ชาย
    </label> 
    <label class="radio-inline" for="sex-1">
      <input type="radio" name="sex" id="sex-1" value="2">
      หญิง
    </label>
    <br><br>
    </div>

    <label class="col-md-4 control-label" for="regemail">อีเมล</label>
  <div class="col-md-5">
    <input id="regemail" name="regemail" type="email" placeholder="Email" class="form-control input-md" data-error="error">
  </div>
 
<label class="col-md-4 control-label" for="regtel">เบอร์โทรศัพท์</label>
  <div class="col-md-5">
    <input id="regtel" name="regtel" type="text" placeholder="Telephone number" class="form-control input-md" onkeypress="autoTab(this)" maxlength="12">
  </div>

<div class="form-group text-center">

  <div class="col-md-9">
    <input type="button" name="savereg" id="savereg" class="btn btn-primary" value="สมัครสมาชิก">
  </div>
</div>

</fieldset>
</form>
</div>

<?php
require_once('script.php');
$objCon->close(); ?>
</body>
</html>
