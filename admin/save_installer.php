<?php
    require_once('../connect/connect.php');
    echo "1";
    if (isset($_POST['edit_team_id'])) {
        echo "2";
        $sql = 'update tb_worker_team set 
            worker_team_name = ("'.$_POST['worker_team_name'].'"),
            worker_team_tel = ("'.$_POST['worker_team_tel'].'"),
            worker_team_area = ("'.$_POST['worker_team_area'].'")
            where worker_team_id = "'.$_POST['edit_team_id'].'"
            ';
        $q = $objCon->query($sql);
        if ($q) {
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
    }
    if (isset($_POST['new_worker'])) {
        $sql = 'insert into tb_worker (worker_team_id,worker_name,worker_tel,worker_add)
        value ("'.$_POST['new_worker'].'","'.$_POST['worker_name'].'",
        "'.$_POST['worker_tel'].'","'.date("d-m-Y").'")';
        $q = $objCon->query($sql);
        $id=$objCon->insert_id;
        //uploadimg
        if($_FILES["worker_pic"]["error"]==0){
            $str_img = explode(".",$_FILES["worker_pic"]["name"]);
            $imgname = $id.'.'.$str_img['1'];
            if(move_uploaded_file($_FILES["worker_pic"]["tmp_name"],"../img/worker/".$imgname))
            {
                $sql='update tb_worker set worker_pic = ("'.$imgname.'")
                    where worker_id = '.$id.' ';
                $q = $objCon->query($sql);
                if ($q) {
                    header('location:member_install.php?id='.$_POST['new_worker']);
                }
            }
        }else {
            header('location:member_install.php?id='.$_POST['new_worker']);
        }
    }
    if (isset($_POST['edit_worker'])) {
        $sql = 'update tb_worker set worker_team_id =("'.$_POST['new_worker'].'"),
            worker_name = ("'.$_POST['worker_name'].'"),
            worker_tel=("'.$_POST['worker_tel'].'")
            where worker_id = "'.$_POST['edit_worker'].'"
            ';
        $q = $objCon->query($sql);
        //uploadimg
        if($_FILES["worker_pic"]["error"]==0){
            $str_img = explode(".",$_FILES["worker_pic"]["name"]);
            $imgname = $id.'.'.$str_img['1'];
            if(move_uploaded_file($_FILES["worker_pic"]["tmp_name"],"../img/worker/".$imgname))
            {
                $sql='update tb_worker set worker_pic = ("'.$imgname.'")
                    where worker_id = "'.$_POST['edit_worker'].'" ';
                $q = $objCon->query($sql);
                if ($q) {
                    header('location:'.$_SERVER['HTTP_REFERER']);
                }
            }
        }else {
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
    }
?>