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
        
        if ($_POST['product_type']==5) {
            $sql = "update tb_list set price = '".$_POST['price']."',stock = '".$_POST['stock']."'
                where list_id = '".$_POST['list_id']."' ";
            $q1 = $objCon->query($sql);
            
            if ($q1) {
                header("location:edit_product.php?id=".$id);
            }
        }
        header("location:edit_product.php?id=".$id);
    }
}
if (isset($_POST['new'])) {
    $date = date('Y-m-d h:m:s');
    $sql = "insert into tb_product (product_name,product_type,description,product_owner,product_date) 
    VALUES ('".$_POST["product_name"]."','".$_POST["product_type"]."','".$_POST["desciption"]."','".$_POST["product_owner"]."','$date')";
    $query = $objCon->query($sql);
    echo $objCon->error;
    if($query){
        $id = (int)$objCon->insert_id;
    //uploadimg
        $str_img = explode(".",$_FILES["picture"]["name"]);
        $imgname = $id.'.'.$str_img['1'];
        if(move_uploaded_file($_FILES["picture"]["tmp_name"],"../img/".$imgname))
        {   
            $sql="UPDATE tb_product SET picture = '".$imgname."' WHERE product_id = '$id' ";
            $q = $objCon -> query($sql);
            if ($q) {
                if ($_POST['produt_type']==5){
                    $sql="insert into tb_list (price,product_id,stock) values ('".$_POST['price']."','$id','".$_POST['stock']."') ";
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