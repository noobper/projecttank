<?php
	session_start();
	header('Content-Type:application/json');
	require_once('./connect/connect.php');
/*
	$strSQL = "SELECT * FROM tb_user INNER JOIN tb_status on tb_user.status_id=tb_status.status_id 
	WHERE username = '".mysqli_real_escape_string($objCon,$_POST['user'])."' 
	and password = '".mysqli_real_escape_string($objCon,$_POST['pass'])."'";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if($objResult)
	{	
		$_SESSION["user_id"] = $objResult["user_id"];
		$_SESSION["username"] = $objResult["fullname"];
		$_SESSION["status"] = $objResult["statusname"];
		session_write_close();
		
		if($objResult["statusname"] == "USER")
		{
			echo json_encode(array('status'=>'1','message'=>'ยินดีต้อรับเข้าสู่ระบบ'));
			//header("location:index.php");
		}
		else
		{
			echo json_encode(array('status'=>'2','message'=>'ยินดีต้อรับเข้าสู่ระบบ'));
			//header("location:./admin/index.php");
		}
	}
	else {
		echo json_encode(array('status'=>'0','message'=>'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง'));	
	}
*/
	if($_POST['user_name']!="" && $_POST['user_pass']!=""){
		$sql = "SELECT * FROM tb_user WHERE username = '".mysqli_real_escape_string($objCon,$_POST['user_name'])."' 
		and password = '".mysqli_real_escape_string($objCon,$_POST['user_pass'])."'";
		$q = mysqli_query($objCon,$sql);
		$r = mysqli_fetch_array($q,MYSQLI_ASSOC);
		if($r){
			$_SESSION["user_id"] = $r["user_id"];
			$_SESSION["username"] = $r["fullname"];
			$_SESSION["status"] = $r["status_id"];
			session_write_close();
		
			if($r["status_id"] == 1)
			{
				echo json_encode(array('status'=>'1','message'=>'ยินดีต้อรับเข้าสู่ระบบ'));
				//header("location:index.php");
			}
			if($r["status_id"] == 2)
			{
				echo json_encode(array('status'=>'2','message'=>'ยินดีต้อรับผู้ดูแลระบบ'));
				//header("location:./admin/index.php");
			}
		}
		else 
		{
			echo json_encode(array('status'=>'0','message'=>'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง'));	
		}
	}
	else
	{
		echo json_encode(array('status'=>'0','message'=>'กรุณากรอกข้อมูลให้ครบถ้วน'));	
	}

    

	mysqli_close($objCon);
?>
	