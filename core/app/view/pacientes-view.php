<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Pacientes</h4>
            </div>
            <div class="card-content table-responsive">

                <a href="index.php?view=pacientesnew" class="btn btn-default"><i class='fa fa-user-md'></i> Nuevo Paciente</a>
                <br>
                <?php

                $patients = PacienteData::getAll();
                if (count($patients) > 0) {
                ?>
                    <table class="table row-border table-hover compact" id="tablePatients">
                        <thead>
                            <th style="text-align: center;">Identificaci&oacute;n</th>
                            <th style="text-align: center;">Nombres Completos</th>
                            <th style="text-align: center;">Activo</th>
                            <th style="text-align: center;">Fecha Registro</th>
                            <th></th>
                        </thead>
                        <?php
                        foreach ($patients as $data) {
                        ?>
                            <tr>
                                <td data-titulo="Identificacion" style="text-align: center;"><?php echo $data->identificacion; ?></td>
                                <td data-titulo="Nombre" style="text-align: center;"><?php echo $data->name . " " . $data->lastname; ?></td>
                                <td data-titulo="Activo" style="text-align: center;">
                                    <?php if ($data->is_active) : ?>
                                        <i class="fa fa-check"></i>
                                    <?php endif; ?>
                                </td>
                                <td data-titulo="Fecha" style="text-align: center;"><?php echo $data->created_at; ?></td>
                                <td style="text-align: center;">
                                    <a href="index.php?view=edituser&id=<?php echo $data->id; ?>" class="btn btn-warning btn-xs">Editar</a>
                                    <a href="index.php?action=deluser&id=<?php echo $data->id; ?>" class="btn btn-danger btn-xs">Eliminar</a>
                                </td>
                            </tr>
                        <?php

                        }
                        ?>
                    </table>
                <?php
                } else {
                    echo "<p class='alert alert-danger'>No hay pacientes registrados.</p>";
                }
                ?>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#tablePatients').DataTable();
	});
</script>