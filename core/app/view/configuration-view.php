
<?php $conf = UserData::getById($_SESSION["user_id"]);?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
		<div class="card-header" data-background-color="blue">
			<h4 class="title">Editar Perfil</h4>
		</div>
		<div class="card-content table-responsive">

			<form class="form-horizontal" role="form" id="changepasswd" method="post" action="./?action=updateusercon" enctype="multipart/form-data">
				<div class="form-group" >
					<div class="col-md-6 text-center">
						<img src="/uploads/<?php echo $conf->foto; ?>" class="img-avatar" style="width: 180px;height:180px;object-fit: cover;">
						<div>
							<div class="md-5">
							<label for="formFile" class="form-label">Click abajo para seleccionar imagen</label>
							<input onchange="display_image(this.files[0])" class="js-image-input form-control" type="file" name="foto">
							</div>
							<div><small class="js-error js-error-image text-danger"></small></div>
						</div>
					</div>
				<div>
				<table>
					<tr><th  > </th></tr>
					<tr><th><i class="fa fa-envelope"></i>  Email</th>
						<td style="width:600px">
						<textarea class="form-control" name="email" required placeholder="email"><?php echo $conf->email; ?></textarea>
						<!--<div><small class="js-error js-error-email text-danger"></small></div>-->
						</td>
					</tr>
					<tr><th><i class="fa fa-edit"></i> Name</th>
						<td>
							<input value="<?php echo $conf->name; ?>" type="text" class="form-control" name="name" placeholder="First name">
							<div><small class="js-error js-error-firstname text-danger"></small></div>
						</td>
					</tr>
					<tr><th><i class="fa fa-edit"></i> Last name</th>
						<td>
							<input value="<?php echo $conf->lastname; ?>" type="text" class="form-control" name="lastname" placeholder="Last name">
							<div><small class="js-error js-error-lastname text-danger"></small></div>
						</td>
					</tr>
					<tr><th><i class="fa fa-key"></i> Password</th>
						<td>
							<input type="password" class="form-control" name="password" placeholder="Password (leave empty to keep old password)">
							<div><small class="js-error js-error-password text-danger"></small></div>
						</td>
					</tr>
					<tr style="width:100px"><th><i class="fa fa-key"></i> Retype Password     </th>
						<td>
							<input type="password" class="form-control" name="confirmnewpassword" placeholder="Retype Password">
						</td>
					</tr>
				</table>

				<div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">			
						<input type="hidden" name="user_id" value="<?php echo $conf->user_id; ?>">			
						<button type="submit" class="btn btn-primary">Actualizar</button>						
						<a href="./">
							<label class="btn btn-secondary">Back</label>
						</a>
					</div>
				</div>
			</form>
			<script>
				$("#changepasswd").submit(function(e){
					if($("#newpassword").val()=="" || $("#confirmnewpassword").val()==""){
						e.preventDefault();
						alert("No debes dejar espacios vacios.");

					}else{
						if($("#newpassword").val() == $("#confirmnewpassword").val()){
				//			alert("Correcto");			
						}else{
							e.preventDefault();
							alert("Las nueva contraseña no coincide con la confirmacion.");
						}
					}
				});
			</script>
		</div>
	</div>
</div>
