<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  
  <link rel="shortcut icon" href="https://primarysoft.group/wp-content/uploads/2023/11/favicon-16x16-1.png">
  
  <title>Inicio</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
   <link href="assets/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.css">
  <link href="assets/css/material-dashboard.css" rel="stylesheet"/>
  <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <script src="assets/js/jquery.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="assets/css/estilos.css" />


<?php if(isset($_GET["view"]) && $_GET["view"]=="home"):?>
<link href='assets/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='assets/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='assets/fullcalendar/moment.min.js'></script>
<script src='assets/fullcalendar/fullcalendar.min.js'></script>
<?php endif; ?>

</head>

<body>
<?php if(isset($_SESSION["user_id"])):?>
  <div class="wrapper">
      <div class="sidebar" data-color="orange">
        <div class="logo">
          <a href="./" class="simple-text">
            Bienvenido a LIA CRM
          </a>
        </div>
        <div class="sidebar-wrapper">
              <ul class="nav">
                  <li class="">
                      <a href="./">
                          <i class="fa fa-home"></i>
                          <p>Inicio</p>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=tickets">
                          <i class="fa fa-ticket"></i>
                          <p>Pagos</p>
                      </a>                     
                  </li>
                  <li>
                      <a href="./?view=archivo">
                          <i class="fa fa-folder"></i>
                          <p>Archivos</p>
                      </a>
                  </li>
                   <li>
                      <a href="./?view=tablaGestor">
                          <i class="fa fa-folder"></i>
                          <p>documentos</p>
                      </a>
                  </li>
                  <?php if(Core::$user->kind==1):?>
                  <li>
                      <a href="./?view=projects">
                          <i class="fa fa-flask"></i>
                          <p>Proyectos</p>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=categories">
                          <i class="fa fa-th-list"></i>
                          <p>Categorias</p>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=departamento">
                          <i class="fa fa-th-list"></i>
                          <p>Departamento</p>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=reports">
                          <i class="fa fa-area-chart"></i>
                          <p>Reportes</p>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=users">
                          <i class="fa fa-users"></i>
                          <p>Usuarios</p>
                      </a>
                  </li>
                  <?php endif; ?>
              </ul>              
        </div>
      </div>
  

      <div class="main-panel">
      <nav class="navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./"><b>Gestor de Relación con los Clientes</b></a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user"></i>
                   &nbsp;<?php echo Core::$user->name." ".Core::$user->lastname; ?>
                </a>
                <ul class="dropdown-menu">
                  
                  <li class="divider"></li>
                  <li><a href="./?view=configuration"><i class="fa fa-cog"></i>   Configuracion</a></li>
                  <li class="divider"></li>
                  <li><a href="logout.php"><i class="fa fa-power-off"></i>    Salir</a></li>
                </ul>
              </li>
            </ul>
<!--
            <form class="navbar-form navbar-right" role="search">
              <div class="form-group  is-empty">
                <input type="text" class="form-control" placeholder="Search">
                <span class="material-input"></span>
              </div>
              <button type="submit" class="btn btn-white btn-round btn-just-icon">
                <i class="fa fa-search"></i><div class="ripple-container"></div>
              </button>
            </form>
            -->
          </div>
        </div>
      </nav>

      <div class="content">
      <div class="container-fluid">
<?php 
  // puedo cargar otras funciones iniciales
  // dentro de la funcion donde cargo la vista actual
  // como por ejemplo cargar el corte actual
  View::load("login");
  date_default_timezone_set('America/Guayaquil');
?>
</div>
      </div>

      <footer class="footer">
        <div class="container-fluid">
          <nav class="pull-left">
            <ul>
            </ul>
          </nav>
          <p class="copyright pull-right">
            <a href="#" target="_blank"> Primarysoft S.A.s</a> &copy; 2025 
          </p>
        </div>
      </footer>
    </div>
  </div>
<?php else:?>
  <?php 
  View::load("login");

?>

<?php endif;?>
</body>

  <!--   Core JS Files   -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/material.min.js" type="text/javascript"></script>
  <!--<script src="assets/js/popper.min.js"></script>-->
  <script src="assets/js/gestor.js"></script>
  
  <!--   Core mensajes   -->  
  <script src="assets/js/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
  <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>

  <!--  Charts Plugin -->
  <!--<script src="assets/js/chartist.min.js"></script>

  <!--  Notifications Plugin    -->
  <!--<!--<script src="assets/js/bootstrap-notify.js"></script>-->
  <!--<script src="assets/js/function.js"></script>

  <!--  Google Maps Plugin    -->
  <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <!-- <script src="assets/js/demo.js"></script>


  <!-- Material Dashboard javascript methods -->
  <script src="assets/js/material-dashboard.js"></script>

  <!--
  <script type="text/javascript">
      $(document).ready(function(){

      // Javascript method's body can be found in assets/js/demos.js
          demo.initDashboardPageCharts();

      });
  </script>
  -->

<script>

	var image_added = false;

	function display_image(file)
	{
		var img = document.querySelector(".js-image");
		img.src = URL.createObjectURL(file);

		image_added = true;
	}
 
	var myaction  = 
	{
		collect_data: function(e, data_type)
		{
			e.preventDefault();
			e.stopPropagation();

			var inputs = document.querySelectorAll("form input, form select");
			let myform = new FormData();
			myform.append('data_type',data_type);

			for (var i = 0; i < inputs.length; i++) {

				myform.append(inputs[i].name, inputs[i].value);
			}

			if(image_added)
			{
				myform.append('image',document.querySelector('.js-image-input').files[0]);
			}

			myaction.send_data(myform);
		},

		send_data: function (form)
		{

			var ajax = new XMLHttpRequest();

			document.querySelector(".progress").classList.remove("d-none");

			//reset the prog bar
			document.querySelector(".progress-bar").style.width = "0%";
			document.querySelector(".progress-bar").innerHTML = "Working... 0%";

			ajax.addEventListener('readystatechange', function(){

				if(ajax.readyState == 4)
				{
					if(ajax.status == 200)
					{
						//all good
						myaction.handle_result(ajax.responseText);
					}else{
						console.log(ajax);
						alert("An error occurred");
					}
				}
			});

			ajax.upload.addEventListener('progress', function(e){

				let percent = Math.round((e.loaded / e.total) * 100);
				document.querySelector(".progress-bar").style.width = percent + "%";
				document.querySelector(".progress-bar").innerHTML = "Working..." + percent + "%";
			});

		},
  }
		
		
</script>

</html>
