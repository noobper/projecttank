<?php
    require_once('../connect/connect.php');
    if (isset($_POST['type_name'])) {
        $savetype= $_POST['type_name'];
        $sql = " insert tb_producttype  (type_name) values ('$savetype') ";
        $q = $objCon->query($sql);
        if ($q) {
            header('location:type_view.php');
        }else{
            $objCon->error;
        }
    }
    if (isset($_POST['edit_type'])) {
        $savetype= $_POST['edit_type'];
        $id = $_POST['id'];
        $sql = "Update tb_producttype set type_name = '$savetype' where product_type = '$id' ";
        $q = $objCon->query($sql);
        if ($q) {
            header('location:type_view.php');
        }else{
            $objCon->error;
        }
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "delete from tb_producttype  where product_type = $id ";
        $q = $objCon->query($sql);
        if ($q) {
            header('location:type_view.php');
        } else {
            $objCon->error;
        }
    }
    
    
    $objCon->close();
?>