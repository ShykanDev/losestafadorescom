<?php
require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST)) {

	// Conexión a la base de datos
	require_once 'includes/conexion.php';

	// Iniciar sesión
	if (!isset($_SESSION)) {
		session_start();
	}

	// Recorger los valores del formulario de registro
	$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
	$apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
	$date = isset($_POST['date']) ? $_POST['date'] : false;
	$pais = isset($_POST['pais']) ? mysqli_real_escape_string($db, $_POST['pais']) : false;
	$tipo = isset($_POST['tipo']) ? mysqli_real_escape_string($db, $_POST['tipo']) : false;
	$email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
	$password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

	// Array de errores
	$errores = array();

	// Validar los datos antes de guardarlos en la base de datos
	// Validar campo nombre
	if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
		$nombre_validado = true;
	} else {
		$nombre_validado = false;
		$errores['nombre'] = "¡Ups! Intenta de nuevo";
	}

	// Validar apellidos
	if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
		$apellidos_validado = true;
	} else {
		$apellidos_validado = false;
		$errores['apellidos'] = "¡Ups! Verifica este campo";
	}

	//Validar Variable date
	if (!empty($date)) {
		$date_validate = true;
	} else {
		$date_validate = false;
		$errores['date'] = "¡Ups! La fecha no es correcta";
	}

	// Validar pais
	if (!empty($pais) && !is_numeric($pais) && !preg_match("/[0-9]/", $pais)) {
		$pais_validado = true;
	} else {
		$pais_validado = false;
		$errores['pais'] = "Ingrese un país de la lista";
	}

	//Validar Variable tipo
	if (!empty($tipo)) {
		$tipo_validate = true;
	} else {
		$tipo_validate = false;
		$errores['tipo'] = "¡Ups! Intenta de nuevo";
	}

	// Validar el email
	if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$email_validado = true;
	} else {
		$email_validado = false;
		$errores['email'] = "¡Ups! El email es invalido";
	}

	// Validar la contraseña
	if (!empty($password)) {
		$password_validado = true;
	} else {
		$password_validado = false;
		$errores['password'] = "La contraseña no debe estar vacía";
	}

	$guardar_usuario = false;

	if (count($errores) == 0) {
		$guardar_usuario = true;

		// Cifrar la contraseña
		$password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

		// INSERTAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
		$sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$pais', '$tipo', '$email', '$password_segura', CURDATE());";
		$guardar = mysqli_query($db, $sql);

		//		var_dump(mysqli_error($db));
		//		die();

		if ($guardar) {
			$_SESSION['completado'] = "El registro se ha completado con éxito";

			$mensaje= "
			<html>
			<head>
			<title>Registro Completado</title>
			</head>
			<body style='  background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%); padding: 15px;'>
			
				<h1 style='text-align: center;'>Hola y bienvenido a losestafadores.com $nombre</h1>
	
				<div style='text-align: center;'> 
					<h3> losestafadores.com </h3>
				</div>
	
				<h3 style='text-align: center; '> Comenta, comparte y explora un sitio lleno de experiencias sobre relaciones. Donde las parejas comparten con comentarios las vivencias de sus anteriores parejas. </h3>
	
				<p style='text-align: center; '> Empieza a indagar como fué esa persona en su relación anterior entrando a losestafadores.com  </p>
	
				<div style='text-align: center; '> 
					<p> Comienza compartiendo o visualizando experiencias </p>
				</div>
				<h4 style=' text-align: center;'> Si tienes dudas o quieres ponerte en contacto con nosotros haz clic <a  href='https://losestafadores.com/contacto.php'>aquí</a>
			
			</body>
			</html>";

			$mail = new PHPMailer();
			$mail->IsSMTP(); // enable SMTP
			//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true; // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
			$mail->CharSet = 'UTF-8'; //This comand acept charchter alphanumeric
			$mail->Host = "ns56.hostgator.mx ";
			$mail->Port = 465; // or 587
			$mail->IsHTML(true); //Active HTML
			$mail->Username = "contacto@miexpareja.net";//User or count primary
			$mail->Password = "Contact@2020"; //Password the count
			$mail->SetFrom("contacto@losestafadores.com");//Email main
			$mail->Subject = "Bienvenido a losestafadores.com";//Title of the message
			$mail->Body = $mensaje;//Message 
			$mail->AddAddress($email);//Email the second person
			if (!$mail->Send()) {
				echo "Mailer Error: " . $mail->ErrorInfo; //Message if exist error 
			}else{
				header('Location: register.php');
			}
		} else {
			$_SESSION['errores']['general'] = "Fallo al guardar el usuario, verifica tus datos, puede que este usuario ya exista";
		}
	} else {
		$_SESSION['errores'] = $errores;
	}
}
header('Location: register.php');
?>