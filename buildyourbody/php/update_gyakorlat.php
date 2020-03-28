<?php
require_once '../php/init.php';
if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['gyid'])){
    $gyid = $_POST["gyid"];
    $gyak = $_POST["gyak"];
    $leiras = $_POST["leiras"];
    $sql = "UPDATE `gyakorlatok` SET `gynev` = ?, `leiras` = ? WHERE `gyakorlatok`.`gyakorlatok_id` = ?;";
    $statement = $con -> prepare($sql);
    $statement -> bind_param("ssi",$gyak,$leiras,$gyid);
    if($statement -> errno){
        echo "0";
    }else{
        echo "1";
    }
    $statement -> execute();
    $statement -> close();
    $con -> close();
}