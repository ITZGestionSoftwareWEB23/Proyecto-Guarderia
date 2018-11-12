<?php

include "../../../models/funcs.php";

session_start();

if(isset($_SESSION["id_usuario"])){ //En caso de existir la sesión redireccionamos
		header("Location: ../../../index.php");
	}
	
		$errors = array();

	if(!empty($_POST))
	{
		$usuario = $mysqli->real_escape_string($_POST['logea_cliente']);
		$password = $mysqli->real_escape_string($_POST['logea_cliente_pass']);

		if(isNullLogin($usuario, $password))
		{
			$errors[] = "Debe llenar todos los campos";
		}

		$errors[] = login($usuario, $password);
	}

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Autenticacion</title>
<!--  <link rel="stylesheet" href="../css/estilos.css">
  <link rel="stylesheet" href="../css/styleindex.css">
  <link rel="stylesheet" href="../css/formualario.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/mensaje.css">
  <link rel="stylesheet" type="text/css" href="../css/styleP.css">-->
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="background-color:#2e3337">
  <div id="cabecera">
    <img src="" alt="">
  </div>
  <h1>Nuevo</h1>
  <form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">

          <div class="dat">
              <input type="text" name="logea_cliente" id="logea_cliente" placeholder="nombre o correo">
                <br><br>
                <input type="password" name="logea_cliente_pass" id="logea_cliente_pass" placeholder="contrasenia">
                <label>No estas registrado ?</label><a href="credenciales.php" class="registrarC">Registrate...</a>
                <br><br>
              <input type="submit" name="btn_ingresa" id="btn_ingresa" value="Ingresa">
          </div>
  
      <?php echo resultBlock($errors); ?>

</body>
</html>
