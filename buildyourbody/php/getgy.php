<?php

require_once 'init.php';

if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['izomid'])){
    $id = $_POST['izomid'];
    $html = '';
    $sql = "SELECT * FROM gyakorlatok WHERE izomcsoport_id = '$id';";
    $res = $con->query($sql);
    if($res){
        $html .= "<select class='custom-select gya'><option>Gyakorlatok</option>";
        while($row = $res->fetch_assoc()){
            $html .= "<option id='".$row['gyakorlatok_id']."'>".$row['gynev']."</option>";
        }
        $html .= "</select>";
    }
    echo $html;
}