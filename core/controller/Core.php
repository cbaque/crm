<?php


// 14 de Abril del 2014
// Core.php
// @brief obtiene las configuraciones, muestra y carga los contenidos necesarios.
// actualizado [11-Aug-2016]
class Core {
	public static $theme = "";
	public static $root = "";


	public static $user = null;
	public static $debug_sql = false;


	public static function includeCSS(){
		$path = "res/css/";
		$handle=opendir($path);
		if($handle){
			while (false !== ($entry = readdir($handle)))  {
				if($entry!="." && $entry!=".."){
					$fullpath = $path.$entry;
				if(!is_dir($fullpath)){
						echo "<link rel='stylesheet' type='text/css' href='".$fullpath."' />";

					}
				}
			}
		closedir($handle);
		}

	}

	public static function alert($text){
		echo "<script>alert('".$text."');</script>";
	}

	public static function redir($url){
		echo "<script>window.location='".$url."';</script>";
	}

	public static function includeJS(){
		$path = "res/js/";
		$handle=opendir($path);
		if($handle){
			while (false !== ($entry = readdir($handle)))  {
				if($entry!="." && $entry!=".."){
					$fullpath = $path.$entry;
				if(!is_dir($fullpath)){
						echo "<script type='text/javascript' src='".$fullpath."'></script>";

					}
				}
			}
		closedir($handle);
		}

	}

	public static function clickok(){
		swal("Grabado ok", "", "success");
	}

	public function tipoArchivo($ruta, $extension){
		$extension = strtolower($extension);
		switch ($extension) {
			case 'png':
				echo '<img src="'.$ruta.'" width="80%">';
				break;
				
			case 'jpg':
				echo '<img src="'.$ruta.'" width="80%">';
				break;

			case 'pdf':
				echo'<embed src="'. $ruta .'#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />';
				break;

			case 'mp3':
				echo '<audio controls src="' . $ruta .'"></audio>';
				break;

			case 'mp4':
				echo '<video src="'.$ruta.'" controls width="100%" height="600px"></video>';
				break;

			case 'jpeg':
				echo '<img class="grid-item_img" rel="rel1" src="'.$ruta.'" >';
				break;	
			
			case 'docx':
				#echo "<script>alert('https://view.officeapps.live.com/op/embed.aspx?src=https://www.primarysoft.group/crm/$ruta');</script>";
				#echo '<iframe src="https://view.officeapps.live.com/op/embed.aspx?src=https://www.primarysoft.group/crm/$ruta" width="100%" height="600px" frameborder="0"></iframe>';
				#echo "<script>alert('http://docs.google.com/gview?url=https://www.primarysoft.group/crm/".$ruta."&embedded=true');</script>";
				echo '<iframe src="http://docs.google.com/gview?url=https://www.primarysoft.group/crm/'.$ruta.'&embedded=true" style="width:600px; height:500px;" frameborder="0"></iframe>';
				break;

			default:
				# code...
				break;
		}

	}


}



?>