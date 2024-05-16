<?php $user_id = $_SESSION["user_id"];?>
<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="orange">
									<i class="fa fa-clock-o"></i>
								</div>
								<div class="card-content">
									<p class="category">Pendientes</p>
									<h3 class="title"><?php echo count(TicketData::getAllPendings($user_id));?></h3>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="green">
									<i class="fa fa-cog"></i>
								</div>
								<div class="card-content">
									<p class="category">En Desarrollo</p>
									<h3 class="title"><?php echo count(TicketData::getAllworkings($user_id));?></h3>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="blue">
									<i class="fa fa-check"></i>
								</div>
								<div class="card-content">
									<p class="category">Terminado</p>
									<h3 class="title"><?php echo count(TicketData::getAllend($user_id));?></h3>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="red">
									<i class="fa fa-trash-o"></i>
								</div>
								<div class="card-content">
									<p class="category">Cancelado</p>
									<h3 class="title"><?php echo count(TicketData::getAllcancel($user_id));?></h3>
								</div>
							</div>
						</div>
					</div>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
<?php
$conexion=mysqli_connect("localhost","primarys_soporte","Soporte2023*","primarys_soporte");               
$sql="SELECT categoria,count(categoria)as cantidad FROM view_ticket ";
$sql.=" where user_id=$user_id  group by categoria;";
$dato = mysqli_query($conexion, $sql);
 while($datos=mysqli_fetch_array($dato)){
	echo "['".$datos['categoria']."', " .$datos['cantidad']."],";
 }
?>
        ]);

        var options = {
          title: 'Categorias'

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
	  google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {
        var data2 = google.visualization.arrayToDataTable([
          ['Mes', 'Sales'],
		  
<?php
/*
$sql="SET lc_time_names = 'es_ES'; ";
$sql.="  SELECT UPPER(MONTHNAME(fecha_ingreso)) mes,modulo,count(*) cant "; 
$sql.="    FROM view_ticket "; 
$sql.="   where user_id=$user_id and year(fecha_ingreso)=year(now()) and month(fecha_ingreso)=month(now()) ";
$sql.="group by modulo, MONTHNAME(fecha_ingreso); ";

$dato2 = mysqli_query($conexion, $sql);
 while($datos2=mysqli_fetch_array($dato2)){
	echo "['".$datos2['mes']."', " .$datos2['cant']."],";
 }
 */
?>

         /* ['2014', 1000, 400, 200],
          ['2015', 1170, 460, 250],
          ['2016', 660, 1120, 300],
          ['2017', 1030, 540, 350]*/
        ]);

        var options2 = {
          chart: {
            title: 'Modulos',
            //subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart2 = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data2, google.charts.Bar.convertOptions(options));
      }
	  
    </script>
	<!--<link rel="stylesheet" href="estilos.css" />-->
  </head>
 <body>
 <table>
	<tr>
		<td>
		<div id="piechart" style="width: 400px; height: 500px;border: 3px solid #efefef"></div>
		</td>
		<td>
		<div id="columnchart_material" style="width: 800px; height: 500px;border: 3px solid #efefef"></div>
		</td>
	</tr>
</table>
  </body> 
</html>

