<?php

require_once '../php/init.php';
if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST["id"])){
    $edzesterv_id = $_POST['id'];
    $sql = "DELETE FROM edzesek WHERE edzesterv_id ='".$edzesterv_id."';";
    $sql2 = "DELETE FROM edzestervek WHERE edzesterv_id ='".$edzesterv_id."';";
    if(mysqli_query($con,$sql) && mysqli_query($con,$sql2)){
        echo 'Data Deleted';
    }
}