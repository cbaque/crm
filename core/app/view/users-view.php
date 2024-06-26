<div class="row">
	<div class="col-md-12">

<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Usuarios</h4>
  </div>
  <div class="card-content table-responsive">


	<a href="index.php?view=newuser" class="btn btn-default"><i class='fa fa-user'></i> Nuevo Usuario</a>
<br>
		<?php
		
		?>
		<?php

		$users = UserData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Foto</th>			
			<th>Nombre completo</th>
			<th>Email</th>
			<th>Username</th>
			<th>Activo</th>
			<th>Tipo</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td width="70" height="70" ><img src="/uploads/<?php echo $user->foto;?>" alt="" /> </td>
				<td data-titulo="Nombre"><?php echo $user->name." ".$user->lastname; ?></td>				
				<td data-titulo="Email"><?php echo $user->email; ?></td>
				<td data-titulo="Username"><?php echo $user->username; ?></td>
				<td data-titulo="Activo">
					<?php if($user->is_active):?>
						<i class="fa fa-check"></i>
					<?php endif; ?>
				</td>
				<td data-titulo="Tipo">
					<?php if($user->kind==1):?>
					Administrador
					<?php elseif($user->kind==2):?>
					Usuario
					<?php endif; ?>
				</td>
				<td style="width:180px;">
				<a href="index.php?view=edituser&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?action=deluser&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				</td>
				</tr>
				<?php

			}
			?>
			</table>
			<?php



		}else{
			// no hay usuarios
		}


		?>

</div>
</div>
	</div>
</div>