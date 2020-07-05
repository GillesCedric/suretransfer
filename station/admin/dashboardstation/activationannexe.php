<?php
session_start();
require_once("../../../config.php");
require_once(CONTROLLERS_PATH . '/station/admin/admincommandes.php');
require_once(CLASS_PATH . '/app.php');
require_once(CLASS_PATH . '/mail.php');
$commandes = new StationAdminCommandes($_SESSION['station']);
$numCommande = htmlspecialchars($_GET['n']);
StationAdminCommandes::updatestatut($numCommande, 1);
App::redirect('tables.php');
