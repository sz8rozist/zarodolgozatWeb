<?php
require_once '../php/init.php';
if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST["gyakorlatid"])){
    $id = $_POST["gyakorlatid"];
    $sql = "DELETE FROM gyakorlatok WHERE gyakorlatok_id = ?;";
    $statement = $con -> prepare($sql);
    $statement -> bind_param("i",$id);
    if($statement -> errno){
        echo "Hiba a törlés során";
    }else{
        echo "1";
    }
    $statement -> execute();
    $statement -> close();
    $con -> close();
}