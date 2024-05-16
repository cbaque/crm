<?php


define("ROOT", dirname(__FILE__));

$debug= false;
if($debug){
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
}

include "core/autoload.php";

ob_start();
session_start();
Core::$root="";
    $lb = new Lb();
    $lb->start();

// si quieres que se muestre las consultas SQL debes decomentar la siguiente linea
Core::$debug_sql = true;

/*
//validacion para cerrar sesion automaticamente despues de 5 min
    $time = $_SERVER['REQUEST_TIME'];
    if(isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY'])>300){
        unset($_SESSION['user_id']);
        session_destroy();
        print "<script>window.location='index.php';</script>";
    }

$_SESSION['LAST_ACTIVITY'] = $time;
*/

?>