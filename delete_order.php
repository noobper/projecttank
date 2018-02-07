
<?php
require_once 'connect/connect.php';
$id=$_GET['id'];
$sql = "DELETE FROM tb_order WHERE order_id = $id ";
$q=$objCon->query($sql);
if ($q)
{
    header('location:'.$_SERVER['HTTP_REFERER']);
} else {
    $objCon->error();
}
?>