<?php require_once("../../config.php"); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../file/css/bootstrap.min.css">
    <script src="../../file/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title><?= APP_NAME ?></title>
</head>

<body style="background-color:gray;height:100%;padding-top:15px;">
    <div class="container" style="background-color:white; width:70%;border-radius:10px; height:auto;">


        <form class="form" style="padding-top:15px;">
            <p class="" style="margin:40px;font-size:18px;">Ajout d'un <span class="text-primary">Véhicule</span>.</p>
            <div class="text-right text-xs" style="margin-bottom:20px;"><a href="vehicules.php" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm "><button class="btn btn-primary" type="button">Retournez à l'acceuil <i class="fas fa-arrow-left" style="margin-left:2px;"></i></button></a></div>
            <div class="form-group">
                <label for="nom" class="">Immatriculation</label>
                <input type="text" id="immat" class="form-control" style="margin-right:20px;transition:.3s;"><br>
                <label for="nom" class="">Marque</label>
                <input type="text" id="marque" class="form-control" style="transition:.3s;">
            </div><br>
            <div class="form-group">
                <label for="cni">Modele</label>
                <input type="cni" class="form-control" placeholder="Entrez le modèle de votre voiture" id="modele" style="transition:.3s;">
            </div><br>
            <div class="form-group">
                <label for="tel">Couleur</label>
                <input type="tel" class="form-control" placeholder="Entrez la couleur de votre voiture" id="couleur" style="transition:.3s;">
            </div><br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" style="width:100%">Enregistrer</button>
            </div><br>
        </form>

    </div>
</body>

</html>