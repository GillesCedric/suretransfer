<?php
require_once("../../config.php");
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
	<link rel="stylesheet" type="text/css" href="../../file/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<?php include(GLOBAL_PATH . "/pages/connection.php"); ?>
	<script type="text/javascript" src="../../file/js/main.js"></script>
</body>

</html>