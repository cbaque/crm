<?php
if(count($_POST)>0){
	$is_active=0;
	if(isset($_POST["is_active"])){$is_active=1;}
	$user = UserData::getById($_POST["user_id"]);
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->email = $_POST["email"];
	$user->kind = $_POST["kind"];
	$user->is_active=$is_active;
  // $user->foto ="";

	//Recogemos el archivo enviado por el formulario
   $archivo = $_FILES['foto']['name'];
   //Si el archivo contiene algo y es diferente de vacio
   if (isset($archivo) && $archivo != "") {
      //Obtenemos algunos datos necesarios sobre el archivo
      $tipo = $_FILES['foto']['type'];
      $tamano = $_FILES['foto']['size'];
      $temp = $_FILES['foto']['tmp_name'];
      //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
     if (((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png" || strpos($tipo, "bmp")) && ($tamano < 2000000)))) {
        print "<script>alert('Error. La extensión o el tamaño de los archivos no es correcta.- Se permiten archivos .gif, .jpg, .png, .bmp. y de 200 kb como máximo.');</script>";
     }
     else {
        //Si la imagen es correcta en tamaño y tipo
        //Se intenta subir al servidor
        if (move_uploaded_file($temp, 'uploads/'.$user->username)) {
            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
            chmod('uploads/'.$user->username, 0777);
            //Mostramos el mensaje de que se ha subido co éxito
            print "<script>'<div><b>Se ha subido correctamente la imagen.</b></div>';</script>";
			$user->foto =$user->username;
            //Mostramos la imagen subida
           // print "<script>'<p><img src="images/'.$archivo.'"></p>';</script>";
        }
        else {
           //Si no se ha podido subir la imagen, mostramos un mensaje de error
           print "<script>alert('<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>');</script>";
        }
      }
   }
	$user->update();

	if($_POST["password"]!=""){
		$user->password = sha1(md5($_POST["password"]));
		$user->update_passwd();
print "<script>alert('Se ha actualizado el password');</script>";

	}

print "<script>window.location='index.php?view=users';</script>";


}


?>