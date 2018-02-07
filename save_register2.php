<?php
header('Content-Type: application/json');
require_once('connect/connect.php');
$strSQL = "SELECT * FROM tb_user WHERE username = '".trim($_POST['regname'])."' ";
$objQuery = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
if ($objResult) {
	echo json_encode(array('status'=>'0','message'=>'ขออภัยชื่อบัญชีผู้ใช้งานของท่านถูกใช้งานแล้ว'));
}
elseif ($_POST["regname"]=="" OR $_POST["regpass"]=="" OR $_POST["fullname"]=="" OR $_POST["regtel"]=="" OR $_POST["regemail"]=="") 
{
	echo json_encode(array('status'=>'0','message'=>'กรุณากรอกข้อมูลให้ครบถ้วน'));
}
elseif (strlen($_POST["regpass"])<= 7) {
	echo json_encode(array('status'=>'0','message'=>'รหัสผ่าน 8 -16 ตัวอักษร'));
}
elseif ($_POST["regpass"]!=$_POST["confirmpass"]) {
	echo json_encode(array('status'=>'0','message'=>'กรุณากรอกรหัสผ่านให้ตรงกัน'));
}
else
{
	$reg_date=date("d-F-Y");
	$strSQL = "INSERT INTO tb_user (username,password,fullname,sex_id,tel,email,reg_date) VALUES  ('".$_POST["regname"]."','".$_POST["regpass"]."','".$_POST["fullname"]."','".$_POST["sex"]."','".$_POST["regtel"]."','".$_POST["regemail"]."','$reg_date')";
	$objQuery = mysqli_query($objCon,$strSQL);
	if ($objQuery) {
		echo json_encode(array('status'=>'1','message'=>'สมัครสมาชิกสำเร็จ'));
	}
	else
	{
		echo json_encode(array('status'=>'0','message'=>'เกิดข้อผิดพลาดระหว่างดำเนินการ กรุณาลองใหม่อีกครั้ง'));
	}		
}

	mysqli_close($objCon);
?>