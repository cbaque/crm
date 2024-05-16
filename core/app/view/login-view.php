
<?php

if(Session::getUID()!=""){
		print "<script>window.location='index.php?view=home';</script>";
}

?>
<head>
	<!--<link href="assets/css/fondo.css" rel="stylesheet" />-->
	<br><br>
	<center><img src="https://primarysoft.group/wp-content/uploads/2023/10/PrimarySoft_variations_BORDE_H.png"  width="300" height="150"></center>
</head>
<center>
<!--<body background= "https://primarysoft.group/wp-content/uploads/2023/11/banner-low-bg-2-scaled.jpg" >-->
<body>
<br><br><br>
<div class="container">
<div class="row">
    	<div class="col-md-4 col-md-offset-4">
    	<?php if(isset($_COOKIE['password_updated'])):?>
    		<div class="alert alert-success">
    		<p><i class='glyphicon glyphicon-off'></i> Se ha cambiado la contraseña exitosamente !!</p>
    		<p>Pruebe iniciar sesion con su nueva contraseña.</p>

    		</div>
    	<?php setcookie("password_updated","",time()-18600);
    	 endif; ?>

<div class="card">
  <div class="card-header" data-background-color="orange">
      <h4 class="title">Bienvenido a LIA CRM</h4>
  </div>
  <div class="card-content table-responsive">
			    	<form accept-charset="UTF-8" role="form" method="post" action="index.php?view=processlogin">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Usuario" name="mail" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
			    		</div>
						<!--
						<div class="input-group">
							<input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
							<span class="input-group-addon"><i class="fa fa-eye-slash icon""></i></span>
						</div>
						-->

			    		<input class="btn btn-primary btn-block" type="submit" value="Iniciar Sesion">
			    	</fieldset>
			      	</form>
			      	</div>
			      	</div>
		</div>
	</div>
</div>
</body>
</center>
<!--
<script type="text/javascript">
function mostrarPassword(){
		var cambio = document.getElementById("txtPassword");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
</script>
-->