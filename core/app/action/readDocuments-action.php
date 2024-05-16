<?php
	if(count($_POST)>0){
		$user = DocumentoData::getById($_POST["archivo_id"]);
		return Core::tipoArchivo($user->ruta, $user->tipo);
	}
?>