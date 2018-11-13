<?php
$DB_CONNECTION="mysql";
$DB_HOST="127.0.0.1";
$DB_PORT="3306";
$DB_DATABASE="kinder";
$DB_USERNAME="root";
$DB_PASSWORD="";

$mysqli = new mysqli($DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE);
if (mysqli_connect_errno()) {
	echo "Error:: ".mysqli_connect_error();
	exit();
}
?>
