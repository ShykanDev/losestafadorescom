<?php

function mostrarError($errores, $campo){
	$alerta = '';
	if(isset($errores[$campo]) && !empty($campo)){
		$alerta = "<div class='error'>".$errores[$campo].'</div>';
	}
	
	return $alerta;
}

function borrarErrores(){
	$borrado = false;
	
	if(isset($_SESSION['errores'])){
		$_SESSION['errores'] = null;
		$borrado = true;
	}
	
	if(isset($_SESSION['errores_entrada'])){
		$_SESSION['errores_entrada'] = null;
		$borrado = true;
	}
	
	if(isset($_SESSION['completado'])){
		$_SESSION['completado'] = null;
		$borrado = true;
	}
	
	return $borrado;
}

function conseguirCategorias($conexion){
	$sql = "SELECT * FROM categorias ORDER BY id ASC;";
	$categorias = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($categorias && mysqli_num_rows($categorias) >= 1){
		$resultado = $categorias;
	}
	
	return $resultado;
}

function conseguirCategoria($conexion, $id){
	$sql = "SELECT * FROM categorias WHERE id = $id;";
	$categorias = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($categorias && mysqli_num_rows($categorias) >= 1){
		$resultado = mysqli_fetch_assoc($categorias);
	}
	
	return $resultado;
}
//Entrada de Entradas
function conseguirEntrada($conexion, $id){
	$sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellidos) AS usuario"
		  . " FROM entradas e ".
		   "INNER JOIN categorias c ON e.categoria_id = c.id ".
		   "INNER JOIN usuarios u ON e.usuario_id = u.id ".
		   
		   "WHERE e.id = $id";
	$entrada = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entrada && mysqli_num_rows($entrada) >= 1){
		$resultado = mysqli_fetch_assoc($entrada);
	}
	
	return $resultado;
}

//Entrada de Entradas
function conseguirEntrada2($conexion, $id){
	$sql = "SELECT p.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellidos) AS usuario"
		  . " FROM prueba2 p ".
		   "INNER JOIN categorias c ON p.categoria_id = c.id ".
		   "INNER JOIN usuarios u ON p.usuario_id = u.id ".
		   
		   "WHERE p.id = $id";
	$entrada = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entrada && mysqli_num_rows($entrada) >= 1){
		$resultado = mysqli_fetch_assoc($entrada);
	}
	
	return $resultado;
}




function conseguirEntrada1($conexion,  $limit = null,  $id){
	$sql = "SELECT z.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellidos) AS usuario"
		  . " FROM entradass z ".
		   "INNER JOIN categorias c ON z.categoria_id = c.id ".
		   "INNER JOIN usuarios u ON z.usuario_id = u.id ".
		   
		   "WHERE z.id = $id";
	$entrada = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entrada && mysqli_num_rows($entrada) >= 1){
		$resultado = mysqli_fetch_assoc($entrada);
	}
	
	return $resultado;
	if(!empty($categoria)){
		$sql .= "WHERE z.categoria_id = $categoria ";
	}
	
	$sql .= "ORDER BY z.id DESC ";
	
	if($limit){
		// $sql = $sql." LIMIT 4";
		$sql .= "LIMIT 4";
	}
	
	$entradas = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entradas && mysqli_num_rows($entradas) >= 1){
		$resultado = $entradas;
	}
	
	return $entradas;
}



function conseguirRespuesta($conexion, $id){
	$sql = "SELECT z.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellidos) AS usuario"
		  . " FROM entradass z ".
		   "INNER JOIN categorias c ON z.categoria_id = c.id ".
		   "INNER JOIN usuarios u ON z.usuario_id = u.id ".
		   "WHERE z.id = $id";
		   
		  
	$entrada = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entrada && mysqli_num_rows($entrada) >= 1){
		$resultado = mysqli_fetch_assoc($entrada);
	}
	
	return $resultado;
}



function conseguirEntradas($conexion, $limit = null, $categoria = null, $busqueda = null){
	$sql="SELECT e.*, c.nombre AS 'categoria' FROM entradas e ".
	
		 "INNER JOIN categorias c ON e.categoria_id = c.id ";
	
	if(!empty($categoria)){
		$sql .= "WHERE e.categoria_id = $categoria ";
	}
	
	if(!empty($busqueda)){
		$sql .= "WHERE e.titulo LIKE '%$busqueda%' ";
	}
	
	
	$sql .= "ORDER BY e.id DESC ";
	
	if($limit){
		// $sql = $sql." LIMIT 4";
		$sql .= "LIMIT 4";
	}
	
	$entradas = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entradas && mysqli_num_rows($entradas) >= 1){
		$resultado = $entradas;
	}
	
	return $entradas;
}

//ConseguirEntradas de prueba2
function conseguirEntradas2($conexion, $limit = null, $categoria = null, $busqueda = null){
	$sql="SELECT p.*, c.nombre AS 'categoria' FROM prueba2 p ".
	
		 "INNER JOIN categorias c ON p.categoria_id = c.id ";
	
	if(!empty($categoria)){
		$sql .= "WHERE p.categoria_id = $categoria ";
	}
	
	if(!empty($busqueda)){
		$sql .= "WHERE p.titulo LIKE '%$busqueda%' ";
	}
	
	
	$sql .= "ORDER BY p.id DESC ";
	
	if($limit){
		// $sql = $sql." LIMIT 4";
		$sql .= "LIMIT 4";
	}
	
	$entradas = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entradas && mysqli_num_rows($entradas) >= 1){
		$resultado = $entradas;
	}
	
	return $entradas;
}

