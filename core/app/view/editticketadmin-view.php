<?php
$reservation = TicketData::getById($_GET["id"]);
$projects = ProjectData::getAll();
$priorities = PriorityData::getAll();
$modules = ModulesData::getAll();
$kinds = KindData::getAll();
$categories = CategoryData::getAll();
$statuses = StatusData::getAll();

?>

<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Modificar Ticket</h4>
  </div>
  <div class="card-content table-responsive">
<form class="form-horizontal" role="form" method="post" action="./?action=updateticketadmin" enctype="multipart/form-data">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
    <div class="col-lg-3">
      <select name="kind_id" class="form-control" required>
  <?php foreach($kinds as $p):?>
    <option value="<?php echo $p->id; ?>"<?php if($p->id==$reservation->kind_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
      </select>
    </div>

    <label for="inputEmail1" class="col-lg-2 control-label">Proyecto</label>
    <div class="col-lg-3">
        <select name="project_id" class="form-control" required>
        <option value="">-- SELECCIONE --</option>
  <?php foreach($projects as $p):?>
    <option value="<?php echo $p->id; ?>"<?php if($p->id==$reservation->project_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
        </select>
    </div>
</div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Titulo</label>
    <div class="col-lg-3">
      <input type="text" name="title" value="<?php echo $reservation->title; ?>" required class="form-control" id="inputEmail1" placeholder="Titulo">
    </div>
 
    <label for="inputEmail1" class="col-lg-2 control-label">Adjunto</label>
    <div class="col-lg-3">
      <input type="file" class="is-fileinput" name="adjunto" accept="image/png, image/jpeg,image/bmp,.xlsx,.xls,.doc,.docx,.pdf" >
      <?php if ($reservation->adjunto !=""): ?>
        <label for="inputEmail1" class="col-lg-2 control-label" name="seleccionado"><?php echo $reservation->adjunto; ?></label>              
      <?php endif ?>
    </div>       
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
    <div class="col-lg-8">
    <textarea class="form-control" name="description" required placeholder="Descripcion"><?php echo $reservation->description;?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Categoria</label>
    <div class="col-lg-3">
      <select name="category_id" class="form-control" required>
      <option value="">-- SELECCIONE --</option>
        <?php foreach($categories as $p):?>
          <option value="<?php echo $p->id; ?>"<?php if($p->id==$reservation->category_id){ echo "selected"; }?>><?php echo utf8_encode($p->name); ?></option>
        <?php endforeach; ?>
      </select>
    </div>

      <label for="inputEmail1" class="col-lg-2 control-label">Prioridad</label>
      <div class="col-lg-3">
        <select name="priority_id" class="form-control" required>
        <option value="">-- SELECCIONE --</option>
  <?php foreach($priorities as $p):?>
    <option value="<?php echo $p->id; ?>"<?php if($p->id==$reservation->priority_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
        </select>
      </div>
    </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Modulo</label>
    <div class="col-lg-3">
        <select name="module_id" class="form-control" required>
        <option value="">-- SELECCIONE --</option>
  <?php foreach($modules as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->modules_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
        </select>
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">Usuario</label>
    <div class="col-lg-3">
      <input type="text" name="usuario" value="<?php echo $reservation->usuario; ?>" required class="form-control" id="inputEmail1" placeholder="Usuario">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Estado</label>
    <div class="col-lg-3">
      <select name="status_id" class="form-control" required>
        <?php foreach($statuses as $p):?>
          <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->status_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
     <input type="hidden" name="user_id" value="<?php echo $reservation->id; ?>">
      <button type="submit" class="btn btn-default">Actualizar Ticket</button>
    </div>
  </div>
</form>
<script>
				$("#seleccionado").submit(function(e){
					if(filetype($("#newpassword").val())==".docx" || filetype($("#newpassword").val())==".doc"){
						header("Content-type: application/msword");
            header("Content-Disposition: inline; filename='uploads/'.$("#newpassword").val()");


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
</div>

