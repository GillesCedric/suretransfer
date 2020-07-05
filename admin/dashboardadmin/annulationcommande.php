<?php
session_start();
require_once("../../config.php");
require_once(CONTROLLERS_PATH . '/admin/admincommandes.php');
require_once(CLASS_PATH . '/app.php');
require_once(CLASS_PATH . '/mail.php');
$commandes = new AdminCommandes($_SESSION['admin']);
$numCommande = htmlspecialchars($_GET['n']);
AdminCommandes::updatestatut($numCommande, 'rejeté', $_SESSION['admin']);
$mail = new Mail($numCommande);
$mail->sendMailAnnulation();
App::redirect('tables.php');
