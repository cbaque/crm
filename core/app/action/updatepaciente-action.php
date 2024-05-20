<?php

if(count($_POST)>0){

	$data = PacienteData::getById($_POST["paciente_id"]);
	$data->id = $_POST["paciente_id"];
	$data->name = $_POST["name"];
	$data->identificacion = $_POST["identificacion"];
	$data->lastname = $_POST["lastname"];
	$data->update();
    print "<script>window.location='index.php?view=pacientes';</script>";


}


?>