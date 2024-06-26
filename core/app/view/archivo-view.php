<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Archivo</h4>
  </div>
  <div class="card-content table-responsive">
	<a href="index.php?view=newarchivo" class="btn btn-default"><i class='fa fa-th-list'></i> Nuevo Archivo</a>

		<?php

		$users = ArchivoData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
				<th>Numero</th>					
				<th>Nombre</th>
				<th>Fecha</th>
				<th style="width:80px;"></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->id; ?></td>
				<td><?php echo $user->nombre; ?></td>
				<td><?php echo $user->fechaInsert; ?></td>
				<td style="width:80px;" class="td-actions"><a href="index.php?view=editcategory&id=<?php echo $user->id;?>" rel="tooltip" title="Editar" class="btn btn-simple btn-warning btn-xs"><i class='fa fa-pencil'></i></a> <a href="./?action=delcategory&id=<?php echo $user->id;?>" rel="tooltip" title="Eliminar" class=" btn-simple btn btn-danger btn-xs"><i class='fa fa-remove'></i></a></td>
				</tr>
				<?php

			}
?>
</table>
<?php


		}else{
			echo "<p class='alert alert-danger'>No hay Archivos</p>";
		}


		?>

</div>
</div>
	</div>
</div>