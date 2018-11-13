<!DOCTYPE html>
<html>
	<head>
		<!--	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" crossorigin="anonymous">-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<!-- responsive -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Principal</title>	
	</head>
	<body class="fondo">
		<div class="container">
			<?php include "modulos/navbar.php"; ?>
			<section>
				<?php
				require_once("controllers/controller.php");
				$mvc = new MVCController();
				$mvc->enlacesPaginasController();
				?>
			</section>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="vistas/bootstrap/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		
		<script src="vistas/bootstrap/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>