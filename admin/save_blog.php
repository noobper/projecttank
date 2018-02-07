<?php
 require_once('../connect/connect.php');
 if (isset($_POST['new'])) {
     $sql = 'insert into tb_blog (blog_title,blog_body) 
        value ("'.$_POST['blog_title'].'","'.$_POST['blog_body'].'")';
    $q = $objCon->query($sql);
    if($q){
        $id = $objCon->insert_id;
    //uploadimg
        $str_img = explode(".",$_FILES["blog_pic"]["name"]);
        $imgname = $id.'.'.$str_img['1'];
        if(move_uploaded_file($_FILES["blog_pic"]["tmp_name"],"../img/blog/".$imgname))
        {   
            $sql="UPDATE tb_blog SET blog_pic = '".$imgname."' WHERE blog_id = '$id' ";
            $q = $objCon -> query($sql);
            if ($q) {
                header('location:blog_view.php');
            }
        }
    }
 }
 if (isset($_POST['update'])) {
    $id = $_POST['update'];
    $sql = 'UPDATE tb_blog set
        blog_title = "'.$_POST['blog_title'].'",
        blog_body = "'.$_POST['blog_body'].'"
        where blog_id = '.$id.'
        ';
   $q = $objCon->query($sql);
   if($q){
       
   //uploadimg
        if($_FILES["blog_pic"]["error"]==0){
        $str_img = explode(".",$_FILES["blog_pic"]["name"]);
        $imgname = (int)$id.'.'.$str_img['1'];
            if(move_uploaded_file($_FILES["blog_pic"]["tmp_name"],"../img/blog/".$imgname))
            {   
            $sql="UPDATE tb_blog SET blog_pic = '".$imgname."' WHERE blog_id = '$id' ";
            $q = $objCon -> query($sql);
                if ($q) {
                    header('location:blog_view.php');
                }
            }
        }
        else{
            header('location:blog_view.php');
        }
   }
}
if (isset($_GET['id'])) {
    $sql = 'delete from tb_blog where blog_id = "'.$_GET['id'].'"';
    if ($objCon->query($sql)) {
        header('location:blog_view.php');
    }else {
        header('location:blog_view.php?error');
    }
}
?>