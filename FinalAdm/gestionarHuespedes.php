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
                         <a class='btn btn-danger'href='gestionarHuespedes.php?del={$data['id']}' style='color:white;'>
                        
                         <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                            </svg>
                       </svg>
                         </a>
                         <a href='agregarEmpleado.php?edit={$data['id']}' class='btn btn-success' style='color:white;'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                         </a>
                         <a href='agregarEmpleado.php?edit={$data['id']}' class='btn btn-' style='color:white;'>Ver Estado</a>
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