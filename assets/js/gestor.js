function agregarDocumentos() {
	var formData = new FormData(document.getElementById('frmDocumentos'));

	$.ajax({
		url:"./?action=adddocumento",
		type:"POST",
		datatype: "html",
		data: formData,
		cache:false,
		contentType:false,
		processData:false,
		success:function(respuesta){
			console.log(respuesta);
			respuesta = respuesta.trim();

			if (respuesta == 0) {
				$('#frmDocumentos')[0].reset();
				$('#archivos').val = [];
				swal("", "Agregado con exito!", "success");
			} else {
				swal("", "Fallo al agregar !", "error");
			}
		}
	});
} 

function agregarArchivos() {
	var formData = new FormData(document.getElementById('frmArchivos'));
	$.ajax({
		url:"./?action=addarchivo",
		type:"POST",
		datatype: "html",
		data: formData,
		cache:false,
		contentType:false,
		processData:false,
		success:function(respuesta){
			console.log(respuesta);
			respuesta = respuesta.trim();

			if (respuesta == 0) {
				$('#frmArchivos')[0].reset();
				swal("", "Agregado con exito!", "success");
			} else {
				swal("", "Fallo al agregar !", "error");
			}
		}
	});
} 

function eliminarArchivo(idArchivo) {
	swal({
	  title: "Estas seguro de eliminar este archivo?",
	  text: "Una vez eliminado, no podra recuperarse!",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {
	    	$.ajax({
	    		type:"POST",
	    		data:"idArchivo=" + idArchivo,
	    		url:"./?action=deldocumento",
	    		success:function(respuesta){
	    			console.log(respuesta);
	    			respuesta = respuesta.trim();
	    			if (respuesta == 1) {
	    				//$('#tablaGestorArchivos').load("gestor/tablaGestor.php");
	    				swal("Eliminado con exito!", {
	      					icon: "success",
	    				});
	    			} else {
	    				swal("Error al eliminar!", {
	      					icon: "error",
	    				});
	    			}

	    			
	    		}
	    	});
	  } 
	});
}


function obtenerArchivoPorId(archivo_id) {
	$.ajax({
		type:"POST",
		data:"archivo_id=" + archivo_id,
		url:"./?action=readDocuments",
		success:function(respuesta){
			$('#archivoObtenido').html(respuesta);
		}
	});
}

function obtenerDocumentosxArchivoID(archivo_id) {
	$.ajax({
		type:"POST",
		data:"archivo_id=" + archivo_id,
		url:"./?action=readDocumentsArchivoID",
		success:function(respuesta){
			$('#agrupacionArchivos').html(respuesta);
		}
	});
}