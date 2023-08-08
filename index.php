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
    <link rel="shortcut icon" href="img/logo_madalodge.png">
    <title>Madalodge</title>
    <script src="js/jquery.min.js" defer></script>
    <script src="js/bootstrap.bundle.min.js" defer></script>
    <script scr="js/bootstrap.js" defer></script>
</head>
<body class="container-fluid">
    <header class="container-fluid">
      <img src="img/logo_madalodge.png" alt="Madalodge Logo" class="col-3">
      <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content container">
            <div class="modal-header">
              <img src="img/logo_madalodge.png" alt="logo">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="treatment/authentication.php" id="auth">
                <input type="email" name="user-email" id="user-email" size="40" placeholder="E-mail" required="required">
                <input type="password" name="user-mdp" id="user-mdp" placeholder="Mot de passe" size="40" required="required"/>
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
              <form method="post" action="treatment/inscription.php" id="auth">
                  <input type="text" name="user-name" id="user-name" size="40" placeholder="Votre Pseudo ici" required="required">
                  <input type="text" name="user-firstname" id="user-firstname" size="40" placeholder="Votre prénom ici" required="required">
                  <input type="text" name="user-lastname" id="user-lastname" size="40" placeholder="Votre Nom ici" required="required">
                  <select name="gender" id="gender">
                    <option value="M">Homme</option>
                    <option value="F">Femme</option>
                  </select>
                  <label for="birthdate">Date de naissance :</label><input type="date" name="birthdate" id="birthdate">
                  <input type="text" name="cin" id="cin" size="40" placeholder="Votre numéro CIN ici" required="required">
                  <input type="email" name="user-email" id="user-email" size="40" placeholder="Entrer votre e-mail" required="required">
                  <input type="text" name="society-name" id="society-name" size="40" placeholder="Vous travailler dans quelle société ?">
                  <input type="text" name="user-phone" id="user-phone" size="40" placeholder="Votre Numéro de téléphone" required="required">
                  <input type="text" name="user-phone2" id="user-phone2" size="40" placeholder="Second Numéro de téléphone">
                  <input type="password" name="user-mdp" id="user-mdp" placeholder="Mot de passe" size="40" required="required"/>
                  <input type="submit" value="S'inscrire" id="loginBt,">
                </form>
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
      <div id="carouselExampleCaptions" class="carousel slide container col-4" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/hotels/luxury-pool-villa-spectacular-contemporary-design-digital-art-real-estate-home-house-property-ge.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Madalodge Antananarivo</h5>
              <p></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/hotels/istockphoto-104731717-612x612.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Madalodge Toamasina</h5>
              <p></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/hotels/Bellagio-Hotel-Casino-Las-Vegas.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Madalodge Antsirabe</h5>
              <p></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/hotels/azalai-grand-hotel-pool_standard.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Madaloldge Toliary</h5>
              <p></p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>   
    </section>
    <?php $hotel -> closeCursor(); ?>
</body>
</html>
