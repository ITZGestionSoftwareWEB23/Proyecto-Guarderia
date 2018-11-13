<?php

function isNull($nombre,$email,$pass) {

	if (
			strlen(trim($nombre)) < 1 ||
			strlen(trim($pass)) < 1 ||
			strlen(trim($email)) < 1 ) {
		return true;
	} else {
		return false;
	}
}

function isEmail($email) {
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return true;
	} else {
		return false;
	}
}

function validaPassword($var1, $var2) {
	if (strcmp($var1, $var2) !== 0) {
		return false;
	} else {
		return true;
	}
}

function minMax($min, $max, $valor) {
	if (strlen(trim($valor)) < $min) {
		return true;
	} else if (strlen(trim($valor)) > $max) {
		return true;
	} else {
		return false;
	}
}

function usuarioExiste($nom_usu) {
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT id FROM usuarios WHERE nombre = ? LIMIT 1");
	$stmt->bind_param("s", $nom_usu);
	$stmt->execute();
	$stmt->store_result();
	$num = $stmt->num_rows;
	$stmt->close();

	if ($num > 0) {
		return true;
	} else {
		return false;
	}
}

function emailExiste($email) {
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT id FROM usuarios WHERE email = ? LIMIT 1");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$stmt->store_result();
	$num = $stmt->num_rows;
	$stmt->close();

	if ($num > 0) {
		return true;
	} else {
		return false;
	}
}

function generateToken() {
	$gen = md5(uniqid(mt_rand(), false));
	return $gen;
}

function hashPassword($password) {
	$hash = password_hash($password, PASSWORD_DEFAULT);
	return $hash;
}

function resultBlock($errors) {
	if (count($errors) > 0) {
		echo "<div id='error' class='alert alert-danger' role='alert'>
			<a href='#' onclick=\"showHide('error');\">[X]</a>
			<ul>";
		foreach ($errors as $error) {
			echo "<li>" . $error . "</li>";
		}
		echo "</ul>";
		echo "</div>";
	}
}


function obtenerCVE_USU($email) {
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT id FROM usuarios WHERE email = ? LIMIT 1");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$stmt->bind_result($clave_usu);
	$stmt->fetch();
	return $clave_usu;
}

function registraUsuario($tipo_usuario, $nombre, $correo, $pass_hash) {

	global $mysqli;
	if (!($stmt = $mysqli->prepare("INSERT INTO usuarios VALUES(NULL,?,0,?,?,?,NULL,NOW(),NULL)"))) {
		echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
	} else {

		$stmt->bind_param('isss', $tipo_usuario, $nombre, $correo, $pass_hash);
		if ($stmt->execute()) {
			return obtenerCVE_USU($correo);
		} else {
			echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
			return 0;
		}
	}
}

function enviarEmail($email, $nombre, $asunto, $cuerpo) {

	require_once 'PHPMailer/PHPMailerAutoload.php';

	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tipo de seguridad';
	$mail->Host = 'smtp.hosting.com';
	$mail->Port = 'puerto';

	$mail->Username = 'miemail@dominio.com';
	$mail->Password = 'password';

	$mail->setFrom('miemail@dominio.com', 'Sistema de Usuarios');
	$mail->addAddress($email, $nombre);

	$mail->Subject = $asunto;
	$mail->Body = $cuerpo;
	$mail->IsHTML(true);

	if ($mail->send())
		return true;
	else
		return false;
}

function validaIdToken($id, $token) {
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT activo FROM usuarios WHERE id = ? LIMIT 1");
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$stmt->store_result();
	$rows = $stmt->num_rows;

	if ($rows > 0) {
		$stmt->bind_result($activacion);
		$stmt->fetch();

		if ($activacion == 1) {
			$msg = "La cuenta ya se activo anteriormente.";
		} else {
			if (activarUsuario($id)) {
				$msg = 'Cuenta activada.';
			} else {
				$msg = 'Error al Activar Cuenta';
			}
		}
	} else {
		$msg = 'No existe el registro para activar.';
	}
	return $msg;
}

