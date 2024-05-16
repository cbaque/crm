<?php
$r = new TicketData();
$r->title = $_POST["title"];
$r->description = $_POST["description"];
$r->category_id = $_POST["category_id"];
$r->project_id = $_POST["project_id"];
$r->priority_id = $_POST["priority_id"];
$r->user_id = $_SESSION["user_id"];

   $r->module_id = $_POST["module_id"];
   $r->usuario = $_POST["usuario"];
   
$r->fecha_sol = $_POST["fecha_sol"];
$r->fecha_pag = $_POST["fecha_pag"];
$r->valor = $_POST["valor"];

$r->status_id = "1";
$r->kind_id = $_POST["kind_id"];

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
   $r->add();
   //mail::enviarcorreo();
Core::alert("Agregado exitosamente!");
Core::redir("./index.php?view=tickets");
?>