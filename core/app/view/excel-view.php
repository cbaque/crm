<?php  
$user_id = $_POST["user_id"];
$date_d = $_POST["date_d"];
$date_h = $_POST["date_h"];
if($date_d="" && $date_h=""){
	Core::alert("debe seleccionar fechas....");
}else{
    $conexion=mysqli_connect("localhost","primarys_soporte","Soporte2023*","primarys_soporte");               
    $sql="SELECT * FROM view_ticket ";
    $sql.=" where fecha_ingreso between \"$date_d\" and \"$date_h\" "; 
    $sql.="   and user_id=$user_id;";
    $dato = mysqli_query($conexion, $sql);
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=reporte.xls");
    header("Program: no-cache");
    header("Expires:0");

    if($dato -> num_rows >0){
    ?>
        <table>            
            <tr >
                <th>Ticket</th>
                <th>Titulo</th>
                <th>Detalle</th>
                <th>Fecha_ingreso</th>
                <th>Tipo</th>
                <th>Cliente</th>
                <th>Proyecto</th>
                <th>Categoria</th>
                <th>Prioridad</th>
                <th>Estado</th>
            </tr>
            <tbody>
    <?php   
        while($datos=mysqli_fetch_array($dato)){
        ?>
            <tr>
            <td><?php echo $datos['ticket']; ?></td>
            <td><?php echo utf8_decode($datos['titulo']); ?></td>
            <td><?php echo utf8_decode($datos['detalle']); ?></td>
            <td><?php echo $datos['fecha_ingreso']; ?></td>
            <td><?php echo $datos['tipo']; ?></td>
            <td><?php echo $datos['cliente']; ?></td>
            <td><?php echo $datos['proyecto']; ?></td> 
            <td><?php echo utf8_decode($datos['categoria']); ?></td>    
            <td><?php echo $datos['prioridad']; ?></td>    
            <td><?php echo $datos['estado']; ?></td> 
            </tr>      
        <?php
        }
        ?>
        </tbody>
        </table>
    <?php    
    }
}
?>

 