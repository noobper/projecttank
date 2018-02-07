<?php
session_start();
if (!isset($_SESSION["status"])) {
	echo '<script>alert("กรุณาเข้าสู่ระบบก่อนสั่งซื้อสินค้า!");
		
		window.history.back();
		$(".dropdown-open").addClass("open");
		</script>';//
	//echo "<meta http-equiv='refresh' content='0;url=mainlogin.php'>";
}else{
if(!isset($_SESSION["intLine"]))
{

	 $_SESSION["intLine"] = 0;
	 $_SESSION["strProductID"][0] = $_GET["id"];
	 $_SESSION["strQty"][0] = 1;

	 header("location:cart.php");
}
else
{
	
	$key = array_search($_GET["id"], $_SESSION["strProductID"]);
	if((string)$key != "")
	{
		 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + 1;
	}
	else
	{
		
		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["strProductID"][$intNewLine] = $_GET["id"];
		 $_SESSION["strQty"][$intNewLine] = 1;
	}
	
	 header("location:cart.php");

} }
?>