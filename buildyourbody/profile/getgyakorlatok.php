<?php
require_once '../php/init.php';
if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['izomcsid'])){
    $izomcsoportid = $_POST['izomcsid'];
    $sql = "SELECT * FROM gyakorlatok WHERE izomcsoport_id = '$izomcsoportid';";
    $res = $con -> query($sql);
    $html = "";
    if($res){
        while($row = $res -> fetch_assoc()){
            $html .= '<div>'.$row["gynev"].'</div>';
            $html .= '<div>'.$row["leiras"].'</div>';
        }
    }
    echo $html;
    $con ->close();
}