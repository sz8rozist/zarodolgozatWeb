<?php
require_once "../php/init.php";
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["password"])){
    $usern = $_POST["username"];
    $pw = $_POST["password"];
    $sql = "SELECT * FROM felhasznalok WHERE fname = '$usern' AND jelszo = '$pw';";
    $res = $con -> query($sql);
    if(!$res){
        die("Hiba az sql lekérdezésben!");
    }else{
        if($res -> num_rows == 1){
            $row = $res -> fetch_assoc();
            $_SESSION['uid'] = $row['f_id'];
            $_SESSION['user'] = $row['fname'];
            echo "Yes";
        }else{
            echo "No";
        }
    }
}
$con -> close();