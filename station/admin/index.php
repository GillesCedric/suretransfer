<?php include("../../config.php") ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= APP_NAME ?></title>

	<!-- Personalized CSS -->
	<link type="text/css" rel="stylesheet" href="../../file/css/style-menu.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../../file/css/bootstrap.min.css">

	<!-- Personalized JavaScript -->
	<script src="../../file/js/script.js"></script>

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="file/js/bootstrap.min.js"></script>
</head>
<body style="margin-top:50px;">
    <?php require(SECTION_PATH .'/nav.php'); ?>
    <span style="font-size:30px;cursor:pointer;" onclick="openNav()">&#9776; open</span>
    <div id="main">
    <div class="panel panel-primary espace60" style="margin-top:30px">
					<div class="panel-heading">Rechercher une transaction</div>
					<div class="panel-body">
						<form method="get" action="" class="form-inline">
						<div class="form-group">						
								<!--<select name="" id="" class="form-control"
									onChange="">
									<option value="0" >Toutes les catégories</option>
									<?php /*while($categories=$resultatf->fetch()){*/ ?>
										<option value="<?php/* echo $categories['id']*/ ?>" 
											<?php /*echo $idc==$categories['id']?"selected":""*/ ?>>
											<?php /*echo $categories['libelle']*/ ?>
										</option>									
									<?php //} ?>
								</select>-->
							
								<input type="text" name="" 
										placeholder="Taper un montant"
										id="" class="form-control" 
										value="<?php /*echo $mc;*/ ?>"/>
								<input type="hidden" name="size"  value="<?php //echo $size ?>">		
								<input type="hidden" name="page"  value="<?php// echo $page ?>">
								<button type="submit" class="btn btn-primary">
									<i class="fas fa-search"></i>
									Chercher
								</button>
								&nbsp&nbsp&nbsp
								<?php //if($_SESSION['utilisateurs']['type']=="Administrateur") {?>
									<a href="#" ><button class="btn btn-primary">Nouvelle commande<i class="fas fa-plus" style="margin-left:2px;"></i></button></a>
								<?php //} ?>	
							</div>
						</form>
					</div>
				</div>
    
    <div class="panel panel-primary" style="margin-top:50px;">
					<div class="panel-heading">
					
					Liste des Transactions (<?php /* echo $nbrPro ?>  enfant<?php if($nbrPro>1){echo's';}*/ ?>) 
					
					</div>
    <div class="panel-body">
        <div class="table-responsive-md">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>NOM</th>
									<th>PRENOM</th>
									<th>MATRICULE</th>
									<th>NOM PARENT</th>
									<th>TEL</th>
									<th>ACTIONS</th>
									 <?php /*if($_SESSION['utilisateurs']['type']=="Administrateur") { ?> 
										
									<?php } */ ?>
								</tr>
							</thead>
							<tbody>
								<?php //while($enfants=$resultat->fetch()){ ?>
									<tr <?php /*
										$getpresence=$connect->prepare("SELECT * FROM presences WHERE id_enfant=?");
										$getpresence->execute(array($enfants['idenfant']));
										$getpresence=$getpresence->fetch();
										if($getpresence['heurearrive']!=null) 
											echo 'class="success"';
										else  
											echo 'class="danger"'; 
									*/ ?>>
										<td><?php /* echo $enfants['idenfant'] */ ?></td>
										<td><?php /* echo $enfants['nomenfant'] */ ?></td>
										<td><?php /* echo $enfants['prenomenfant'] */ ?></td>
										<td><?php /* echo $enfants['matriculeenfant']*/ ?></td>
										<td><?php /* echo $enfants['nomparent'] */ ?></td>
										<td><?php /* echo $enfants['telparent'] */ ?></td>	
										<td>
											&nbsp
												<a title="Marquer l'arrivé" href="marquerpresent.php?ID=<?php /* echo $enfants['idenfant'] */ ?>">
													<?php /*
													if($getpresence['heurearrive']!=null){ 
														echo '<span class="glyphicon glyphicon-remove"></span>';
													}else{  
														echo '<span class="glyphicon glyphicon-ok"></span>'; 
													}*/ ?>
												</a>	
												&nbsp &nbsp
												<a title="Marquer le départ" href="marquerdepart.php?ID=<?php /* echo $enfants['idenfant'] */ ?>">
													<?php /*
													if($getpresence['heurearrive']!=null){
														if($getpresence['heuredepart']!=null){ 
															echo '<span class="glyphicon glyphicon-remove"></span>';
														}else{  
															echo '<span class="glyphicon glyphicon-ok"></span>'; 
														}
													}
													*/ ?>
												</a>											
											
											
										</td>
									</tr>
								<?php // } ?>
							</tbody>
                        </table>
                    </div>
                        <div>																						
								<ul class="nav nav-pills nav-right">
									<li>
										<form class="form-inline">
											<label>Nombre de transactions par Page </label>
											<input type="hidden" name="" 
												value="<?php //echo $idc ?>">
											<input type="hidden" name="motCle" 
												value="<?php //echo $mc ?>">
											<input type="hidden" name="page" 
												value="<?php //echo $page ?>">
											<select name="size" class="form-control"
													onchange="this.form.submit()">
												<option <?php //if($size==10) echo "selected" ?>>10</option>
												<option <?php //if($size==15) echo "selected" ?>>15</option>
												<option <?php //if($size==20) echo "selected" ?>>20</option>
												<option <?php //if($size==25) echo "selected" ?>>25</option>
											</select>
										</form>
									</li>
									<?php //for($i=1;$i<=$nbrPage;$i++){ ?>
										<li class="<?php //if($i==$page) echo 'active' ?>">
											<a href="index.php?page=<?php// echo $i ?>
											&motCle=<?php //echo $mc ?>
											&id_categorie=<?php // echo $idc ?>
											&size=<?php //echo $size ?>">
												Page <?php //echo $i ?>
											</a>
										</li>
									<?php //} ?>	
								</ul>
							
						
                        </div>
                            </div>
    
</body>
</html>