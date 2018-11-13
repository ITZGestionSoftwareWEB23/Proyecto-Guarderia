<?php
include "models/connection.php";

$errors = array();

if (!empty($_POST)) {
	$nombre = $mysqli->real_escape_string($_POST['nombre']);
	$email = $mysqli->real_escape_string($_POST['correo']);
	$password = $mysqli->real_escape_string($_POST['password']);
	$con_password = $mysqli->real_escape_string($_POST['confirma_password']);

	if (isNull($nombre, $email, $password)) {
		$errors[] = 'Debe llenar todos los campos';
	}
	if (!isEmail($email)) {
		$errors[] = 'correo invalido';
	}
	if (!validaPassword($password, $con_password)) {
		$errors[] = 'Las contrasenias no coinciden';
	}
	if (usuarioExiste($nombre)) {
		$errors[] = 'El nombre de usuario "' . $nombre . '" ya existe!';
	}
	if (emailExiste($email)) {
		$errors[] = 'El correo electronico " ' . $email . ' " ya existe';
	}
	if (count($errors)==0) {
      $hash_pass = hashPassword($password);
	  /*
	  $tipo_usuario = 2 hace referencia a un usuario de tipo administrativo.
	   */
	  $tipo_usuario = 2;
      $registro = registraUsuario($tipo_usuario, $nombre, $email, $hash_pass);

      if ($registro > 0) {
        $url = 'http://'.$_SERVER["SERVER_NAME"].'/Guarderia/index.php?action=activo&id='.$registro;
        echo 'Registro exitoso activa tu cuenta aqui. <a href='.$url.'>Activar Cuenta</a>';
        exit;
      }else {

        $errors[] = 'Error al registrar  '.$registro;
      }
    }
}
	?>

<div style="margin-top: 15px; position: relative; left: 25%;">
		<form  action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off" role="form">
			
			<div class="form-group row">
				<label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
			<div class="col-sm-4">
				<input type="text" name="nombre" id="nombre" class="form-control" />
			</div>
			</div>
			
			<div class="form-group row">
				<label for="correo" class="col-sm-2 col-form-label">Correo Electronico</label>
				<div class="col-sm-4">
				<input type="email" name="correo" id="correo" class="form-control"/>
				<small class="form-text text-muted">email@example.com</small>
				</div>
			</div>
			
			<div class="form-group row">
				<label for="password" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-4">
				<input type="password" name="password" id="password" class="form-control" />
				<small class="form-text text-muted">Ingrese una constrasenia por seguridad de mas de 6 caracteres</small>
				</div>
			</div>

			<div class="form-group row">
				<label for="password" class="col-sm-2 col-form-label">Confirma Password</label>
				<div class="col-sm-4">
				<input type="password" name="confirma_password" id="confirma_password" class="form-control"/>
			</div>
			</div>

			<input class="btn btn-outline-success" type="submit" name="crearUsuario" value="Registrarse">
			
			<div class="form-group">
				<label>Ya estas Registrado ?</label><a class="btn btn-outline-info" href="index.php?action=crearSesion">Ingresar</a>
			</div>

	<?php echo resultBlock($errors); ?>
	</form>

</div>