<?php 
    $con = new mysqli("localhost","root","","buildyourbody","3306");
    if ($con -> errno){
        die("Az adatbázishoz nem sikerült csatlakozni!");
    }
    if (!$con ->set_charset("utf8")){
        echo "Karakterkódolás beállítása sikertelen!";
    }

?>