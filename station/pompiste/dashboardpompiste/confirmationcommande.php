<?php
session_start();
require_once("../../../config.php");
require_once(CONTROLLERS_PATH . '/station/pompiste/pompistecommandes.php');
require_once(CLASS_PATH . '/app.php');
require_once(CLASS_PATH . '/mail.php');
$commandes = new PompisteCommandes($_SESSION['pompiste']);
$numCommande = htmlspecialchars($_GET['n']);
PompisteCommandes::updatestatut($numCommande, 'effectué');
$mail = new Mail($numCommande);
$mail->sendMailEffectue();
App::redirect('index.php');
