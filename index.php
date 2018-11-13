<?php
echo session_start();	
//echo session_cache_expire();
//echo "<br>commit ::".session_commit();
//echo "<br>get cockie ::".session_get_cookie_params();
//echo "<br>id ::".session_id();
//echo "<br>name ::".session_name();
//echo "<br>unset ::".session_unset();

require_once "controllers/controller.php";
require_once "models/model.php";
include_once "models/connection.php";
include_once "models/funcs.php";


if (isset($_SESSION["id_usuario"])) { //En caso de existir la sesión redireccionamos
	$mvc = new MVCController();
	$mvc->getTemplate();
} else {
	$mvc = new MVCController();
	$mvc->getTemplateFree();
}
?>
