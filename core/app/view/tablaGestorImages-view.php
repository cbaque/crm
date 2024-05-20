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
				<!-- <span class="btn btn-info" id="btnarch">
					Crear Archivo
				</span>

				<span class="btn btn-info" id="btndoc">
					Agregar Documento
				</span> -->

				<a class="btn btn-default" href="?view=tablaGestor" >
					Regresar	
				</a>


				<!-- Modal -->
				<div class="modal fade" id="modalAgregarDocumento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="myModalLabel">Subir documento</h5>
							</div>
							<div class="modal-body">
								<form id="frmDocumentos" enctype="multipart/form-data">
									<?php $archivo2 = ArchivoData::getAll(); ?>
									<label>Archivo</label>
									<select name="category_id" class="form-control">
										<option value="">SELECCIONE</option>
										<?php foreach ($archivo2 as $p) : ?>
											<option value="<?php echo $p->id; ?>" <?php if (isset($_GET["category_id"]) && $_GET["category_id"] == $p->id) {
																						echo "selected";
																					} ?>><?php echo utf8_encode($p->nombre); ?></option>
										<?php endforeach; ?>
									</select>
									<div class="modal-body">
										<input type="text" name="namepac" required class="form-control" id="namepac" placeholder="Nombre">
									</div>
									<div class="modal-body">
										<input type="text" name="cedulapac" required class="form-control" id="cedulapac" placeholder="Cedula">
									</div>

									<label>Selecciona Documento</label>
									<input type="file" name="archivos[]" id="archivos" class="form-control" multiple="multiple">
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

				<br><br>
				<!-- <form class="form-horizontal" role="form">
					<input type="hidden" name="view" value="documentos">

					<div class="form-group">
						<div class="col-lg-2">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-search"></i></span>
								<input type="text" name="q" value="<?php if (isset($_GET["q"]) && $_GET["q"] != "") {
																		echo $_GET["q"];
																	} ?>" class="form-control" placeholder="Nombre">
							</div>
						</div>
						<div class="col-lg-2">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-th-list"></i></span>
								<select name="category_id" class="form-control">
									<option value="">ARCHIVO</option>
									<?php foreach ($archivo as $p) : ?>
										<option value="<?php echo $p->id; ?>" <?php if (isset($_GET["category_id"]) && $_GET["category_id"] == $p->id) {
																					echo "selected";
																				} ?>><?php echo utf8_encode($p->nombre); ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="col-lg-2">
							<button class="btn btn-primary btn-block">Buscar</button>
						</div>
					</div>
				</form> -->
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