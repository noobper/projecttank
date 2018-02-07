<?php
ob_start();
session_start();
  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strProductID"][$i] != "")
	  {
			if ($_POST["txtQty".$i] < 1) {
				$_POST["txtQty".$i]=1;
			}
			$_SESSION["strQty"][$i] = $_POST["txtQty".$i];
	  }
  }
	
	header("location:cart.php");

?>