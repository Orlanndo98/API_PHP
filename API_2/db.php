<?php

$server = "127.0.0.1";
$user = "root";
$pass= "";
$database="api";
$port="3306";



//String de conexion

$conexion = new mysqli($server, $user, $pass, $database, $port);
if($conexion -> connect_errno){
	die($conexion -> connect_error);
}

//guardar, modificar, eliminar

function NonQuery($sqlstr, &$conexion = null){
	if (!$conexion)global $conexion;
	$result = $conexion -> query($sqlstr);
	return $conexion -> affected_rows;
}


//select

function ObtenerRegistro($sqlstr, &$conexion = null){
	if (!$conexion)global $conexion;
	$result = $conexion -> query($sqlstr);
	$resultArray = array();
	foreach ($result as $registros) {
		$resultArray[] = $registros;
	}
	return $resultArray;
}

//Conversion de UTF8
function ConvertirUTF8($array){
	array_walk_recursive($array, function(&$item, $key){
		if(!mb_detect_encoding($item,'utf-8', true)){
			$item = utf8_encode($item);
		}
	});
	return $array;

}
?>