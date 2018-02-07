<?php
    require_once('../connect/connect.php');
    if (isset($_POST['new'])) {
        $color = $_POST['color'];
        $capacity = $_POST['capacity'];
        $center = $_POST['center'];
        $height = $_POST['height'];
        $inlet = $_POST['inlet'];
        $waterout = $_POST['waterout'];
        $stand = $_POST['stand'];
        $waterdie = $_POST['waterdie'];
        $price = $_POST['price'];
        $product_id = $_POST['id'];
        $stock = $_POST['stock'];

        $sql="insert into tb_list (color,capacity,center,height,inlet,waterout,stand,waterdie,price,product_id,stock)
            values ('$color','$capacity','$center','$height','$inlet','$waterout','$stand','$waterdie','$price','$product_id','$stock')
            ";
        $q = $objCon -> query($sql);
        if ($q) {
            header('location:edit_product.php?id='.$product_id);
        }
    } elseif (isset($_POST['product_id'])) {
        
        $sql = "update tb_list set
        color = '".$_POST['color']."',
        capacity = '".$_POST['capacity']."',
        center = '".$_POST['center']."',
        height = '".$_POST['height']."',
        inlet = '".$_POST['inlet']."',
        waterout = '".$_POST['waterout']."',
        stand = '".$_POST['stand']."',
        waterdie = '".$_POST['waterdie']."',
        price = '".$_POST['price']."',
        product_id = '".$_POST['product_id']."',
        stock = '".$_POST['stock']."'
        where list_id = '".$_POST['id']."' ";
        $q = $objCon -> query($sql);
        if ($q) {
            header('location:edit_product.php?id='.$_POST['product_id']);
        }
    } elseif (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $sql = "delete from tb_list where list_id = '$id' ";
        $q = $objCon -> query($sql);
        if ($q) {
            header("location:".$_SERVER['HTTP_REFERER']);
        }
    }
?>