<?php

require_once("db.php");


function TodosDolares(){
	$Query = "SELECT * FROM dolar"; ////Codigo sql
	$Respuesta = ObtenerRegistro($Query); ////Funcion en db.php

	//print_r($Respuesta)
	return ConvertirUTF8($Respuesta); //Salida de Funcion con registros convertivos en UTF-8
}
function DolaresPorId($id){
	$Query = "SELECT * FROM dolar WHERE id = $id"; ////Codigo sql
	$Respuesta = ObtenerRegistro($Query); ////Funcion en db.php
	//print_r($Respuesta);
	return ConvertirUTF8($Respuesta); //Salida de Funcion con registros convertivos en UTF-8
}


function CrearRegistro($array){
	$ID = $array[0]['id'];
	$Fecha = $array[0]['Fecha'];
	$Valor = $array[0]['Valor'];

	$Query = "INSERT INTO dolar(id, Fecha, Valor) VALUES('$ID','$Fecha','$Valor')";
	NonQuery($Query);
	return true;

}

function EliminarRegistro($array){
	$ID = $array[0]['id'];
	$Query = "DELETE FROM dolar WHERE id = $ID";
	NonQuery($Query);
	echo "Registro elimindado ";
	print_r($ID);
	return true;

}

?>