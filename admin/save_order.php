<?php
    require_once('../connect/connect.php');
    if (isset($_GET['id'])) {
        echo $_GET['id'];
    }
?>