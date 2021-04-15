<?php 
include('head.php');
 include('redes.php');
 if(isset($_GET['del'])){

     $sql = "delete from empleados where id = {$_GET['del']}";
     $rs = conexion::execute($sql);

     $fecha= (new DateTime())->format('Y/m/d H:i:s'); 
     $sql2 = "INSERT INTO log_huesped(usuario_operario, usuario_afectado, accion, fecha_hora) VALUES ('Administrador', 'Empleado', 'Eliminó Empleado', '{$fecha}')";
     $rs = conexion::execute($sql2);
 }
?>

<div style="max-width: 80%;" class="container">
<?php  ?> <br> <br>

<div>
 <h2>Huéspedes</h2>
  <a href="register.php" class="btn btn-secondary" style="margin-top:25px; width:250px;color:white;">Nuevo Húesped</a>
  <br> <br><br>
    <table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Cédula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Celular</th>
            <th scope="col">Email</th>
            <th scope="col">Provincia</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $sql = "SELECT * FROM reservadores_huesped";
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
                      <td>{$data['provincia']}</td>
                      <td>
                         <a class='btn btn-danger'href='gestionarHuespedes.php?del={$data['id']}' style='color:white;'>Eliminar</a>
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

<?php include("footer.php")?>