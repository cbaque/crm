<?php
	$idArchivo = $_POST['idArchivo'];
    $r = DocumentoData::getById($idArchivo);

	if (unlink($r->ruta)) {
		echo 1;
        $r->delById($idArchivo);
	} else {
		echo 0;
	}
?>