
<?php 
        require_once '../php/init.php';
        if((isset($_POST['u']))&& (isset($_POST['p'])) && $_SERVER['REQUEST_METHOD'] == "POST"){
            $user = $_POST['u'];
            $pw = $_POST['p'];
            echo "Username: " .$user." "."Jelszó: ".$pw;
            $sql = "SELECT * FROM felhasznalok WHERE fname = '$user' AND jelszo = '$pw'; ";
            $res = $con -> query($sql);
            if(!$res){
                die("Hiba az sql lekérdezés során!");
            }
            if ($res -> num_rows == 1){
                $row = $res -> fetch_assoc();
                $_SESSION['uid'] = $row['f_id'];
                $_SESSION['user'] = $row['fname'];
                echo 1
                
            } else {
                 echo 0
            }
        }