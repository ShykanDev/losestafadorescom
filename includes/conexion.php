<?php

$servidor = 'mx56';
$usuario = 'miarrend';
$password = 'q7A61pb3+@XRgE';
$basededatos = 'miarrend_losestafadores';

$db = mysqli_connect($servidor, $usuario, $password, $basededatos);

mysqli_query($db, "SET NAMES 'utf8'");

// Iniciar la sesión
if(!isset($_SESSION)){
	session_start();
}

?>