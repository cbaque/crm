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

				<div class="modal fade" id="viewArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Listado de Im&aacute;genes</h5>
							</div>
							<div class="modal-body">
								<div id="agrupacionArchivos"></div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							</div>
						</div>
					</div>
				</div>				

				<?php
				$data = array();
				$data = DocumentoData::getAllCountCategory($_GET["archivo"],$_GET["paciente"]);

				if (count($data) > 0) {
				?>
					<table class="table row-border table-hover compact" id="tablaGestorDataTable">
						<thead>
							<tr>
								<th>Estudio</th>
								<th>Visualizar</th>
								<th>Reportar</th>
							</tr>
						</thead>
						<?php
						$extensionesValidas = array('png', 'JPEG', 'jpg', 'jpeg');
						foreach ($data as $archivo) {
						?>
							<tr>
								<td data-titulo="Categoria"><?php echo $archivo->categoria; ?></td>

								<td data-titulo="Visualizar">

									<a class="btn btn-primary btn-sm" href="?view=tablaGestorImages&id=<?= $archivo->archivo_id ?>" >
										<span class="fa fa-eye"></span>
									</a>

								</td>


								<td data-titulo="Reportar">

									<a class="btn btn-secondary btn-sm" disabled>
										<span class="fa fa-archive"></span>
									</a>

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
		$('#tablaGestorDataTable').DataTable();
	});
</script>