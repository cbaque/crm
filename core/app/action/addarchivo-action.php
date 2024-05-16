<?php
if(count($_POST)>0){
	$user = new ArchivoData();
	$user->name = $_POST["name"];
	$user->usuario_id = $_SESSION["user_id"];
	$user->add();
	echo 0;
//print "<script>window.location='index.php?view=archivo';</script>";
}
?>