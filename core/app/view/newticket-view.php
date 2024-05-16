<?php
$projects = ProjectData::getAll();
$priorities = PriorityData::getAll();

//$statuses = StatusData::getAll();
$modules = ModulesData::getAll();
$kinds = KindData::getAll();
$categories = CategoryData::getAll();

?>

<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Nuevo Registro</h4>
  </div>
  <div class="card-content table-responsive">
<form class="form-horizontal" role="form" method="post" action="./?action=addticket" enctype="multipart/form-data">

  <div class="form-group">
  
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
    <div class="col-lg-3">
      <select name="kind_id" class="form-control" required>
  <?php foreach($kinds as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
      </select>
    </div>

    <label for="inputEmail1" class="col-lg-2 control-label">Adjunto</label>
    <div class="col-lg-3">
      <input type="file" class="is-fileinput" name="adjunto" accept="image/png, image/jpeg,image/bmp,.xlsx,.xls,.doc,.docx,.pdf" >
    </div> 

  </div>

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Solicitud</label>
    <div class="col-lg-3">
      <input type="date" name="fecha_sol" required value="<?php if(isset($_GET["fecha_sol"]) && $_GET["fecha_sol"]!=""){ echo $_GET["fecha_sol"]; } ?>" class="form-control" id="inputEmail1">
    </div>

    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Pago</label>
    <div class="col-lg-3">
      <input type="date" name="fecha_pag" required value="<?php if(isset($_GET["fecha_pag"]) && $_GET["fecha_pag"]!=""){ echo $_GET["fecha_pag"]; } ?>" class="form-control" id="inputEmail1">
    </div>
</div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Departamento</label>
    <div class="col-lg-3">
        <select name="module_id" class="form-control" required>
        <option value="">-- SELECCIONE --</option>
  <?php foreach($modules as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
        </select>
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">Responsable</label>
    <div class="col-lg-3">
      <input type="text" name="usuario" required class="form-control" id="inputEmail1" placeholder="Usuario">
    </div>
  </div>

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Categoria</label>
    <div class="col-lg-3">
      <select name="category_id" class="form-control" required>
      <option value="">-- SELECCIONE --</option>
        <?php foreach($categories as $p):?>
          <option value="<?php echo $p->id; ?>"><?php echo utf8_encode($p->name); ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <label for="inputEmail1" class="col-lg-2 control-label">Linea de negocio</label>
    <div class="col-lg-3">
        <select name="project_id" class="form-control" required>
        <option value="">-- SELECCIONE --</option>
  <?php foreach($projects as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
        </select>
    </div>
</div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Beneficiario</label>
    <div class="col-lg-3">
      <input type="text" name="title" required class="form-control" id="inputEmail1" placeholder="Titulo">
    </div>
 
    <label for="inputEmail1" class="col-lg-2 control-label">Valor</label>
    <div class="col-lg-3">
      <input type="text" name="valor" required class="form-control" id="inputEmail1" placeholder="Valor">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Concepto</label>
    <div class="col-lg-8">
      <textarea class="form-control" name="description" required placeholder="Concepto"></textarea>
    </div>
  </div>



  <div class="form-group">


      <label for="inputEmail1" class="col-lg-2 control-label">Prioridad</label>
      <div class="col-lg-3">
        <select name="priority_id" class="form-control" required>
        <option value="">-- SELECCIONE --</option>
  <?php foreach($priorities as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
        </select>
      </div>
    </div>




  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Agregar solicitud</button>
    </div>
  </div>
</form>
</div>
</div>
</div>
</div>