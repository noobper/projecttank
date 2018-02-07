<?php
require_once('../connect/connect.php');
if (isset($_POST['change_pic'])) {
    $id=(int)$_POST['id'];
    $str_img = explode(".",$_FILES["picture"]["name"]);
    $imgname = $id.'.'.$str_img['1'];
    if(move_uploaded_file($_FILES["picture"]["tmp_name"],"../img/".$imgname))
    {
        $sql="UPDATE tb_product SET picture = '".$imgname."' WHERE product_id = '$id' ";
	    $q = $objCon -> query($sql);
        header("location:edit_product.php?id=".$id);
    }
}
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $date = date('Y-m-d h:m:s');
    $sql = "update tb_product set product_name = '".$_POST['product_name']."',
        product_type = '".$_POST['product_type']."',
        description = '".$_POST['description']."',
        product_owner = '".$_POST['product_owner']."',
        product_date = '$date'
        where product_id = '$id' ";
    $q=$objCon->query($sql);
    if ($q) { 
        header("location:edit_product.php?id=".$id);
    }
}
if (isset($_POST['new'])) {
    $date = date('Y-m-d h:m:s');
    $sql = "INSERT INTO tb_product (product_name,product_type,description,product_owner,product_date) 
    VALUES ('".$_POST["product_name"]."','".$_POST["product_type"]."','".$_POST["desciption"]."','".$_POST["product_owner"]."','$date')";
    $query = $objCon->query($sql);
    if($query){
        $objCon->error;
        $id = (int)$objCon->insert_id;
    //uploadimg
        $str_img = explode(".",$_FILES["picture"]["name"]);
        $imgname = $id.'.'.$str_img['1'];
        if(move_uploaded_file($_FILES["picture"]["tmp_name"],"../img/".$imgname))
        {   
            $sql="UPDATE tb_product SET picture = '".$imgname."' WHERE product_id = '$id' ";
            $q = $objCon -> query($sql);
            if ($q) {
                if ($_POST['price']!=''){
                    $sql="insert into tb_list (price,product_id) values ('".$_POST['price']."','$id') ";
                    $q = $objCon -> query($sql);
                    header("location:edit_product.php?id=".$id);
                } else {
                    header("location:edit_product.php?id=".$id);
                }
            }
        }
    }
}
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "delete from tb_product where product_id = '$id' ";
    $q = $objCon -> query($sql);
    if ($q) {
        header("location:product_view.php?id=".$id);
    }
}
$objCon->close();
?>