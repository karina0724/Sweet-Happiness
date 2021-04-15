 <?php 
 
    if(isset($_GET['del'])){

        $sql = "delete from empleados where id = {$_GET['del']}";
        $rs = conexion::execute($sql);

        $fecha= (new DateTime())->format('Y/m/d H:i:s'); 
        $sql2 = "INSERT INTO log_huesped(usuario_operario, usuario_afectado, accion, fecha_hora) VALUES ('Administrador', 'Empleado', 'Eliminó Empleado', '{$fecha}')";
        $rs = conexion::execute($sql2);
    }
include('redes.php');

?>
<!--end menu-h-->




<?php include("footer.php")?>




