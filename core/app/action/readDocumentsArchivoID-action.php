<?php
	if(count($_POST)>0){
		$data = DocumentoData::getByArchivoId($_POST["archivo_id"]);

        return Core::archivosAgrupados($data);
	}
?>