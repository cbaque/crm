<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Gestor de Documentos</h4>
			</div>
			<div class="card-content table-responsive">
				<?php $archivo = ArchivoData::getAll(); ?>

				<a class="btn btn-default" href="?view=tablaGestor" >
					Regresar	
				</a>

				<!-- Modal -->
				<div class="modal fade" id="visualizarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Archivo</h5>
							</div>
							<div class="modal-body">
								<div id="archivoObtenido"></div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							</div>
						</div>
					</div>
				</div>		

				<?php
				$data = array();
				$data = DocumentoData::getByArchivoId($_GET["id"]);

				if (count($data) > 0) {
				?>
					<table class="table row-border table-hover compact" id="tablaGestorImages">
						<thead>
							<tr>
								<th>Tipo de Estudio</th>
								<th>Nombre Documento</th>
								<th>Extensión archivo</th>
                                <th>Descargar</th>
								<th>Visualizar</th>
							</tr>
						</thead>
						<?php
						$extensionesValidas = array('png', 'JPEG', 'jpg', 'jpeg');
						foreach ($data as $data) {
                            $archivo = $data->getArchivo();
						?>
							<tr>
								<td data-titulo="Tipo Estudio"><?php echo $data->categoria; ?></td>
								<td data-titulo="Documento"><?php echo $data->nombre; ?></td>
								<td data-titulo="Extensión"><?php echo $data->tipo; ?></td>

								<td data-titulo="Descargar">

                                    <a href="'<?php echo $data->ruta ?>'" download="'<?php echo $data->nombre ?>'" class="btn btn-success btn-sm"><span class="fa fa-download"></span></a>

								</td>                                

								<td data-titulo="Visualizar">

                                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#visualizarArchivo" onclick="obtenerArchivoPorId('<?php echo $data->id ?>')"><span class="fa fa-eye"></span></a>

								</td>

							</tr>
						<?php
						}
						echo "</table>";
						?>
			</div>
		</div>
	<?php

				} else {
					echo "<p class='alert alert-danger'>No hay Documentos</p>";
				}
	?>

	</div>
</div>
<script src="assets/js/gestor.js"></script>
<script type="text/javascript">
	$('#btndoc').on('click', function() {
		$('#modalAgregarDocumento').modal('show');
	});
	$('#btnarch').on('click', function() {
		$('#modalAgregarArchivos').modal('show');
	});
	$('#btnGuardarDocumentos').click(function() {
		agregarDocumentos();
	});
	$('#btnGuardarArchivos').click(function() {
		agregarArchivos();
	});
</script>


<script type="text/javascript">
	$(document).ready(function() {
		$('#tablaGestorImages').DataTable();
	});
</script>