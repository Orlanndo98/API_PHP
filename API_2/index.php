<?php
require_once('utilidades.php');// llamar archivo utilidades.php
//Content-Type
//application/json
if(isset($_GET['url'])) {
	$var = $_GET['url'];
	//require_once('db.php'); 
	//$query = "SELECT * FROM dolar";
	//$resultado = ObtenerRegistro($query);
	//print_r($resultado);

	if($_SERVER['REQUEST_METHOD']=='GET'){ ////////////METODO GET
		///echo "GET";
		///http_response_code(200);
		//print_r($var);

		$numero = intval(preg_replace('/[^0-9]+/', '', $var),10);
		//print_r($numero);
		header('Content-type:application/json;charset=utf-8');

		switch ($var) {
			case "dolar":
				$resp = TodosDolares();
				print_r(json_encode($resp));
				http_response_code(200);

				break;

			case "dolar/$numero":
				$resp = DolaresPorId($numero);
				//echo "////////";
				print_r(json_encode($resp));
				http_response_code(200);

				break;
			
			default:
		}

	}else if($_SERVER['REQUEST_METHOD']=='POST'){ ////////////METODO POST
		$POSTBODY = file_get_contents("php://input");
		$conver = json_decode($POSTBODY,true);
		if(json_last_error()==0){

			switch ($var) {
			case "dolar";
				CrearRegistro($conver);
				http_response_code(200);
				break;			
			default:
			}

		}else{
			echo "json invalido";
			http_response_code(405);

		}
			
	}
	else if($_SERVER['REQUEST_METHOD']=='DELETE'){ ////////////METODO DELETE
		$POSTBODY = file_get_contents("php://input");
		$conver = json_decode($POSTBODY,true);
		if(json_last_error()==0){

			switch ($var) {
			case "dolar";
				EliminarRegistro($conver);
				http_response_code(200);
				break;			
			default:
			}

		}else{
			echo "json invalido";
			http_response_code(405);

		}
			
	}
	else{
		echo "Entra else POST";;
		http_response_code(405); //Respuesta FALIED
	}

}else{
	//metadata

	?>

<link rel="stylesheet" href="estilo.css" type="text/css">
<div class='container'>
    <h1>Dolar</h1>
    <div class='divbody'>
               <code>
            POST/dolar
        </code>
        <code>
            GET/dolar
            <br>
            GET/dolar/$id
        </code>
         <code>
            DELETE/dolar/$id
        </code>
    </div>
</div>

<?php
}

?>
