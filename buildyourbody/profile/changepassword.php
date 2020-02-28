<?php 
require_once '../php/init.php';
    if(!isset($_SESSION['user'])){
        header("Location: ../login.php");
    }
if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['newpw']) && !empty($_POST['newpwconfirm'])){
        $ujJelszo = $_POST['newpw'];
        $ujJelszoConfirm = $_POST['newpwconfirm'];
        if($ujJelszo === $ujJelszoConfirm){
            $sql = "UPDATE felhasznalok SET jelszo = ? WHERE f_id = ? ";
            $statement = $con -> prepare($sql);
            $statement -> bind_param("si",$ujJelszo,$_SESSION['uid']);
            if($statement -> execute()){
                echo "Sikeres jelszó váltás!";
            }else{
                echo "Sikertelen jelszó váltás!";
            }
            $statement -> close();
        }else{
            echo "A két jelszó nem egyezik!";
        }
        
    }
    $con -> close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/dumbell.png">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/main.js"></script>
    <title>Build Your Body - Home</title>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;">
<div class="container">
  <a href="../home.php" class="navbar-brand"><img src="../img/logo2.png">Build Your Body</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Adatok</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Táplálkozás</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Edzés</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Kiegészítők</a>
      </li>
  </div>
  </div>
</nav>
<div class="welcome">
<div class="container">
<div class="row pt-4">
    <div class="col-12 col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="user">
        <span>Üdvözlöm <?php echo $_SESSION['user']; ?></span>
        </div>
        
    </div>
    <div class="col-12 col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
    <div class="changepw">
        <a href="profile/changepassword.php"><i class="fa fa-cog"></i>Jelszó csere</a>
        </div>
    <div class="logout">
    <a href="../logout.php"><i class="fa fa-sign-out"></i>Kijelentkezés</a>
    </div>
    </div>
</div>
</div>
</div>
<section class="content">
    <div class="container">
        <div class="row">
         <div class="col-lg-12 changepw">
             <h2 class="px-0">Jelszóváltoztatás</h2>
             <form method="POST" action="changepassword.php">
                 <div class="row form-group px-4">
                     <label for="password" class="col-xs-12 col-sm-3 control-label px-0">Jelszó</label>
                     <div class="col-xs-12 col-sm-9 px-0">
                            <input type="password" class="form-control pw" placeholder="Jelszó" name="password" id="password">
                            <div class="help-box px-0">A jelszó minimum 8 karakter hosszú, kis- és nagybetűket, valamint számot tartalmazzon.</div>
                     </div>
                 </div>
                 <div class="row form-group px-4">
                     <label for="confirm-password" class="col-xs-12 col-sm-3 control-label px-0">Jelszó újra</label>
                     <div class="col-xs-12 col-sm-9 px-0">
                         <input type="password" name="password_confirmation" placeholder="Jelszó újra" class="form-control pw-confirm">
                         <div class="message"></div>
                     </div>
                 </div>
                 <div class="row text-right">
                     <div class="col">
                         <button class="btn savenewpw" type="submit">Mentés</button>
                     </div>
                 </div>
             </form>
         </div>
        </div>
    </div>

</section>


 <footer class="page-footer">

  <div class="footer-copyright text-white text-center py-3">
      <span>© 2020 Copyright: Rózsa István</span>
  </div>

</footer>
</body>
</html>
