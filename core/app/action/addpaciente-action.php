<?php
if (count($_POST) > 0) {
    $data = new PacienteData();
    $data->identificacion = $_POST["identificacion"];
    $data->lastname = $_POST["lastname"];
    $data->name = $_POST["name"];


    $data->add();

    print "<script>window.location='index.php?view=pacientes';</script>";
}
