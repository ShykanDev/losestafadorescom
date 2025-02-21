<?php
if(isset($_POST)){	
    require_once 'includes/conexion.php';

	$producto=$_REQUEST['producto'];
	$nombreimg = $_FILES['imagen']['name']; //Contiene el nombre
	$archivo=$_FILES['imagen']['tmp_name']; //Contiene el archivo
	$ruta = 'archivo';

	$ruta=$ruta."/".$nombreimg;
	move_uploaded_file($archivo, $ruta);

	$titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;

	$fecha_estafa = isset($_POST['fecha_estafa']) ? mysqli_real_escape_string($db, $_POST['fecha_estafa']) : false;

	$direccion_estafa = isset($_POST['direccion_estafa']) ? mysqli_real_escape_string($db, $_POST['direccion_estafa']) : false;

	$tipo_estafa = isset($_POST['tipo_estafa']) ? mysqli_real_escape_string($db, $_POST['tipo_estafa']) : false;

	$other_estafa = isset($_POST['other_estafa']) ? mysqli_real_escape_string($db, $_POST['other_estafa']) : false;

	$medio_estafa = isset($_POST['medio_estafa']) ? mysqli_real_escape_string($db, $_POST['medio_estafa']) : false;

	$demanda = isset($_POST['demanda']) ? mysqli_real_escape_string($db, $_POST['demanda']) : false;

	$descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;

	$producto = isset($_POST['producto']) ? mysqli_real_escape_string($db, $_POST['producto']) : false;

	$imagen = isset($_POST['imagen']) ? mysqli_real_escape_string($db, $_POST['imagen']) : false;

	$categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;

    $usuario = $_SESSION['usuario']['id'];
    
    
	// Validación
	$errores = array();	
	
	if(empty($titulo)){
		$errores['titulo'] = 'El nombre no es válido';
	}

	if(empty($fecha_estafa)){
		$errores['fecha_estafa'] = 'Seleccione una fecha';
	}

	if(empty($direccion_estafa)){
		$errores['direccion_estafa'] = 'Llene este campo con una dirección';
	}

	if(empty($tipo_estafa)){
		$errores['tipo_estafa'] = 'Seleccione una fecha';
	}

	if(empty($medio_estafa)){
		$errores['medio_estafa'] = 'Este campo debe de estar lleno';
	}

	if(empty($demanda)){
		$errores['demanda'] = 'Seleccione una opción';
	}

	if(empty($descripcion)){
		$errores['descripcion'] = 'Es necesario comentar su experiencia';
	}

	
	

	if(empty($categoria) && !is_numeric($categoria)){
		$errores['categoria'] = 'La categoría no es válida';
	}
   	
	if(count($errores) == 0){
		if(isset($_GET['editar'])){
			$entrada_id = $_GET['editar'];
			$usuario_id = $_SESSION['usuario']['id'];
			
			$sql = "UPDATE entradas SET titulo='$titulo', 
			fecha_estafa='$fecha_estafa',
			direccion_estafa='$direccion_estafa',
			tipo_estafa='$tipo_estafa',
			other_estafa='$other_estafa',
			medio_estafa='$medio_estafa',
			demanda='$demanda',
			descripcion='$descripcion',
			producto='$producto',
			ruta='$ruta',
			categoria_id=$categoria ".
					" WHERE id = $entrada_id AND usuario_id = $usuario_id";

		}else{
			$sql = "INSERT INTO entradas VALUES(null, $usuario, 
			$categoria, 
			'$titulo', 
			'$fecha_estafa',
			'$direccion_estafa',
			'$tipo_estafa',
			'$other_estafa',
			'$medio_estafa',
			'$demanda',
			'$descripcion',
			'$producto',
			'$ruta',
			
			CURDATE());";
		}
	
		$guardar = mysqli_query($db, $sql);

		header("Location:entradaa.php");
	}else{

		$_SESSION["errores_entrada"] = $errores;
		
		if(isset($_GET['editar'])){
			header("Location: editar-entrada.php?id=".$_GET['editar']);
		}else{
			header("Location: crear-entradas.php");
		}
	}
	
}

