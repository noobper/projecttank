<?php
    session_start();
    if ($_SESSION['status']!="2") {
    header('location:../index.php');
    }
    require_once('../connect/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" href="../img/pic/smile.png" type="image/x-icon">
<link rel="stylesheet" href="../css/stylesheet.css">
<link rel="stylesheet" href="../css/foundation.css">
<link href="../css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
<link rel="stylesheet" href="../css/app.css" />

<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<title>JudoTANK</title>
</head>
<body style="background : white">
    <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <ul class="nav navbar-nav navbar-right">
            <li><a><b><?php echo $_SESSION['username']; ?></b></a></li>
        </ul>
    </div>
    </div>
    <div class="list-black col-md-2 col-sm-3 col-xs-12 fixed-top">
        <a href="../index.php" class="band-black list-group-item"><h4>iCON</h4></a>
        <a href="index.php" class="black list-group-item">คำสั้งซื้อ</a>
        <a href="product_view.php" class="black list-group-item">รายการสินค้า</a>
        <a href="type_view.php" class="black list-group-item">ประเภทสินค้า</a>
        <a href="member_view.php" class="black list-group-item">จัดการสมาชิก</a>
        <a href="installer_view.php" class="black list-group-item">จัดการพนักงานติดตั้ง</a>
        <a href="report_view.php" class="black list-group-item">แจ้งปัญหา</a>
        <a href="sending_view.php" class="black list-group-item">สถานะขนส่ง</a>
        <a href="blog_view.php" class="black list-group-item">บทความ</a>
        <a href="../logout.php" class="black list-group-item">ออกจากระบบ</a>
    </div>
<div id="content" class="content col-md-offset-2 col-md-10 col-sm-offset-3 col-sm-9">