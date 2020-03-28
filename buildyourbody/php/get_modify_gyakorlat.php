<?php

require_once '../php/init.php';

if(isset($_POST['gyid'])){

    $id = $_POST["gyid"];
    $sql = "SELECT * FROM gyakorlatok WHERE gyakorlatok_id = $id";
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($res);
    echo json_encode($row);
}