function activarUsuario($id) {
	global $mysqli;

	$stmt = $mysqli->prepare("UPDATE usuarios SET activo=1 WHERE id = ?");
	$stmt->bind_param('s', $id);
	$result = $stmt->execute();
	$stmt->close();
	return $result;
}

function isNullLogin($usuario, $password) {
	if (strlen(trim($usuario)) < 1 || strlen(trim($password)) < 1) {
		return true;
	} else {
		return false;
	}
}

function login($usuario, $password) {
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT id, tipo, password FROM usuarios WHERE nombre = ? || email = ? LIMIT 1");
	$stmt->bind_param("ss", $usuario, $usuario);
	$stmt->execute();
	$stmt->store_result();
	$rows = $stmt->num_rows;

	if ($rows > 0) {

		if (isActivo($usuario)) {

			$stmt->bind_result($id, $id_tipo, $passwd);
			$stmt->fetch();

			$validaPassw = password_verify($password, $passwd);

			if ($validaPassw) {

				lastSession($id);
				$_SESSION['id_usuario'] = $id;
				$_SESSION['tipo_usuario'] = $id_tipo;
				$mvc = new MVCController();
				$mvc->getTemplate();
//				header("location: index.php");
			} else {

				$errors = "La contrase&ntilde;a es incorrecta";
			}
		} else {
			$errors = 'El usuario no esta activo';
		}
	} else {
		$errors = "El nombre de usuario o correo electr&oacute;nico no existe";
	}
	return $errors;
}

function lastSession($id) {
	global $mysqli;

	$stmt = $mysqli->prepare("UPDATE usuarios SET ultimolog=NOW() WHERE id = ?");
	$stmt->bind_param('s', $id);
	$stmt->execute();
	$stmt->close();
}

function isActivo($usuario) {
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT activo FROM usuarios WHERE nombre = ? || email = ? LIMIT 1");
	$stmt->bind_param('ss', $usuario, $usuario);
	$stmt->execute();
	$stmt->bind_result($activacion);
	$stmt->fetch();

	if ($activacion == 1) {
		return true;
	} else {
		return false;
	}
}

function generaTokenPass($user_id) {
	global $mysqli;

	$token = generateToken();

	$stmt = $mysqli->prepare("UPDATE usuarios SET token_password=?, password_request=1 WHERE id = ?");
	$stmt->bind_param('ss', $token, $user_id);
	$stmt->execute();
	$stmt->close();

	return $token;
}

function getValor($campo, $tabla, $campoWhere, $valor) {
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT $campo FROM $tabla WHERE $campoWhere = ? LIMIT 1");
	$stmt->bind_param('s', $valor);
	$stmt->execute();
	$stmt->store_result();
	$num = $stmt->num_rows;

	if ($num > 0) {
		$stmt->bind_result($_campo);
		$stmt->fetch();
		return $_campo;
	} else {
		return null;
	}
}

function getPasswordRequest($id) {
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT password_request FROM usuarios WHERE id = ?");
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$stmt->bind_result($_id);
	$stmt->fetch();

	if ($_id == 1) {
		return true;
	} else {
		return null;
	}
}

function verificaTokenPass($user_id, $token) {

	global $mysqli;

	$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE id = ? AND token_password = ? AND password_request = 1 LIMIT 1");
	$stmt->bind_param('is', $user_id, $token);
	$stmt->execute();
	$stmt->store_result();
	$num = $stmt->num_rows;

	if ($num > 0) {
		$stmt->bind_result($activacion);
		$stmt->fetch();
		if ($activacion == 1) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

function cambiaPassword($password, $user_id, $token) {

	global $mysqli;

	$stmt = $mysqli->prepare("UPDATE usuarios SET password = ?, token_password='', password_request=0 WHERE id = ? AND token_password = ?");
	$stmt->bind_param('sis', $password, $user_id, $token);

	if ($stmt->execute()) {
		return true;
	} else {
		return false;
	}
}
