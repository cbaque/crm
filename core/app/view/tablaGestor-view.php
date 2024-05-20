<style>
  .spinner-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.5); /* Fondo semi-transparente */
    z-index: 9999; /* Para asegurarse de que esté por encima de otros elementos */
  }
  
  .spinner {
    position: absolute;
    top: 50%;
    left: 50%;
    border: 5px solid #f3f3f3; /* Gris claro para el borde */
    border-top: 5px solid #3498db; /* Azul para el borde superior */
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite; /* Animación de rotación */
  }
  
  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
</style>


<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Gestor de Documentos</h4>
			</div>
			<div class="card-content table-responsive">
				<!-- <a href="./index.php?view=newticket" class="btn btn-info">Nueva Categoria</a> -->
				<?php $archivo = ArchivoData::getAll(); ?>

				<!-- Modal -->
				<span class="btn btn-info" id="btnarch">
					Crear Archivo
				</span>

				<span class="btn btn-info" id="btndoc">
					Agregar Documento
				</span>

				<!-- Modal -->
				<div class="modal fade" id="modalAgregarDocumento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="myModalLabel">Subir documento</h5>
							</div>
							<div class="modal-body">
								<form id="frmDocumentos" enctype="multipart/form-data">

									<div class="row">
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon" id="basic-addon1">Archivo</span>
												<?php $archivo2 = ArchivoData::getAll(); ?>
												<select name="archivo_id" class="form-control">
													<option value="">SELECCIONE</option>
													<?php foreach ($archivo2 as $p) : ?>
														<option value="<?php echo $p->id; ?>"><?php echo utf8_encode($p->nombre); ?></option>
													<?php endforeach; ?>
												</select>
											</div>											
										</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon" id="basic-addon1">Paciente</span>
												<?php $pacientes = PacienteData::getAll(); ?>
												<select name="paciente_id" class="form-control">
													<option value="">SELECCIONE</option>
													<?php foreach ($pacientes as $p) : ?>
														<option value="<?php echo $p->id; ?>"><?php echo $p->name . ' '.$p->lastname; ?></option>
													<?php endforeach; ?>
												</select>
											</div>											
										</div>
									</div>	
									
									<div class="row">
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon" id="basic-addon1">Categoria</span>
												<?php $category = CategoryData::getAll(); ?>
												<select name="category_id" class="form-control">
													<option value="">SELECCIONE</option>
													<?php foreach ($category as $p) : ?>
														<option value="<?php echo $p->id; ?>"><?php echo $p->name?></option>
													<?php endforeach; ?>
												</select>
											</div>											
										</div>
									</div>										

									<div class="row">
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-addon" id="basic-addon1">Documento</span>
												<input type="file" name="archivos[]" id="archivos" class="form-control" multiple="multiple">
											</div>											
										</div>
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								<button type="button" class="btn btn-primary" id="btnGuardarDocumentos">Guardar</button>
							</div>
						</div>
					</div>
				</div>
				<!--fin modal-->

				<!-- Modal -->
				<div class="modal fade" id="modalAgregarArchivos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="myModalLabel">Crear Archivo</h5>
							</div>
							<div class="modal-body">
								<form id="frmArchivos" enctype="multipart/form-data">
									<input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								<button type="button" class="btn btn-primary" id="btnGuardarArchivos">Guardar</button>
							</div>
						</div>
					</div>
				</div>
				<!--fin modal-->

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
				$users = array();
				if ((isset($_GET["q"]) && isset($_GET["category_id"])) && ($_GET["q"] != "" || $_GET["category_id"] != "")) {
					$sql = "select * from documentos where ";
					if ($_GET["q"] != "") {
						$sql .= " (nombre like '%$_GET[q]%') ";
					}

					if ($_GET["category_id"] != "") {
						if ($_GET["q"] != "") {
							$sql .= " and ";
						}

						$sql .= " archivo_id = " . $_GET["category_id"];
					}
					$users = DocumentoData::getBySQL($sql);
				} else {
					$users = DocumentoData::getArchivoGroup();
				}

				if (count($users) > 0) {
				?>
					<table class="table row-border table-hover compact" id="tablaGestorArchivosDataTable">
						<thead>
							<tr>
								<th>Archivo</th>
								<th>Fecha</th>
								<th>Visualizar</th>
							</tr>
						</thead>
						<?php
						$extensionesValidas = array('png', 'JPEG', 'jpg', 'jpeg');
						foreach ($users as $data) {
							$archivo = $data->getArchivo();
						?>
							<tr>
								<td data-titulo="Paciente"><?php echo $archivo->nombre; ?></td>
								<td data-titulo="Cedula"><?php echo $data->fecha; ?></td>
								<td data-titulo="Visualizar">
									
									<a class="btn btn-primary btn-sm" href="?view=tablaGestorArchivos&id=<?= $data->archivo_id ?>" >
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

<div id="spinner" class="spinner-container" style="display:none;">
  <div class="spinner"></div>
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
		$('#tablaGestorArchivosDataTable').DataTable();
	});
</script>