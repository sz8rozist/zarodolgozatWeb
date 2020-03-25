<?php
require_once '../php/init.php';
if(isset($_SESSION['uid'])){
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nev"]) && isset($_POST["email"]) && isset($_POST["fname"]) && isset($_POST["pw"]) && isset($_POST["tsuly"]) && isset($_POST["tmagassag"])){
        $nev = $_POST["nev"];
        $email = $_POST["email"];
        $fname = $_POST["fname"];
        $pw = $_POST["pw"];
        $tsuly = $_POST["tsuly"];
        $tmagassag = $_POST["tmagassag"];
        $sql = "UPDATE `felhasznalok` SET `fname` = ?, `jelszo` = ?, `teljesnev` = ?, `email` = ?, `tsuly` = ?, `tmagassag` = ? WHERE `felhasznalok`.`f_id` = ?;";
        $stmt = $con -> prepare($sql);
        $stmt -> bind_param("ssssiii",$fname,$pw,$nev,$email,$tsuly,$tmagassag,$_SESSION["uid"]);
        if($stmt -> errno){
            echo "0";
        }else{
            echo "1";
        }
        $stmt -> execute();

        $stmt -> close();
    }
 }
 $con -> close();