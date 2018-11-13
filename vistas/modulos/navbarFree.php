<?php
require 'models/connection.php';

require_once("controllers/controller.php");

if (isset($_SESSION["id_usuario"])) {
	header("Location: index.php");
}

$idUsuario = $_SESSION['id_usuario'];

$sql = "SELECT id, nombre FROM usuarios WHERE id = '$idUsuario'";
$result = $mysqli->query($sql);

$row = $result->fetch_assoc();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<ion-icon  name = "home" ></ion-icon>

	<a class="btn btn-outline-dark" href="index.php">Bienvenido</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			
		</ul>
		<form class="form-inline my-2 my-lg-0">

			<a class="btn btn-outline-primary" href="index.php?action=crearCredencial" id="" name="">Registrarse</a>

			<a class="btn btn-outline-success" href="index.php?action=crearSesion" id="" name="">Ingresar</a>

		</form>
	</div>
</nav>