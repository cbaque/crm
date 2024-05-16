<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Reporte de Tickets</h4>
  </div>
  <div class="card-content table-responsive">


<form class="form-horizontal" role="form">
<input type="hidden" name="view" value="reports">
        <?php
$projects = ProjectData::getAll();
$priorities = PriorityData::getAll();
$statuses = StatusData::getAll();
$kinds = KindData::getAll();
$client= UserData::getAll();
        ?>

  <div class="form-group">

    <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-male"></i></span>
<select name="project_id" class="form-control">
<option value="">PROJECTO</option>
  <?php foreach($projects as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["project_id"]) && $_GET["project_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
		</div>
    </div>
    <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-support"></i></span>
<select name="priority_id" class="form-control">
<option value="">PRIORIDAD</option>
  <?php foreach($priorities as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["priority_id"]) && $_GET["priority_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
		</div>
    </div>
    <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon">INICIO</span>
		  <input type="date" name="start_at" value="<?php if(isset($_GET["start_at"]) && $_GET["start_at"]!=""){ echo $_GET["start_at"]; } ?>" class="form-control" placeholder="Palabra clave">
		</div>
    </div>
    <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon">FIN</span>
		  <input type="date" name="finish_at" value="<?php if(isset($_GET["finish_at"]) && $_GET["finish_at"]!=""){ echo $_GET["finish_at"]; } ?>" class="form-control" placeholder="Palabra clave">
		</div>
    </div>

  </div>
  <div class="form-group">

    <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon">ESTADO</span>
<select name="status_id" class="form-control">
  <?php foreach($statuses as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["status_id"]) && $_GET["status_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
		</div>
    </div>
    <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon">TIPO</span>
		  <select name="kind_id" class="form-control">
		  <option value="">TODOS</option>
  <?php foreach($kinds as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["kind_id"]) && $_GET["kind_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
		</div>
    </div>
 <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon">CLIENTE</span>
			<select name="client_id" class="form-control">
			<option value="">TODOS</option>
			<?php foreach($client as $p):?>
				<option value="<?php echo $p->id; ?>" <?php if(isset($_GET["client_id"]) && $_GET["client_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->name; ?></option>
			<?php endforeach; ?>
			</select>
		</div>
    </div>
    <div class="col-lg-3">
    <button class="btn btn-primary btn-block">Procesar</button>
    </div>

  </div>
</form>

		<?php
$users= array();
if((isset($_GET["status_id"]) && isset($_GET["kind_id"]) && isset($_GET["client_id"]) && isset($_GET["project_id"]) && isset($_GET["priority_id"]) && isset($_GET["start_at"]) && isset($_GET["finish_at"]) ) &&  ($_GET["status_id"]!="" ||$_GET["kind_id"]!="" || $_GET["client_id"]!="" || $_GET["project_id"]!="" || $_GET["priority_id"]!="" || ($_GET["start_at"]!="" && $_GET["finish_at"]!="") ) ) {
$sql = "select * from ticket where ";
if($_GET["status_id"]!=""){
	$sql .= " status_id = ".$_GET["status_id"];
}

if($_GET["kind_id"]!=""){
if($_GET["status_id"]!=""){
	$sql .= " and ";
}
	$sql .= " kind_id = ".$_GET["kind_id"];
}


if($_GET["project_id"]!=""){
if($_GET["status_id"]!=""||$_GET["kind_id"]!=""){
	$sql .= " and ";
}
	$sql .= " project_id = ".$_GET["project_id"];
}

if($_GET["priority_id"]!=""){
if($_GET["status_id"]!=""||$_GET["project_id"]!=""||$_GET["kind_id"]!=""){
	$sql .= " and ";
}

	$sql .= " priority_id = ".$_GET["priority_id"];
}

if($_GET["client_id"]!=""){
if($_GET["client_id"]!=""){
	$sql .= " and ";
}
	$sql .= " user_id = ".$_GET["client_id"];
}

if($_GET["start_at"]!="" && $_GET["finish_at"]){
if($_GET["status_id"]!=""||$_GET["project_id"]!="" ||$_GET["priority_id"]!="" ||$_GET["kind_id"]!="" ){
	$sql .= " and ";
}

	$sql .= " ( date(created_at) >= \"".$_GET["start_at"]."\" and date(created_at) <= \"".$_GET["finish_at"]."\" ) ";

}
$sql .= " order by created_at desc";
		$users = TicketData::getBySQL($sql);

}else{
		$users = TicketData::getAll();

}
		if(count($users)>0){
			// si hay usuarios
			$_SESSION["report_data"] = $users;
			?>
			<div class="panel panel-default">
			<div class="panel-heading">
			Reportes</div>
			<table class="table table-bordered table-hover">
			<thead>

			<th>Cliente</th>
			<th>No. Ticket</th>
			<th>Asunto</th>
			<th>Proyecto</th>
			<th>Tipo</th>
			<th>Categoria</th>
			<th>Prioridad</th>
			<th>Estado</th>
			<th>Fecha</th>
			<th>Ultima Actualizacion</th>
			<th></th>


			</thead>
			<?php
			$total = 0;
			foreach($users as $user){
				$project  = $user->getProject();
				$medic = $user->getPriority();
				$client = $user->getclient();
				?>
				<tr>
				<td width="70" height="70" ><img src="/uploads/<?php echo $client->foto;?>" alt="" /> </td>
				<td data-titulo="No. Ticket"><?php echo $user->id;?></td>
				<td data-titulo="Asunto"><?php echo $user->title; ?></td>
				<td data-titulo="Proyecto"><?php echo $project->name; ?></td>
				<td data-titulo="Tipo"><?php echo $user->getKind()->name; ?></td>
				<td data-titulo="Categoria"><?php echo utf8_encode($user->getCategory()->name); ?></td>
				<td data-titulo="Prioridad"><?php echo $medic->name; ?></td>
				<td data-titulo="Estado"><?php echo $user->getStatus()->name; ?></td>
				<td data-titulo="Fecha"><?php echo $user->created_at; ?></td>
				<td data-titulo="Update"><?php echo $user->updated_at; ?></td>
				<td style="width:90px;">
				<a href="index.php?view=editticketadmin&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<!--<a href="index.php?action=delticket&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>-->
				</td>
				</tr>
				<?php

			}
			echo "</table>";
			?>
			<div class="panel-body">

			</div>
			<?php



		}else{
			echo "<p class='alert alert-danger'>No hay tickets</p>";
		}


		?>

	</div>
</div>

	</div>
</div>
