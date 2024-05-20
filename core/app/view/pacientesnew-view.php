<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Registrar Paciente</h4>
            </div>
            <div class="card-content table-responsive">

                <form class="form-horizontal" method="post" id="addproduct" action="./?action=addpaciente" role="form">

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Identificaci&oacute;n*</label>
                        <div class="col-md-6">
                            <input type="text" name="identificacion" class="form-control" id="identificacion" placeholder="Cédula / Ruc">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
                        <div class="col-md-6">
                            <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-lg-offset-2 col-lg-2">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>

                        <div class="col-lg-2">
                            <a href="index.php?view=pacientes" class="btn btn-default">Cancelar</a>
                        </div>                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>