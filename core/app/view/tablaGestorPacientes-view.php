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
				<?php
				$data = array();
				$data = DocumentoData::getAllCountPaciente($_GET["id"]);

				if (count($data) > 0) {
				?>
					<table class="table row-border table-hover compact" id="tablaGestorDataTable">
						<thead>
							<tr>
								<th>Paciente</th>
								<th>C&eacute;dula</th>
								<th>Cantidad</th>
								<th>Visualizar</th>
							</tr>
						</thead>
						<?php
						$extensionesValidas = array('png', 'JPEG', 'jpg', 'jpeg');
						foreach ($data as $archivo) {
						?>
							<tr>
								<td data-titulo="Paciente"><?php echo $archivo->paciente; ?></td>
								<td data-titulo="Cedula"><?php echo $archivo->cedula; ?></td>
								<td data-titulo="Cantidad"><?php echo $archivo->cantidad; ?></td>

								<td data-titulo="Visualizar">

									<a class="btn btn-primary btn-sm" href="?view=tablaGestorCategory&archivo=<?= $archivo->archivo_id ?>&paciente=<?= $archivo->paciente_id ?>" >
										<span class="fa fa-eye"></span>
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