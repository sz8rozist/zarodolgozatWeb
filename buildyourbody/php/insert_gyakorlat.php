<?php
require_once '../php/init.php';
if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST["gynev"] && !empty($_POST["leiras"]) && !empty($_POST['izom']))){
    $gynev = $_POST['gynev'];
    $leiras = $_POST['leiras'];
    $izom = $_POST['izom'];
    $msg =  '';
    $sql = "INSERT INTO `gyakorlatok`(`gynev`, `izomcsoport_id`, `leiras`) VALUES ('$gynev',(SELECT izomcsoport_id FROM izomcsoportok WHERE izomcsoport = '$izom'),'$leiras');";
    $res = $con->query($sql);
    if (!$res) {
         $msg .= "0";
    } 
    else {
        $msg .= "1";
    }
    echo $msg;
    $con -> close();
}