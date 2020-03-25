<?php

require_once '../php/init.php';
if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST["gyakorlatid"]) && !empty($_POST["sszam"]) && !empty($_POST["isszam"])) {
    $gyakorlatid = $_POST['gyakorlatid'];
    $uid = $_SESSION['uid'];
    $last_id='';
    $output = '';
    $ismetles = $_POST['isszam'];
    $sorozat = $_POST['sszam'];
    $sql = "INSERT INTO `edzestervek`(`gyakorlat_id`, `sorozatszam`, `ismetlesszam`) VALUES ('$gyakorlatid','$sorozat','$ismetles')";
    mysqli_query($con, $sql);
    $last_id = "SELECT MAX(edzesterv_id) FROM edzestervek";
    $res = $con->query($last_id);
    while ($row = $res->fetch_array()) {

        $last_id = $row[0];
    }
    //echo $last_id;

    $sql = "INSERT INTO `edzesek`(`f_id`, `edzesterv_id`) VALUES ('$uid','$last_id')";
    //echo $sql;
    if(mysqli_query($con,$sql)){
        echo "Done";
    }
}
