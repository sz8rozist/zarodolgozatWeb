<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="img/dumbell.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <title>Build Your Body</title>
</head>
<body>


<!-- Nav -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
  <span class="navbar-brand" href="#"><img src="img/logo2.png">Build Your Body</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link active" id="kezdolap" href="index.php">Kezdőlap</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="" data-toggle="modal" data-target="#exampleModalCenter" >Belépés</a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" id="reg"  href="#">Regisztráció</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="rolunk" href="#">Rólunk</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="eletmod" href="#">Életmód</a>
      </li>
      



      </ul>
  </div>
  </div>
</nav>
<!-- Nav -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Bejelentkezés</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="index.php" method="post" class="login-form">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <img src="img/key.png" alt="" class="src">
                <div class="form-group inputWithIcon">
                  <input type="text" name="user" id="username" placeholder = "Felhasználónév" class="form-control">
                  <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
                </div>
                <div class="form-group inputWithIcon">
                  <input type="password" name="pw" placeholder="Jelszó" id="password" class="form-control">
                  <i class="fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="submit" class="btn login btn-primary btn-lg">Bejelentkezés</button>
</div>
    </div>
  </div>
</div>

<!-- slider -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="6000">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block h-100 w-100" src="img/slider1.jpg" alt="First slide">
      <div class="carousel-caption">
        <h1 class="slower animated bounceInLeft">Build Your Body</h1>
        <h6 class="slower animated bounceInRight">Üdvözöllek a weboldalon</h6>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block h-100 w-100" src="img/slider3.jpg" alt="Second slide">
      <div class="carousel-caption">
        <h2 class="slower animated bounceInLeft">Eddz keményebben, mint legutóbb</h2>
        <h5 class="slower animated bounceInRight">és fittebb leszel, mint voltál.</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block h-100 w-100" src="img/slider2.jpg" alt="Third slide">
      <div class="carousel-caption">
      <h2 class="slower animated bounceInLeft">Bármire képes vagy</h2>
        <h5 class="slower animated bounceInRight">ha elszánod magad.</h5>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- slider -->
    <section class="tartalom-app">
      <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h6>Build Your Body</h6>
                        <h2>Miért válaszd az alkalmazást?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <div class="col-12 col-lg-8 col-sm-12">
                            <p id="tartalom-text">Teljesen kezdő vagy? Ismeretlen számodra ez a sport vagy életmód? Ha mindkét kérdésre igen a válaszod akkor a legjobb helyen jársz. Véget vetünk a papíron vezetett étrendeknek, edzésterveknek. Tárolj mindent online! Könnyedén mentheted az étkezéseid így nyomon követve azokat egyszerűbbé válik a diéta vagy a tömegnövelés időszaka. Előre megterveznél egy edzést? Ez sem akadály, a felületünkön ezt könnyedén megtudod tenni. Regisztrálj és élvezd az online életmódvezetés világát.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                  <div class="man">
                    <img src="img/man.png">
                  </div>
                </div>
            </div>
      </div>
    </section>
    <section class="join">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h1>Te döntöd el mit érzel holnap, izomlázat vagy bűntudatot.</h1>
          </div>
        </div>
      </div>
    </section>


    <section class="kiegeszito">
      <div class="container">
           <div class="row justify-content-center">
             <div class="col-12 pb-70 col-lg-12 col-md-10">
               <div class="text-center">
                 <h1>Ha sikereket akarsz elérni ennek a három feltételnek teljesülnie kell.</h1>
               </div>
             </div>
           </div>
           <div class="row">
             <div class="col-12 col-lg-4 col-md-12">
               <div class="single-offer">
                 <img class="img-fluid" src="img/gym.png">
                 <h4>Edzés</h4>
                 <p> Az edzés lényege alapjában véve az izmok maximális leterhelése, melynek során az izomban lévő glikogén raktárak kiürülnek.</p>
               </div>
             </div>
             <div class="col-12 col-lg-4 col-md-12">
               <div class="single-offer">
                 <img class="img-fluid" src="img/diet.png">
                 <h4>Táplálkozás</h4>
                 <p>Nehéz fizika edzést végző embereknél elengedhetetlen a megfelelő minőségű és mennyiségű táplálék bevitele a szervezet számára.</p>
               </div>
             </div>
             <div class="col-12 col-lg-4 col-md-12">
               <div class="single-offer">
                 <img class="img-fluid" src="img/relax.png">
                 <h4>Regeneráció</h4>
                 <p>Sokan úgy gondolják, és egyben helytelenül, hogy az izom edzés közben növekszik.  Az izom a regeneráció azaz a pihenés során növekszik.</p>
               </div>
             </div>
           </div>
      </div>
    </section>


    <section class="registration">
      <div class="container">
      <div class="row">
      <div class="col-lg-6">
                <div class="text-center">
                 <h1>Csatlakozz hozzánk</h1>
                 <button class="btn-reg">Regisztrálok</button>
               </div>
          </div>
        <div class="col-lg-6">
            <form class="px-4 py-3 regform">
                <div class="form-group">
                <label>Teljes név</label>
                <input type="text" class="form-control reg-input" name="name">
              </div>
              <div class="form-group">
                <label>E-mail</label>
                <input type="text"  class="form-control reg-input" name="email">
              </div>
              <div class="form-group">
                <label>Felhasználónév</label>
                <input type="text"  class="form-control reg-input" name="fname">
              </div>
              <div class="form-group">
                <label>Jelszó</label>
                <input type="password"  class="form-control reg-input" name="pw">
              </div>
              <div class="form-group">
                <label>Testsúly</label>
                <input type="text"  class="form-control reg-input" name="tsuly">
              </div>
              <div class="form-group">
                <label>Testmagasság</label>
                <input type="text"  class="form-control reg-input" name="tmagassag">
              </div>
              <div class="reg-message"></div>
            </form>
            
        </div>

      </div>
    </section>



<!-- Footer -->
<footer class="page-footer font-small pt-4">


  <div class="container">

    <ul class="list-unstyled list-inline text-center">
      <li class="list-inline-item">
        <a class="mx-1">
          <button type="button" class="btn btn-social-icon btn-instagram btn-rounded"><i class="fa fa-instagram"></i></button>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="mx-1">
        <button type="button" class="btn btn-social-icon btn-facebook btn-rounded"><i class="fa fa-facebook"></i></button>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="mx-1">
        <button type="button" class="btn btn-social-icon btn-github btn-rounded"><i class="fa fa-github"></i></button>
        </a>
      </li>
    </ul>


  </div>


  <div class="footer-copyright text-center text-white py-3">
    <p>© 2020 Copyright: Rózsa István</p>
  </div>


</footer>
<!-- Footer -->
<div class="scrolltop  btn-info">
                <span><a href=""><i class="fa fa-arrow-up arrow"></i></a></span>
        </div>
<script src="js/main.js"></script>
</body>
</html>
