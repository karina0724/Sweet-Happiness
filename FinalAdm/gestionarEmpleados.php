<?php 
include('header.php');
 include('redes.php');
 if(isset($_GET['del'])){

     $sql = "delete from empleados where id = {$_GET['del']}";
     $rs = conexion::execute($sql);

     $fecha= (new DateTime())->format('Y/m/d H:i:s'); 
     $sql2 = "INSERT INTO log_huesped(usuario_operario, usuario_afectado, accion, fecha_hora) VALUES ('Administrador', 'Empleado', 'Eliminó Empleado', '{$fecha}')";
     $rs = conexion::execute($sql2);
 }
?>

<?php
    if(isset($_SESSION['initialization_sistem'])){
        if(isset($_SESSION['admin']) == 1){
?>
<div style="max-width: 80%;" class="container">
<?php  ?> <br> <br>

<div>
 <h2>Empleados</h2>
  <a href="agregarEmpleado.php" class="btn btn-secondary" style="margin-top:25px; width:250px;color:white;">Añadir Empleado</a>

    <table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Cédula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Celular</th>
            <th scope="col">Email</th>
            <th scope="col">Rol</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $sql = "SELECT * FROM empleados";
            $rs = conexion::query_array($sql);

            foreach($rs as $data)
            {
                echo "
                   <tr>
                      <td>{$data['cédula']}</td>
                      <td>{$data['nombre']}</td>
                      <td>{$data['apellido']}</td>
                      <td>{$data['teléfono']}</td>
                      <td>{$data['celular']}</td>
                      <td>{$data['correo']}</td>
                      <td>{$data['rol_hotel']}</td>
                      <td>
                         <a class='btn btn-danger'href='gestionarEmpleados.php?del={$data['id']}' style='color:white;'>Eliminar</a>
                         <a href='agregarEmpleado.php?edit={$data['id']}' class='btn btn-success' style='color:white;'>Editar</a>
                      </td>
                   </tr>
                ";
            }
        
        ?>
    </tbody>
    </table>
   <hr>
   </div>
       
</div>
</div>
<!--end contacto-->
</div>
<!--end bg1-->

</body>
<?php }else{
    echo "
    <br><br>
    <div class='container col-md-6'>
        <div class='alert alert-danger' role='alert'>
            No eres Administrador
        </div>
    </div>
    <br>
  ";
} 
}else { echo "
    <br><br>
    <div class='container col-md-6'>
        <div class='alert alert-danger' role='alert'>
            Tienes que registrarte
        </div>
    </div>
    <br>
  "; } ?>

<?php include("footer.php")?>