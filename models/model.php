<?php

class Paginas {

	function enlacesPaginasModel($enlaces) {
		if (
				$enlaces == "ingresar" or
				$enlaces == "usuarios" or
				$enlaces == "editar" or
				$enlaces == "salir" or
				$enlaces == "registroNino" or
				$enlaces == "fiichaMedica" or
				$enlaces == "registroDocente" or
				$enlaces == "registroFamiliar" or
				$enlaces == "credenciales" or
				$enlaces == "login" or
				$enlaces == "cerrar_session" or
				$enlaces == "activar"
		) {
			$module = "vistas/modulos/" . $enlaces . ".php";
		} elseif ($enlaces == "index") {
			$module = "vistas/modulos/inicio.php";
		} elseif ($enlaces == "registroAlumno") {
			$module = "vistas/modulos/registroNino.php";
		} elseif ($enlaces == "okNino") {
			$module = "vistas/modulos/fiichaMedica.php";
		} elseif ($enlaces == "registroFamiliar") {
			$module = "vistas/modulos/registroFamiliar.php";
		}
		/* elseif ($enlaces == "cambio") {
		  $module = "vistas/modulos/usuarios.php";
		  } else {
		  $module  = "vistas/modulos/registro.php";
		  } */ elseif ($enlaces == "crearCredencial") {
			$module = "vistas/modulos/auth/credenciales.php";
		} elseif ($enlaces == "crearSesion") {
			$module = "vistas/modulos/auth/login.php";
		} elseif ($enlaces == "crearSesion") {
			$module = "vistas/modulos/auth/cerrar_session.php";
		} elseif ($enlaces == "activo") {
			$module = "vistas/modulos/auth/activar.php";
		}

		return $module;
	}
	
	function enlacesPaginasModelFree($enlaces) {
		if (
				$enlaces == "credenciales" or
				$enlaces == "login" or
				$enlaces == "cerrar_session" or
				$enlaces == "activar"
		) {
			$module = "vistas/modulos/" . $enlaces . ".php";
		} elseif ($enlaces == "index") {
			$module = "vistas/modulos/inicio.php";
		}  elseif ($enlaces == "crearCredencial") {
			$module = "vistas/modulos/auth/credenciales.php";
		} elseif ($enlaces == "crearSesion") {
			$module = "vistas/modulos/auth/login.php";
		} elseif ($enlaces == "crearSesion") {
			$module = "vistas/modulos/auth/cerrar_session.php";
		} elseif ($enlaces == "activo") {
			$module = "vistas/modulos/auth/activar.php";
		}

		return $module;
	}

}

?>