<?php
session_start();
require_once("../config.php");
require_once(CONTROLLERS_PATH . "/client/clientconnection.php");
require_once(CLASS_PATH . "/app.php");
if (isset($_POST['submit'])) {
	$client = new ClientConnection($_POST['login'], $_POST['password']);
}
?>
<!DOCTYPE html>
<html>

<head>
	<title><?= APP_NAME ?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../file/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<img class="wave" src="../file/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="../file/img/bg.svg">
		</div>
		<div class="login-content">
			<form action="" method="POST">
				<img src="../imageindex/suretransfer.jpg" style="border-radius:50%; width:150px; height:150px;" alt="...">
				<h2 class="title">Bienvenue</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Nom d'utilisateur</h5>
						<input type="text" class="input" name="login">
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Mot de passe</h5>
						<input type="password" class="input" name="password">
					</div>
				</div>
				<a href="inscription.php" style="font-size:17px; margin-top:10px;">Pas encore de compte? Inscrivez-vous ici!</a>
				<input type="submit" class="btn" value="Se connecter" name="submit">
				<a href="#">Mot de passe oublié?</a>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="../file/js/main.js"></script>
</body>

</html>