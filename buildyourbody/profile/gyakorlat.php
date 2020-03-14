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
    <title>Build Your Body - <?php echo $_SESSION["user"]; ?></title>
    
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
      <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><img src="../img/user1.png"></a>
      <div class="dropdown-menu profiledropdown">
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
      
      <div class="col-lg-7 col-md-7 col-sm-12">
      <div class="form-group">
      <label>Teljes név</label>
      <input type="text" id="input-teljesnev" readonly value="<?php echo $row["teljesnev"]; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>E-mail</label>
      <input type="text" id="input-email" readonly value="<?php echo $row["email"]; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Felhasználónév</label>
      <input type="text" id="input-fname" readonly value="<?php echo $row["fname"]; ?>" class="form-control">
    </div>
      </div>
      <div class="col-lg-5 col-md-5 col-sm-12">
      <div class="form-group">
      <label>Jelszó</label>
      <input type="password" id="input-pw" readonly value="<?php echo $row["jelszo"]; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Testsúly</label>
      <input type="text" id="input-tsuly" readonly value="<?php echo $row["tsuly"]; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Testmagasság</label>
      <input type="text" id="input-tmagassag" readonly value="<?php echo $row["tmagassag"]; ?>" class="form-control">
    </div>
      </div>

    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gombok">
          <button class="btn btn-primary update-profile text-white">Módosítás</button>
          <button class="btn btn-success savenew-profile text-white float-right" disabled>Mentés</button>
        </div>
      </div>

    
  </form>

      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="#">Táplálkozás</a>
      </li>
      <li class="nav-item">
      <div class="dropdown">
      <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Edzésterv</a>
  <div class="dropdown-menu edzesdropdown col-lg-8 col-md-8 col-sm-12" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item edzes-menu" href="edzesterv.php">Edzésterv</a>
    <a class="dropdown-item edzes-menu" href="#">Edzés</a>
    <a class="dropdown-item edzes-menu" href="gyakorlat.php">Gyakorlatok</a>
  </div>
</div>
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

<?php
    $sql = "SELECT * FROM izomcsoportok";
    $res = $con->query($sql);
    $select = '<select class="custom-select izom">';
    while($row = $res ->fetch_array()){
        $select.= '<option class="izomcs" id='.$row[0].'>'.$row[1].'</option>';
    }
    $select .= '</select>';

    

?>
<section class="gyakorlat">
    <div class="container">
        <h4>Válassz izomcsoportot!</h4>
        <div class="row">
            <div class="col-lg-2">
                    <?php echo $select; ?>
            </div>
        </div>
        <div class="row gyakorlat-leiras">
          
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
