<?php
/*session_start();
require_once "../model/DocumentoData.php";*/
$r = new DocumentoData();
$r->archivo_id = $_POST["archivo_id"];
$r->paciente_id = $_POST["paciente_id"];
$r->category_id = $_POST["category_id"];

$r->usuario_id = $_SESSION["user_id"];
$r->nombre = "";
$r->ruta = "";
$r->tipo = "";
// $r->paciente = $_POST["namepac"];
// $r->cedula = $_POST["cedulapac"];

if($_FILES['archivos']['size'] > 0) {

	$carpetaArchivo =  "uploads/".$r->archivo_id."/".$r->paciente_id."/".$r->category_id;

	if (!file_exists($carpetaArchivo)) {
		mkdir($carpetaArchivo, 0777, true);
	}

	$totalArchivos = count($_FILES['archivos']['name']);
	for ($i=0; $i < $totalArchivos; $i++) { 

		$nombreArchivo = $_FILES['archivos']['name'][$i];
		$explode = explode('.', $nombreArchivo);
		$tipoArchivo = array_pop($explode);
		$rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];
		$rutaFinal = $carpetaArchivo . "/" . $nombreArchivo;
  		
		if (move_uploaded_file($rutaAlmacenamiento, $rutaFinal)) {
			$r->nombre = $nombreArchivo;
			$r->ruta = $rutaFinal;
			$r->tipo = $tipoArchivo;
			$r->add();
			$respuesta=0;			
		}else{
			$respuesta=1;
		}		
	}
	echo $respuesta;
}else {
	echo 1;
}
?>