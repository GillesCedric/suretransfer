<?php
include('class/config.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= APP_NAME ?></title>

	<!-- Personalized CSS -->
	<link type="text/css" rel="stylesheet" href="file/css/style.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="file/css/bootstrap.min.css">

	<!-- Personalized JavaScript -->
	<script src="file/js/script.js"></script>

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="file/js/bootstrap.min.js"></script>
</head>

<body>
	<?php include('./section/nav.php'); ?>
	<div id="main">
		<div class="container my-4">

			<div id="carouselExample1" class="carousel slide z-depth-1-half" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(45).jpg" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(46).jpg" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(47).jpg" alt="Third slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExample1" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExample1" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
	<!--/.Carousel Wrapper-->
	<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
	</div>
	<?php include('./section/footer.php'); ?>
</body>

</html>