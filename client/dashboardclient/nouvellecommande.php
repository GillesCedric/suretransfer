<?php
session_start();
require_once("../../config.php");
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
}
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
            <p class="" style="margin:40px;font-size:18px;">Passer une <span class="text-primary">commande</span>.</p>
            <div class="text-right text-xs" style="margin-bottom:20px;"><a href="tables.php" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm "><button class="btn btn-primary" type="button">Retournez à l'acceuil <i class="fas fa-arrow-left" style="margin-left:2px;"></i></button></a></div>
            <div class="form-group">
                <label for="modepaiement" class="">Choisissez le mode de paiement</label>
                <select class="form-control" id="modepaiement" name="mode">
                    <option id="OM" value="Orange Money">Orange Money</option>
                    <option id="MOMO" value="MTN Mobile Money">MTN Mobile Money</option>
                    <option id="CB" value="Virement Bancaire">Virement Bancaire</option>
                </select>
            </div><br>
            <div class="form-group">
                <label for="montant" class="">Montant</label>
                <input type="text" id="montant" class="form-control" style="margin-right:20px;transition:.3s;" name="montant">
            </div><br>
            <div class="form-group">
                <label for="immat" class="">Choisissez le véhicule</label>
                <select class="form-control text-uppercase" id="immat" name="vehicule">
                    <?php
                    if ($vehicules !== false) :
                        while ($val = $vehicules->fetch()) : ?>
                            <option value="<?= $val['immat'] ?>">
                                <?= $val['marque'] . ' ' . $val['modele'] . ' ' . $val['immat'] ?>
                            </option>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <option value="">
                            Aucun Véhicule pour l'instant
                        </option>
                    <?php endif; ?>
                </select>
            </div><br>
            <div class="form-group">
                <label for="immat" class="">Choisissez le chauffeur</label>
                <select class="form-control" id="immat" name="chauffeur">
                    <?php
                    if ($chauffeurs !== false) :
                        while ($val = $chauffeurs->fetch()) : ?>
                            <option value="<?= $val['num_cni'] ?>">
                                <?= $val['nom'] . ' ' . $val['prenom'] ?>
                            </option>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <option value="">
                            Aucun Chauffeur pour l'instant
                        </option>
                    <?php endif; ?>
                </select>
            </div><br>
            <div class="form-group">
                <label for="immat" class="">Choisissez le type de service</label>
                <select class="form-control" id="service" name="service">
                    <option value="Super">
                        Super
                    </option>
                    <option value="Gasoil">
                        Gasoil
                    </option>
                </select>
            </div><br>
            <div class="form-group">
                <label for="immat" class="">Choisissez la station</label>
                <select class="form-control" id="immat" name="annexe">
                    <?php
                    //echo ('<script type="text/javascript">alert("test");</script>');
                    if ($annexe !== false) :
                        while ($val = $annexe->fetch()) : ?>
                            <option value="<?= $val['id'] ?>">
                                <?= $station['nom'] . ' ' . $val['quartier'] . ' (' . $val['ville'] . ')' ?>
                            </option>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <option value="">
                            Aucune Station pour l'instant
                        </option>
                    <?php endif; ?>
                </select>
            </div> <br>

            <div class="form-group">
                <button type="button" class="btn btn-primary" style="width:100%" data-target="#valider" data-toggle="modal" onclick="setMode()">Valider</button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="valider" tabindex="-1" role="dialog" aria-labelledby="validerlabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 style="margin-left:15%;">Confirmez votre paiement</h3>
                        </div>
                        <div class="modal-header">
                            <h5 class="modal-title" id="validerlabel">Paiement via <span id="paiement" class="font-weight-bold">texte</span></h5>
                        </div>
                        <div class="modal-body">
                            <label for="numéro">numéro: <span id="numero" class="text-success">texte</span></label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary" name="submit">Confirmer</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        function setMode() {
            var mode = document.getElementById('modepaiement').value;
            switch (mode) {
                case "Virement Bancaire":
                    document.getElementById('paiement').innerHTML = 'VIREMENT BANCAIRE';
                    document.getElementById('numero').innerHTML = '690909090';
                    break;
                case "MTN Mobile Money":
                    document.getElementById('paiement').innerHTML = 'MTN MOBILE MONEY';
                    document.getElementById('numero').innerHTML = '+237670909090';
                    break;

                case "Orange Money":
                    document.getElementById('paiement').innerHTML = 'ORANGE MONEY';
                    document.getElementById('numero').innerHTML = '+237690909090';
                    break;
            }
        }
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>