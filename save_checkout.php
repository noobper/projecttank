<?php
session_start();
require_once('connect/connect.php');
    $sql = " 
        INSERT INTO tb_address (address,city,postcode) 
        VALUES
        ('".$_POST["txtaddress"]."','".$_POST["txtcity"]."','".$_POST["txtpostcode"]."' ) 
        ";
    $q = $objCon->query($sql);
    if (!$q) {
        echo $objCon->error;
        exit();
    }

    $address_id = $objCon->insert_id;

    $sql = "
        UPDATE tb_user SET 
        fullname = '".$_POST["txtname"]."',
        tel = '".$_POST["txttel"]."',
        address_id = '".$address_id."'
        WHERE user_id = '".$_SESSION['user_id']."'
        ";
    $q = $objCon->query($sql);
    if (!$q) {
        echo $objCon->error;
        exit();
    }
    $with_setup=isset($_POST['with_setup'])?'2':'1';
    $sql = "
    	INSERT INTO tb_order (order_date,user_id,totalprice,address_id,comment,with_setup)
	    VALUES
        ('".date("Y-m-d H:i:s")."','".$_SESSION["user_id"]."','".$_SESSION["sumtotal"]."',$address_id,'".$_POST['comment']."',$with_setup ) 
        ";
    $q = $objCon->query($sql);
    if(!$q)
    {
        echo $objCon->error;
        exit();
    }

    $order_id = $objCon->insert_id;

    for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
    {
        if($_SESSION["strProductID"][$i] != "")
        {
            $sql = "SELECT * 
                FROM tb_list 
                WHERE list_id = '".$_SESSION["strProductID"][$i]."'
                ";
            $q = $objCon->query($sql);
            $r = $q->fetch_assoc();
            if (!$r) {
                $objCon->error;
            } else {
                $stock = $r['stock']-1;
            }
            
            
            $sql = "UPDATE tb_list SET stock = $stock WHERE list_id = '".$_SESSION["strProductID"][$i]."' ";
            $objCon->query($sql);

            $sql = "
                INSERT INTO tb_orderdetail (order_id,list_id,qty)
                VALUES
                ('".$order_id."','".$_SESSION["strProductID"][$i]."','".$_SESSION["strQty"][$i]."') 
                ";
                mysqli_query($objCon,$sql);
        }
    }
    unset($_SESSION['strProductID']);
    unset($_SESSION['intLine']);
    unset($_SESSION['sumtotal']);
    unset($_SESSION['strQty']);
    $objCon->close();

    header("location:finish_order.php?OrderID=".$order_id);
?>