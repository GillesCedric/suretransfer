<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= APP_NAME ?></title>

  <!-- Personalized CSS -->
  <link type="text/css" rel="stylesheet" href="file/css/style-menu.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="file/css/bootstrap.min.css">

  <!-- Personalized JavaScript -->
  <script src="file/js/script.js"></script>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="file/js/bootstrap.min.js"></script>
</head>

<body>
  <?php require_once('./section/nav.php'); ?>
  <div id="main">
    <div class="text-center" style="margin-top:30px;">
      <img src="imageindex/suretransfer.jpg" style="border-radius:50%;" alt="..." width="150px" height="150px">
      <h1 style="font-size:45px;font-weight:bold;">Sure Transfer</h1>
    </div>

    <div class="container my-4">
      <div id="bouge" class="carousel slide z-depth-1-half" data-ride="carousel">
        <ul class="carousel-indicators">
          <li data-target="#bouge" data-slide-to="0" class="active"></li>
          <li data-target="#bouge" data-slide-to="1"></li>
          <li data-target="#bouge" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(45).jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(46).jpg" alt="Second slide">

          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(47).jpg" alt="Third slide">

          </div>
        </div>
        <a class="carousel-control-prev" href="#bouge" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#bouge" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <p class="text-center" style="letter-spacing:2px;font-size:30px;">Accédez à l'application en tant que</p>
    <!-- <div class="text-center">
    <div class="btn-group">
  <button class="btn btn-light btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
  style="cursor:pointer;margin-left:-2%;width:180px;">
    Client
  </button>
  <div class="dropdown-menu">
    <div><a>Entreprise</a></div>
    <div><a>particulier</a></div>
  </div>
</div>
  <div class="">
  </div>
            <a class="btn btn-info" role="button" style="cursor:pointer;color:white;"><span><i class="fas fa-laptop-house"></i></span>Station</a>
            <a class="btn btn-dark" role="button" style="cursor:pointer;color:white;"><span><i class="fas fa-laptop-house"></i></span>Pompiste</a>
    </div>-->
    <div class="text-center">
      <div class="row">
        <div class="col-md-4" id="block2">
          <a href="client/connexion.php"> <button class="btn btn-info" style="cursor:pointer;color:white;width:180px;margin-top:20px;font-size:25px;font-family:;"><span class="fas fa-user-tie" style="margin-right:15px;"></span>Client</button></a>
        </div>
        <div class="col-md-4" id="block3">
          <a href="station/annexe/connexion.php"> <button class="btn btn-info" style="cursor:pointer;color:white;width:180px;margin-top:20px;font-size:25px;font-family:;"><span class="fas fa-gas-pump" style="margin-right:15px;margin-left:-30px;"></span>Station</button></a>
        </div>
        <div class="col-md-4" id="block4">
          <a href="station/pompiste/connexion.php"> <button class="btn btn-info" style="cursor:pointer;color:white;width:180px;margin-top:20px;font-size:25px;font-family:;"><span class="fas fa-hard-hat" style="margin-right:15px;"></span>Pompiste</button></a>
        </div>
      </div>
    </div>
    <h1 class="text-center" style="margin-top:30px;font-size:30px">Nos services</h1>
    <div class="row">
      <div class="card col-md-4" style="margin-left:25px;">
        <img class="img-responsive center-block text-center rounded-circle" src="imageindex/vague1.jpg" alt="Card image" style="width: 150px; height:150px;margin: 0 auto;margin-top:10px;">
        <div class="card-body">
          <h4 class="card-title text-center">Espace Client</h4>
          <p class="card-text text-justify">Vous avez une société et désirez l'intégrer dans <span>sure transfer</span> ou encore
            vous ètes un particulier et désirez integrer la communauté de<span>sure transfer</span> cliquez sur ce bouton</p>
          <div class="text-center"><a href="client/entreprise/inscription.php" class="btn btn-primary center-block text-center">Créer un compte Client</a></div>
        </div>

      </div>
      <div class="card col-md-3" style="margin-left:20px;">
        <img class="img-responsive center-block text-center rounded-circle" src="imageindex/vague1.jpg" alt="Card image" style="width: 150px; height:150px;margin: 0 auto;margin-top:10px;">
        <div class="card-body">
          <h4 class="card-title text-center">A propos</h4>
          <p class="card-text text-justify">La communauté <span>Sure transfer</span> regroupe des entreprises, des particuliers et des stations services.
            L'application sert donc d'interface entre les utilisateurs et les stations services dans le cadre du paiement de la consommation d'essence ou de
            carburant. </p>
          <div class="text-center"><a href="#" class="btn btn-primary">En savoir plus</a></div>
        </div>
      </div>
      <div class="card col-md-4" style="margin-left:20px;">
        <img class="img-responsive center-block text-center rounded-circle" src="imageindex/vague1.jpg" alt="Card image" style="width: 150px; height:150px;margin: 0 auto;margin-top:10px;">
        <div class="card-body">
          <h4 class="card-title text-center">Espace Station</h4>
          <p class="card-text text-justify">Vous avez une station et désirez la faire intégrer dans la communauté de <span>Sure Transfer</span>
            Pour plus de sécurité vous devez nous contacter afin d'établir votre profil.</p>
          <div class="text-center"><a href="#" class="btn btn-primary">Nous contacter</a></div>
        </div>
      </div>
    </div>
  </div>
  <!--/.Carousel Wrapper-->
  <!--<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
	</div>-->
  <?php include('./section/footer.php'); ?>
</body>

</html>