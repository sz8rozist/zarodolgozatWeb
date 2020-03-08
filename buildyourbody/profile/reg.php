<?php
    require_once '../php/init.php';
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["fname"]) && isset($_POST["pw"]) && isset($_POST["tsuly"]) && isset($_POST["tmagassag"])){
        $nev = $_POST["name"];
        $email = $_POST["email"];
        $fname = $_POST["fname"];
        $pw = $_POST["pw"];
        $tsuly = $_POST["tsuly"];
        $tmagassag = $_POST["tmagassag"];
        $sql = "INSERT INTO `felhasznalok` (`fname`, `jelszo`, `teljesnev`, `email`, `tsuly`, `tmagassag`) VALUES (?, ?, ?, ?, ?, ?);";
        $stmt = $con -> prepare($sql);
        $stmt -> bind_param("ssssii",$fname,$pw,$nev,$email,$tsuly,$tmagassag);
        if($stmt -> errno){
            echo "Sikertelen regisztrálás!";
        }else{
            echo "Sikeres regisztráció!";
        }
        $stmt -> execute();
        $stmt -> close();
    }
    $con -> close();

?>