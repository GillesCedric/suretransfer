<?php require_once("../../../config.php");
/*session_start();

require_once(CONTROLLERS_PATH . '/client/clientcommandes.php');
ClientCommandes::verifConnection();
$commandes = new ClientCommandes($_SESSION['client']);
$vehicules = $commandes->getVehicule();
$chauffeurs = $commandes->getChaufffeur();
$stations = $commandes->getStation();
$station = '';
if ($stations !== false) {
    $station = $stations->fetch();
}
$annexe = $commandes->getStationAnnexe();
if (isset($_POST['submit'])) {
    $commandes->insert($_POST['mode'], intval($_POST['montant']), $_POST['vehicule'], $_POST['chauffeur'], '21452565415', $_POST['annexe'], $_POST['service']);
}*/
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= APP_NAME ?></title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body style="background-color:gray;height:100%;padding-top:15px;">
    <div class="container" style="background-color:white; width:70%;border-radius:10px; height:96vh;">


        <form class="form" style="padding-top:15px;" method='POST' action="">
            <p class="" style="margin:40px;font-size:18px;">Ajout d'un <span class="text-primary">pompiste</span>.</p>
            <div class="text-right text-xs" style="margin-bottom:20px;"><a href="tables.php" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm "><button class="btn btn-primary" type="button">Retournez à l'acceuil <i class="fas fa-arrow-left" style="margin-left:2px;"></i></button></a></div>
            <div class="form-group">
                <label for="ville" class="">Noms</label>
                <input type="text" id="ville" class="form-control" style="margin-right:20px;transition:.3s;" name="ville">
            </div><br>
            <div class="form-group">
                <label for="quartier" class="">Prénoms</label>
                <input type="text" id="quartier" class="form-control" style="margin-right:20px;transition:.3s;" name="quartier">
            </div><br>
            <div class="form-group">
                <label for="ville" class="">N°Tel</label>
                <input type="number" id="tel" class="form-control" style="margin-right:20px;transition:.3s;" name="tel">
            </div><br>
            <div class="form-group">
                <label for="mail" class="">Email</label>
                <input type="text" id="mail" class="form-control" style="margin-right:20px;transition:.3s;" name="mail">
            </div><br>
            <div class="form-group">
                <label for="mail" class="">N°CNI</label>
                <input type="text" id="mail" class="form-control" style="margin-right:20px;transition:.3s;" name="mail">
            </div><br>
            <div class="form-group">
                <button type="button" class="btn btn-primary" style="width:100%">Valider</button>
            </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>