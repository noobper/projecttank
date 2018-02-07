<?php

session_start();
require_once('connect/connect.php');

$sql = "insert into tb_report (user_id,report,report_status,report_date) 
    values ('".$_SESSION['user_id']."','".$_POST['report']."',1,CURRENT_TIMESTAMP) ";
$q =$objCon->query($sql);
if ($q) {
    header('location:report.php');
} else {
    echo '<script>alert("เกิดเหตุขัดข้อง ไม่สามารถบึนทึกได้");</script>';
    header('location:profile.php');
}

echo $_SESSION['user_id'];

?>