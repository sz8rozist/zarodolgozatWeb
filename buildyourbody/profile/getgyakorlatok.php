<?php
require_once '../php/init.php';
if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['izomcsid'])){
    $izomcsoportid = $_POST['izomcsid'];
    $sql = "SELECT * FROM gyakorlatok WHERE izomcsoport_id = '$izomcsoportid';";
    $res = $con -> query($sql);
    $html = "";
    if($res){
        while($row = $res -> fetch_assoc()){
            $html .= '<div class="col-lg-3 col-md-6 col-sm-6">
            <div class="flip-box">
  <div class="flip-box-inner">
    <div class="flip-box-front">
      <h2>'.$row['gynev'].'</h2>
    </div>
    <div class="flip-box-back">
      <p>'.$row['leiras'].'</p>
    </div>
  </div>
</div>
        </div>
         ';
        }
    }
    echo $html;
    $con ->close();
}