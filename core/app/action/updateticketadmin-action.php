<?php
if(count($_POST)>0){
$r = TicketData::getById($_POST["user_id"]);
$r->title = $_POST["title"];
$r->description = $_POST["description"];
$r->category_id = $_POST["category_id"];
$r->project_id = $_POST["project_id"];
$r->priority_id = $_POST["priority_id"];

   $r->module_id = $_POST["module_id"];
   $r->usuario = $_POST["usuario"];
   $r->status_id = $_POST["status_id"];


   $archivo = $_FILES['adjunto']['name'];
   if (isset($archivo) && $archivo != "") {
      $tipo = $_FILES['adjunto']['type'];
      $tamano = $_FILES['adjunto']['size'];
      $temp = $_FILES['adjunto']['tmp_name'];
     if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png") || strpos($tipo, "bmp")|| strpos($tipo, "doc") || strpos($tipo, "docx") || strpos($tipo, "xls") || strpos($tipo, "xlsx") ) && ($tamano < 10000000))) {
        print "<script>alert('Error. La extensión o el tamaño de los archivos no es correcta.- Se permiten archivos .gif, .jpg, .png, .bmp, .doc,.docx,.xls,.xlsx,  .  y de 10 mb como máximo.');</script>";
     }
     else {
        if (move_uploaded_file($temp, 'uploads/'.$archivo)) {
            chmod('uploads/'.$archivo, 0777);
            $r->adjunto = $archivo;
            
        }
     }
   }    
   $r->update();
Core::alert("Agregado exitosamente!");
Core::redir("./index.php?view=reports");
}
?>