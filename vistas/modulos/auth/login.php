<?php
include "models/connection.php";


if (isset($_SESSION["id_usuario"])) { //En caso de existir la sesión redireccionamos
	header("Location: index.php");
}

$errors = array();

if (!empty($_POST)) {
	$usuario = $mysqli->real_escape_string($_POST['logea_cliente']);
	$password = $mysqli->real_escape_string($_POST['logea_cliente_pass']);

	if (isNull($usuario, $usuario, $password)) {
		$errors[] = 'Debe llenar todos los campos';
	}

	if (isNullLogin($usuario, $password)) {
		$errors[] = "Debe llenar todos los campos";
	}


	if (usuarioExiste($usuario)) {
		$errors[] = 'El nombre de usuario "' . $nom_usu . '" ya existe!';
	}
	if (emailExiste($usuario)) {
		$errors[] = 'El correo electronico " ' . $correo_usu . ' " ya existe';
	}

	$errors[] = login($usuario, $password);
}
?>

<center>
    <div class="container" style="margin: 100px;">
        <h2>Iniciar sesión</h2><br>
        <form  action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off" role="form">
			<table >
				<tr>
					<td><h5>Usuario</h5></td>
					<td colspan="2"><input type="text" name="usuario" id="usuario" class="form-control"></td>
					
				</tr>
				<tr>
					<td><h5>Contraseña</h5></td>
					<td colspan="2"><input type="password" name="contrasena" id="contrasena" class="form-control"></td>
					
				</tr>
				<tr>
					<td></td>
					<td><center><input type="submit" value="Accesar" name="btn-acceso" id="btn-acceso" class="btn btn-outline-success"></center></td>
					<td><center><input type="reset" value="Limpiar" class="btn btn-outline-info"></center></td>
				</tr>
					
			
				
			
					
			</table>
        </form>
    </div>
</center>

<?php echo resultBlock($errors); ?>
