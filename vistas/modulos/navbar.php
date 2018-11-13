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

	<a class="navbar-brand" href="index.php">Inicio</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
				   aria-expanded="false">
					<ion-icon name="add"></ion-icon>
					Registros
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="index.php?action=registroN">Alumnos</a>
					<a class="dropdown-item" href="index.php?action=registroFamiliar">Padres o Tutor</a>
					<a class="dropdown-item" href="index.php?action=registroDocente">Maestros</a>
					<a class="dropdown-item" href="#">Incidencias</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
				   aria-expanded="false">
					<ion-icon  name = "search" ></ion-icon>
					Consultas
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Alumnos</a>
					<a class="dropdown-item" href="#">Padres o Tutor</a>
					<a class="dropdown-item" href="#">Maestros</a>
					<a class="dropdown-item" href="#">Incidencias</a>

				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
				   aria-expanded="false">
					<ion-icon  name = "trash" ></ion-icon >
					Eliminacion
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Alumnos</a>
					<a class="dropdown-item" href="#">Padres o Tutor</a>
					<a class="dropdown-item" href="#">Maestros</a>
					<a class="dropdown-item" href="#">Incidencias</a>
				</div>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
			<?php
//			if (isset($_SESSION["id_usuario"])) {
//				echo '<label><span class="">' . utf8_decode($row["nombre"]) . '</span></label>';
//				echo "";
//			} else {
//				
//			}
			?>

			<a class="btn btn-outline-warning my-2 my-sm-0" href="index.php?action=crearCredencial" id="" name="">Registrarse</a>

			<a class="btn btn-outline-success my-2 my-sm-0" href="index.php?action=crearSesion" id="" name="">Ingresar</a>

		</form>
	</div>
</nav>