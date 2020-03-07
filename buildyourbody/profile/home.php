<?php 
require_once '../php/init.php';
   if(!isset($_SESSION['uid'])){
      header("location: ../index.php");
   }

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


<nav class="navbar navbar-expand-lg navbar-dark">
<div class="container">
  <a href="home.php" class="navbar-brand"><img src="../img/logo2.png">Build Your Body</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Profil</a>
      <div class="dropdown-menu">
      <?php
        $sql = "SELECT * FROM felhasznalok WHERE f_id= ".$_SESSION['uid'];
        $res = $con->query($sql);
        if($res){
            $row = mysqli_fetch_assoc($res);
            $fname = $row['fname'];
            $jelszo = $row['jelszo'];
            $teljesnev = $row['teljesnev'];
            $email = $row['email'];
            $tsuly = $row['tsuly'];
            $tmagassag = $row['tmagassag'];
    ?>
    <img src="../img/user.png" class="userimage" alt="Felhasználó">
  <form class="px-4 py-3">
  
    <div class="row">
      
      <div class="col-lg-7">
      <div class="form-group">
      <label>Teljes név</label>
      <input type="email" readonly value="<?php echo $row["teljesnev"]; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>E-mail</label>
      <input type="email" readonly value="<?php echo $row["email"]; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Felhasználónév</label>
      <input type="email" readonly value="<?php echo $row["fname"]; ?>" class="form-control">
    </div>
      </div>
      <div class="col-lg-5">
      <div class="form-group">
      <label>Jelszó</label>
      <input type="email" readonly value="<?php echo $row["jelszo"]; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Testsúly</label>
      <input type="email" readonly value="<?php echo $row["tsuly"]; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Testmagasság</label>
      <input type="email" readonly value="<?php echo $row["tmagassag"]; ?>" class="form-control">
    </div>
      </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
          <button class="btn btn-primary text-white">Módosítás</button>
        </div>
      </div>

    
  </form>

      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="#">Táplálkozás</a>
      </li>
      <li class="nav-item">
        <a class="nav-link edzesbtn" href="#">Edzés</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Kiegészítők</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Kijelentkezés</a>
      </li>
  </div>
  </div>
</nav>

<section class="edzes">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <p>valami</p>
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
