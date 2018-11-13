<?php
include "models/connection.php";

if (isset($_GET["id"])) {
	$idUsuario = $_GET['id'];
	$token = 0;

	$mensaje = validaIdToken($idUsuario, $token);
}
?>


<div class="container">
	<div class="jumbotron">

		<h1><?php echo $mensaje; ?></h1>
		<br />
		<p><a class="btn btn-primary btn-lg" href="index.php" role="button">pagina principal</a></p>
	</div>
</div>

