<?php
require_once '../php/init.php';
if (!isset($_SESSION['uid'])) {
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
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="../js/main.js"></script>
  
  <title>Build Your Body - <?php echo $_SESSION["user"]; ?></title>

</head>

<body>

  <div class="modal fade modal-gy" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle">Új Gyakorlat</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5 class="gy-h5" style="color: white;">Ha új gyakorlatot adsz hozzá kérlek írj róla pár sort, ezzel segítve eddzőtársaid fejlődését.</h5>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <form class="ujgyakorlat" method="POST">
                  <?php
                  $sql = "SELECT * FROM izomcsoportok";
                  $res = $con->query($sql);
                  $select = '<select name="cs" class="custom-select iz"><option class="izomcs">Izomcsoportok</option>';
                  while ($row = $res->fetch_array()) {
                    $select .= '<option  class="izomcs" id=' . $row[0] . '>' . $row[1] . '</option>';
                  }
                  $select .= '</select>';
                  ?>
                  <div class="form-group">
                    <?php echo $select; ?>
                  </div>
                  <div class="form-group">
                    <input type="text" name="gynev" class="form-control" placeholder="Gyakorlat" id="gynev">
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" name="leiras" minlength="10" maxlength="255" placeholder="Leiras..." rows="3"></textarea>
                  </div>

                </form>
                <div class="row justify-content-center">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <button type="submit" class="form-control saveUjGyakorlat">Mentés</button>
                    </div>
                    <div class="uzenet text-center"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>






  <div class="modal fade modal-gy-update" id="exampleModalCenterUpdateGyakorlat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle">Módosítás</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <div class="form-group">
                  <label class="text-white">Gyakorlat</label>
                  <input type="text" class="form-control" name="modify-gynev" id="mgy">
                </div>
                <div class="form-group">
                <label class="text-white">Gyakorlat leírása</label>
                  <textarea class="form-control" name="modify-leiras" id="modify-leiras" minlength="10" maxlength="255" rows="5"></textarea>
                </div>
                <div class="form-group">
                  <input type="hidden" name="gyid" id="gyid">
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-6">
                <div class="form-group">
                  <button class="form-control modifyGyakorlat">Mentés</button>
                </div>
                <div class="msg text-center"></div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>





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
              $sql = "SELECT * FROM felhasznalok WHERE f_id= " . $_SESSION['uid'];
              $res = $con->query($sql);
              if ($res) {
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
                        <div class="name-text text-danger"></div>
                      </div>
                      <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" id="input-email" readonly value="<?php echo $row["email"]; ?>" class="form-control">
                        <div class="email-text text-danger"></div>
                      </div>
                      <div class="form-group">
                        <label>Felhasználónév</label>
                        <input type="text" id="input-fname" readonly value="<?php echo $row["fname"]; ?>" class="form-control">
                        <div class="fname-text text-danger"></div>
                      </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12">
                      <div class="form-group">
                        <label>Jelszó</label>
                        <input type="password" id="input-pw" readonly value="<?php echo $row["jelszo"]; ?>" class="form-control">
                        <div class="pw-text text-danger"></div>
                      </div>
                      <div class="form-group">
                        <label>Testsúly</label>
                        <input type="text" id="input-tsuly" readonly value="<?php echo $row["tsuly"]; ?>" class="form-control">
                        <div class="tsuly-text text-danger"></div>
                      </div>
                      <div class="form-group">
                        <label>Testmagasság</label>
                        <input type="text" id="input-tmagassag" readonly value="<?php echo $row["tmagassag"]; ?>" class="form-control">
                        <div class="tmagassag-text text-danger"></div>
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
          <a class="nav-link" href="edzes.php">Edzéseim</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gyakorlat.php">Gyakorlatok</a>
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
  $select = '<select class="custom-select izom"><option class="izomcs">Izomcsoportok</option>';
  while ($row = $res->fetch_array()) {
    $select .= '<option class="izomcs" id=' . $row[0] . '>' . $row[1] . '</option>';
  }
  $select .= '</select>';



  ?>

  <section class="gyakorlat">
    <div class="container">
      <h4>Válassz izomcsoportot!</h4>
      <div class="row">
        <div class="col-lg-3">
          <?php echo $select; ?>
        </div>
        <div class="col-lg-9 ">
          <button id="gyakorlat" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">Új Gyakorlat</button>
        </div>
      </div>
      <div class="row gyakorlat-leiras">

      </div>
    </div>
  </section>



</body>

</html>