<?php require("../../config.php");?>
<!DOCTYPE html>
<html>
<head>
	<title><?= APP_NAME?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../file/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<img class="wave" src="../../file/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="../../file/img/bg.svg">
		</div>
		<div class="login-content">
			<form action="index.html">
				<img src="../../imageindex/suretransfer.jpg" style="border-radius:50%; width:100px; height:100px; margin-top:8px;"  alt="..." >
                <h3 class="title">Bienvenue</h3>
                <div class="input-di">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="di">
                              <h5 style="font-size:18px;">Compte client</h5>
                              <div class="di" style="margin-top:20px;margin-bottom:20px;color:#555;">
                            <input type="radio" id="l" name="statut" value="l" class="radio"><label for="l" style="margin-left:5px;">Entreprise</label>
                            <input type="radio" id="m" name="statut" value="m" class="radio"style="margin-left:70px;"><label for="m" style="margin-left:5px;">Particulier</label>
                              </div>
           		   </div>
           		</div>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>N° CNI</h5>
           		   		<input type="text" class="input">
           		   </div>
           		</div>
                <div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Noms</h5>
           		   		<input type="text" class="input">
           		   </div>
           		</div>
                <div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Prénoms</h5>
           		   		<input type="text" class="input" >
           		   </div>
           		</div>
                   <div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Tel</h5>
           		   		<input type="number" class="input">
           		   </div>
           		</div>
                <div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Mail</h5>
           		   		<input type="text" class="input">
           		   </div>
           		</div>
           		<div class="input-div one">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Nom d'utilisateur</h5>
           		    	<input type="text" class="input">
            	   </div>
				</div>
                   <div class="input-div pass">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Mot de passe</h5>
           		   		<input type="password" class="input">
           		   </div>
                   </div>
                   <div class="input-div pass">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Confirmer le mot de passe</h5>
           		   		<input type="password" class="input">
           		   </div>
                   </div>
            	<input type="submit" class="btn" value="Login">
            </form>
            
        </div>
    </div>
    <script type="text/javascript" src="../../file/js/main.js"></script>
</body>
</html>