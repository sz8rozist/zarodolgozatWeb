
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
                
            } else {
                 http_response_code(500);
            }
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="img/dumbell.png">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
<script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/main.js"></script>
    <title>Build Your Body</title>
</head>
<body>

<div class="container box">
    <form method="post" class="container-fluid">
        <h1 class="text-center text-uppercase">Bejelentkezés</h1>
        <div class="form-group">
            <input type="text" name="username" placeholder="Felhasznalonev" class="form-control username">
        </div>
        <div class="form-group">
            <input type="password" name="password"  placeholder="Jelszó" class="form-control password">
        </div>
        <div class="form-group">
            <button class="btn btn-block login" type="submit" >Belép</button>
        </div>
        <div class="error"></div>
        <div class="success"></div>
        <span class="loading"></span>
        
    </form>

</div>


</body>
</html>
