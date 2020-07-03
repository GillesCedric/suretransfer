<?php
session_start();
require_once("../../config.php");
require_once(CONTROLLERS_PATH . '/station/pompiste/pompistecommandes.php');
require_once(CLASS_PATH . '/app.php');
require_once(CLASS_PATH . '/mail.php');
$commandes = new AnnexeCommandes($_SESSION['annexe']);
$numCommande = htmlspecialchars($_GET['n']);
AnnexeCommandes::updatestatutCommande($numCommande, 'rejeté');
$mail = new Mail($numCommande);
$mail->sendMailAnnulation();
App::redirect('tables.php');
