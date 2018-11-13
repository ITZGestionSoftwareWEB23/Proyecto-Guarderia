<?php

include "models/model.php";
include "models/crud.php";

class MVCController{
	#Enlaces
	public function enlacesPaginasController(){
		if (isset($_GET["action"])) {
			$enlaces = $_GET["action"];

		}else{
			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);
		include $respuesta;
	}
	public function enlacesPaginasControllerFree(){
		if (isset($_GET["action"])) {
			$enlaces = $_GET["action"];

		}else{
			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModelFree($enlaces);
		include $respuesta;
	}


	#Llamada a la Plantilla

	public function getTemplate(){
		include "vistas/template.php";
	}
	
	public function getTemplateFree(){
		include "vistas/templateFree.php";
	}

	#Registro Nino
	#--------------------------------------------------------#

	public function registroNinoController(){
		if (isset($_POST["registradoNino"])) {
			$datosController = array("nombre"=>$_POST["nombre"],
									 "paterno"=>$_POST["paterno"],
									 "materno"=>$_POST["materno"],
									 "fecha"=>$_POST["fecha"],
									 "genero"=>$_POST["genero"],
									 "direcion"=>$_POST["direcion"],
									 "nacionalidad"=>$_POST["nacionalidad"]);

			$respuesta = Datos::registrarNinoModel($datosController,"persona");
			if ($respuesta == "OK") {			
				header("location:index.php?action=okNino&key=".$_GET["cve"]);
			} else {
				header("location:index.php");
			}
			//return $respuesta;	
		}
		
	}





	#regiustro usuariios
	#----------------------------------------------------------------------------------------------------------------------------#
	/*public function registroUsuarioController(){
		if (isset($_POST["nombreRegistro"])) {
			$datosController = array("nombre"=>$_POST["nombreRegistro"], 
										"paterno"=>$_POST["paternoRegistro"],
										"materno"=>$_POST["maternoRegistro"],
										"domicilio"=>$_POST["domicilioRegistro"],
										"telefono"=>$_POST["telefonoRegistro"],
										"id"=>$_GET["id"]);

			$respuesta = Datos::registrarPersonalesUsuarioModel($datosController,"persona");

			if ($respuesta == "OK") {
				header("location:index.php?action=fin");
			}else{
				header("location:index.php");
			}
		}
	}

	#Ingreso de USUARIO
	#----------------------------------------------------------------------------------------------------------------------------#
	public function ingresoUsuarioController(){
		if (isset($_POST["usuarioIngresar"])) {
			$datosController = array("usuario"=>$_POST["usuarioIngresar"], 
										"password"=>$_POST["passwordIngresar"],
										"email"=>$_POST["emailIngresar"]);
			$respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios");

			if ($respuesta["usuario"] == $_POST["usuarioIngresar"] && 
				$respuesta["password"] == $_POST["passwordIngresar"]
			) {
				session_start();

				$_SESSION["validar"] = true;
				header("location:index.php?action=usuarios");
			}else{
				header("location:index.php?action=fallo");
			}
		}
	}

	#Vista de USUARIO
	#----------------------------------------------------------------------------------------------------------------------------#
	public function vistaUsuarioController(){
		$respuesta = Datos::vistaUsuarioModel("usuarios");
		foreach ($respuesta as $row => $item) {
			echo "<tr> 
					<td>".$item["usuario"]."</td> 
					<td>".$item["password"]."</td> 
					<td>".$item["email"]."</td>
					<td><a href = 'index.php?action=editar&id=".$item["id"]."'><button>Editar</button></a></td>
					<td><a href = 'index.php?action=usuarios&idBorrar=".$item["id"]."'><button>Borrar</button></a></td>
				</tr>";
		}
	}
	#Editar de USUARIO 1
	#----------------------------------------------------------------------------------------------------------------------------#
	public function editarUsuarioController(){
		$datosController = $_GET["id"];
		$respuesta = Datos::editarUsuarioModel($datosController,"usuarios");

		echo '<input type="number" value="'.$respuesta["id"].'" name="idEditar">
			<input type="text" value="'.$respuesta["usuario"].'" name="usuarioEditar" required>
			<input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>
			<input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>
			<input type="submit" value="Actualizar" name="usuarioEdicion">

		';

	}
	#Actualizar de USUARIO 2
	#----------------------------------------------------------------------------------------------------------------------------#
	public function actualizarUsuarioController(){
		if (isset($_POST["usuarioEdicion"])) {
			$datosController = array("id"=>$_POST["idEditar"], 
										"usuario"=>$_POST["usuarioEditar"],
										"password"=>$_POST["passwordEditar"],
										"email"=>$_POST["emailEditar"]);

			$respuesta = Datos::actualizarUsuarioModel($datosController,"usuarios");

			if ($respuesta == "OK") {
				header("location:index.php?action=cambio");
			} else {
				echo "error";
			}

		}
	}
	#Eliminar de USUARIO 
	#----------------------------------------------------------------------------------------------------------------------------#
	public function borrarUsuarioController(){
		if (isset($_GET["idBorrar"])) {
			$datosController = $_GET["idBorrar"];
			$respuesta = Datos::borrarUsuarioModel($datosController,"usuarios");

			if ($respuesta == "OK") {
				header("location:index.php?action=usuario");
			}
		}
	}*/


}


?>