function prueba($conexion, $limit=null, $sql){
	$sql="select * from entradass es where es.respuesta_id = entrada.id;";
	$sql .= "ORDER BY z.id DESC ";

	if($limit){
		// $sql = $sql." LIMIT 4";
		$sql .= "LIMIT 100000";
	}
	
	$entradas = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entradas && mysqli_num_rows($entradas) >= 1){
		$resultado = $entradas;
	}
	
	return $entradas;
}


function conseguirEntradas1($conexion, $limit = null){
	$sql="SELECT z.*, e.id AS 'entradas', CONCAT(u.nombre, ' ', u.apellidos) AS usuario FROM entradass z ".
	
		 "INNER JOIN entradas e ON z.respuesta_id = e.id ".
		 "INNER JOIN usuarios u ON z.usuario_id = u.id ";
	
	
	
	$sql .= "ORDER BY z.id DESC ";
	
	if($limit){
		// $sql = $sql." LIMIT 4";
		$sql .= "LIMIT 10000";
	}
	
	$entradas = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entradas && mysqli_num_rows($entradas) >= 1){
		$resultado = $entradas;
	}
	
	return $entradas;
}
function conseguirEntradasa($conexion, $limit = null){
	$sql="SELECT z.*, e.id AS 'prueba2', CONCAT(u.nombre, ' ', u.apellidos) AS usuario FROM entradass z ".
	
		 "INNER JOIN prueba2 e ON z.respuesta_id = e.id ".
		 "INNER JOIN usuarios u ON z.usuario_id = u.id ";
	
	
	
	$sql .= "ORDER BY z.id DESC ";
	
	if($limit){
		// $sql = $sql." LIMIT 4";
		$sql .= "LIMIT 10000";
	}
	
	$entradas = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entradas && mysqli_num_rows($entradas) >= 1){
		$resultado = $entradas;
	}
	
	return $entradas;
}



function conseguirEntradass($conexion, $limit = null, $categoria = null, $busqueda = null){
	$sql="SELECT e.*, c.nombre AS 'categoria' FROM entradas e ".
	
		 "INNER JOIN categorias c ON e.categoria_id = c.id ";
	
	if(!empty($categoria)){
		$sql .= "WHERE e.categoria_id = $categoria ";
	}
	
	if(!empty($busqueda)){
		$sql .= "WHERE e.empresa LIKE '%$busqueda%' ";
	}
	
	
	$sql .= "ORDER BY e.id DESC ";
	
	if($limit){
		// $sql = $sql." LIMIT 4";
		$sql .= "LIMIT 4";
	}
	
	$entradas = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entradas && mysqli_num_rows($entradas) >= 1){
		$resultado = $entradas;
	}
	
	return $entradas;
}

function conseguirEntradass2($conexion, $limit = null, $categoria = null, $busqueda = null){
	$sql="SELECT e.*, c.nombre AS 'categoria' FROM entradas e ".
	
		 "INNER JOIN categorias c ON e.categoria_id = c.id ";
	
	if(!empty($categoria)){
		$sql .= "WHERE e.categoria_id = $categoria ";
	}
	
	if(!empty($busqueda)){
		$sql .= "WHERE e.empresa LIKE '%$busqueda%' ";
	}
	
	
	$sql .= "ORDER BY e.id DESC ";
	
	if($limit){
		// $sql = $sql." LIMIT 4";
		$sql .= "LIMIT 4";
	}
	
	$entradas = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entradas && mysqli_num_rows($entradas) >= 1){
		$resultado = $entradas;
	}
	
	return $entradas;
}

function conseguirEntradass3($conexion, $limit = null, $categoria = null, $busqueda = null){
	$sql="SELECT p.*, c.nombre AS 'categoria' FROM prueba2 p ".
	
		 "INNER JOIN categorias c ON p.categoria_id = c.id ";
	
	if(!empty($categoria)){
		$sql .= "WHERE p.categoria_id = $categoria ";
	}
	
	if(!empty($busqueda)){
		$sql .= "WHERE p.titulo LIKE '%$busqueda%' ";
	}
	
	
	$sql .= "ORDER BY p.id DESC ";
	
	if($limit){
		// $sql = $sql." LIMIT 4";
		$sql .= "LIMIT 4";
	}
	
	$entradas = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entradas && mysqli_num_rows($entradas) >= 1){
		$resultado = $entradas;
	}
	
	return $entradas;
}

function conseguirEntradass4($conexion, $limit = null, $categoria = null, $busqueda = null){
	$sql="SELECT p.*, c.nombre AS 'categoria' FROM prueba2 p ".
	
		 "INNER JOIN categorias c ON p.categoria_id = c.id ";
	
	if(!empty($categoria)){
		$sql .= "WHERE p.categoria_id = $categoria ";
	}
	
	if(!empty($busqueda)){
		$sql .= "WHERE p.empresa LIKE '%$busqueda%' ";
	}
	
	
	$sql .= "ORDER BY p.id DESC ";
	
	if($limit){
		// $sql = $sql." LIMIT 4";
		$sql .= "LIMIT 4";
	}
	
	$entradas = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entradas && mysqli_num_rows($entradas) >= 1){
		$resultado = $entradas;
	}
	
	return $entradas;
}


function jose($conexion, $id){
	$sql = "SELECT * FROM entradass
	INNER JOIN entradas.
	ON entradass.identificador = entradas.id
	WHERE identificador='$id' ORDER BY id ASC;";
	
	
	$entradas = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($entradas && mysqli_num_rows($entradas) >= 1){
		$resultado = $entradas;
		
	}
	
	return $entradas;
}

