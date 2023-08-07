<?php 
  session_start();
  session_destroy();
  include("treatment/connection_db.php");

  // Récupération des liens des hôtels
  include("treatment/show_hotels.php");
  $data_hotel = $hotel -> fetch();
  $hotelA_link = "img/hotels/" . $data_hotel['photo'];
  $data_hotel = $hotel -> fetch();
  $hotelB_link = "img/hotels/" . $data_hotel['photo'];
  $data_hotel = $hotel -> fetch();
  $hotelC_link = "img/hotels/" . $data_hotel['photo'];
  $data_hotel = $hotel -> fetch();
  $hotelD_link = "img/hotels/" . $data_hotel['photo'];
  $data_hotel = $hotel -> fetch();
  $hotelE_link = "img/hotels/" . $data_hotel['photo'];
  $data_hotel = $hotel -> fetch();
  $hotelF_link = "img/hotels/" . $data_hotel['photo'];
  $data_hotel = $hotel -> fetch();
  $hotelG_link = "img/hotels/" . $data_hotel['photo'];
  $data_hotel = $hotel -> fetch();
  $hotelH_link = "img/hotels/" . $data_hotel['photo'];
  $data_hotel = $hotel -> fetch();
  $hotelI_link = "img/hotels/" . $data_hotel['photo'];
  $data_hotel = $hotel -> fetch();
  $hotelJ_link = "img/hotels/" . $data_hotel['photo'];

?>
<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <link rel="stylesheet" href="css/index_style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Madalodge</title>
    <script src="js/jquery.min.js" defer></script>
    <script src="js/bootstrap.bundle.min.js" defer></script>
    <script scr="js/bootstrap.js" defer></script>
</head>
<body>
  <div id="all">
    <header class="container-fluid">
      <img src="img/logo_madalodge.png" alt="Madalodge Logo" class="col-3">
      <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalToggleLabel">Se connecter</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="treatment/authentication.php" id="auth">
                <label for="user-email">Entrer votre e-mail</label>
                <input type="email" name="user-email" id="user-email" placeholder="ex: madalodge.hei@gmail.com" size="40" required="required">
                <label for="user-mdp">Entrer votre mot de passe</label>
                <input type="password" name="user-mdp" id="user-mdp" placeholder="mot de passe" size="40" required="required"/>
                <input type="submit" value="Accéder" id="loginBt,">
              </form>  
              <h3 id="errorMessage"></h3>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">S'inscrire ?</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalToggleLabel2">Inscription</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Hide this modal and show the first with the button below.
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">J'ai déjà un compte</button>
            </div>
          </div>
        </div>
      </div>
      <a class="btn-connect" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Se connecter</a>
    </header>
    <section>
      <h1>JESUS IS THE KING</h1>
      <p>xLorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid enim suscipit, harum cumque, corporis non magnam eligendi illum esse doloremque architecto officiis. Quisquam pariatur dolorum delectus recusandae adipisci deserunt maxime!</p>
      <div id="hotels">
        <div id="carouselExampleDark" class="carousel container col-4 carousel-dark slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?php echo $hotelA_link ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5><?php echo htmlspecialchars($data_hotel['photo']); ?>
              </h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="<?php echo $hotelB_link ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="<?php echo $hotelC_link ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="<?php echo $hotelD_link ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="<?php echo $hotelE_link ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="<?php echo $hotelF_link ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      </div>   
</section>
    <?php $hotel -> closeCursor(); ?>
  </div> 
</body>
</html>
