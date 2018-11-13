<?php

require_once "conexion.php";


class Datos extends Conexion {

	#Registro Persona y Nino
	public function registrarNinoModel($datosModel, $table){
		$str = Conexion::conectar();

		$st = $str->prepare("INSERT INTO $table(nombre_per,apaterno_per,amaterno_per,fnaci_per,genero_per,direcion_per) VALUES (:nombre,:paterno,:materno,:fecha,:genero,:direcion)");
		$st->bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
		$st->bindParam(":paterno",$datosModel["paterno"],PDO::PARAM_STR);
		$st->bindParam(":materno",$datosModel["materno"],PDO::PARAM_STR);
		$st->bindParam(":fecha",$datosModel["fecha"],PDO::PARAM_STR);
		$st->bindParam(":genero",$datosModel["genero"],PDO::PARAM_STR);
		$st->bindParam(":direcion",$datosModel["direcion"],PDO::PARAM_STR);		

		if ($st->execute()) {
			$_GET["cve"] = $str->lastInsertId();
			//echo $str->lastInsertId();
			$st2 = $str->prepare("INSERT INTO nino(nacionalida_nino,cve_per) VALUES (:nacionalidad,:cve_per)");
			$st2->bindParam(":nacionalidad",$datosModel["nacionalidad"],PDO::PARAM_STR);
			$st2->bindParam(":cve_per",$_GET["cve"],PDO::PARAM_INT);
			//echo $datosModel["nacionalidad"]." -- ".$str->lastInsertId();

			if ($st2->execute()) {
				return "OK";
			}else{
				return "error";
			}
		}else{
			return "error";
		}

		$st->close();
			
	}




	/*#Registro de usuarios.
	#------------------------------------------------------------------------------------------------------------------------------#
	public function registrarUsuarioModel($datosModel, $table){
		$st = Conexion::conectar()->prepare("INSERT INTO $table (nom,pater,mater,domicilio,tel,id) VALUES (:nombre, :paterno, :materno, :domicilio, :telefono, :id)");
		$st->bindParam(":nombre",$datosModel["nombre"], PDO::PARAM_STR);
		$st->bindParam(":paterno",$datosModel["paterno"], PDO::PARAM_STR);
		$st->bindParam(":materno",$datosModel["materno"], PDO::PARAM_STR);
		$st->bindParam(":domicilio",$datosModel["domicilio"], PDO::PARAM_STR);
		$st->bindParam(":telefono",$datosModel["telefono"], PDO::PARAM_STR);
		$st->bindParam(":id",$datosModel["id"], PDO::PARAM_INT);

		if ($st->execute()) {
			return "OK";
		}else{
			return "error";
		}

		$st->close();
		
	}



public function registrarUsuarioModel2($datosModel, $table){
	echo 'registrarUsuarioModel2';
	$st=Conexion::conectar()->prepare("SELECT LAST_INSERT_ID()");
$st->execute();
$id=$st;
	//$std = $st->query("SELECT LAST_INSERT_ID()");
//$lastId = $std->fetchColumn();
//echo 'std'.$std;
//echo 'id'.$lastId;

	 $st=prepare("INSERT INTO $table (nom,pater,mater,domicilio,tel,id) VALUES (:nom, :pater, :mater,:domicilio,:tel,$id)");
		

		$st->bindParam(":nom",$datosModel["nom"], PDO::PARAM_STR);
		$st->bindParam(":pater",$datosModel["pater"], PDO::PARAM_STR);
		$st->bindParam(":mater",$datosModel["mater"], PDO::PARAM_STR);
		$st->bindParam(":domicilio",$datosModel["domicilio"], PDO::PARAM_STR);
		$st->bindParam(":tel",$datosModel["tel"], PDO::PARAM_STR);
		$st->bindParam(":id",$datosModel["id"], PDO::PARAM_STR);
		if ($st->execute()) {
			return "OK";
		}else{
			return "error";
		}
		
	}



	#Ingreso USUARIO.
	#---------------------------------------------------------------------------------------------------------------------------------#
	public function ingresoUsuarioModel($datosModel, $tabla){
		$st = Conexion::conectar()->prepare("SELECT usuario, password, email from $tabla where usuario = :usuario" );
		$st->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$st->execute();
		return $st->fetch();
		//fetch(); obtiene una fila de un conjunto de resultados asociados al PDOstatement
		$st->close();
	}
	#Vista Usuarios
	#---------------------------------------------------------------------------------------------------------------------------------#
	public function vistaUsuarioModel($tabla){
		$st = Conexion::conectar()->prepare("SELECT id, usuario, password, email from $tabla" );
		$st->execute();
		return $st->fetchAll();
		//fetch(); obtiene una fila de un conjunto de resultados asociados al PDOstatement
		$st->close();
	}
	#Editar USUARIO 1
	#---------------------------------------------------------------------------------------------------------------------------------#
	public function editarUsuarioModel($datosModel, $tabla){
		$st = Conexion::conectar()->prepare("SELECT id, usuario, password, email from $tabla where id = :id" );
		$st->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$st->execute();
		return $st->fetch();
		//fetch(); obtiene una fila de un conjunto de resultados asociados al PDOstatement
		$st->close();
	}
	#Editar USUARIO 2 
	#---------------------------------------------------------------------------------------------------------------------------------#
	public function actualizarUsuarioModel($datosModel, $tabla){
		$st = Conexion::conectar()->prepare("UPDATE $tabla SET usuario=:usuario, password=:password, email=:email where id = :id" );
		$st->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$st->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$st->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$st->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if ($st->execute()) {
			return "OK";
		} else {
			return "error";
		}
		$st->close();
	}
	#Eliminar USUARIO 1
	#---------------------------------------------------------------------------------------------------------------------------------#
	public function borrarUsuarioModel($datosModel, $tabla){

		$st = Conexion::conectar()->prepare("DELETE FROM $tabla where id = :id" );
		$st->bindParam(":id", $datosModel, PDO::PARAM_INT);
		if ($st->execute()) {
			return "OK";
		} else {
			return "error";
		}
		
		$st->close();
	}*/

}


?>