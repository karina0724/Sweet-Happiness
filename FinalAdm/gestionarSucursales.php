<?php include("head.php");
 
 if(isset($_GET['del'])){

     $sql = "delete from sucursales where id = {$_GET['del']}";
     $rs = conexion::execute($sql);

     $fecha= (new DateTime())->format('Y/m/d H:i:s'); 
     $sql2 = "INSERT INTO log_huesped(usuario_operario, usuario_afectado, accion, fecha_hora) VALUES ('Administrador', 'Sucursal ('{$_GET['del']}')', 'Eliminó Sucursal', '{$fecha}')";
     $rs = conexion::execute($sql2);
 }

 if($_POST){
    extract($_POST);
    $fecha= (new DateTime())->format('Y/m/d H:i:s'); 

      if(isset($_GET['edit'])){

        $id = $_GET['edit'];
        $sql="update sucursales set direccion = '{$direccion}', provincia = '{$provincia}' where id= '{$id}'";
        
        $rs = conexion::execute($sql); 
        
        $sql2 = "INSERT INTO log_huesped(usuario_operario, usuario_afectado, accion, fecha_hora) VALUES ('Administrador', 'Empleado', 'Modificó Empleado', '{$fecha}')";
        $rs = conexion::execute($sql2);
      }
      else{
            $sql = "INSERT INTO empleados(id_sucursales, cédula, nombre, apellido, teléfono, celular, correo, contraseña, rol_hotel, rol) VALUES ('{$sucursal}','{$cedula}','{$nombre}','{$apellido}','{$telefono}','{$celular}','{$correo}','{$contraseña}','{$rolHotel}','2')";

            $rs = conexion::execute($sql);

            $sql2 = "INSERT INTO log_huesped(usuario_operario, usuario_afectado, accion, fecha_hora) VALUES ('Administrador', 'Empleado', 'Agregó Empleado', '{$fecha}')";
            $rs = conexion::execute($sql2);
      }
      header("Location: gestionarEmpleados.php"); 
 }

?>

<div class="container" style="max-width: 90%; margin-top:50px;">
 <h2>Sucursales</h2>
 <button data-toggle='modal' data-target='#modalRegistrarSucursal' class='btn btn-secondary' style="margin-top:25px; width:250px;color:white;">Nueva Sucursal</button>

</div>
<div style="max-width: 90%; margin:50px auto; margin-bottom: 250px;">
    <table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Provincia</th>
            <th scope="col">Dirección</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $sql = "SELECT * FROM sucursales";
            $rs = conexion::query_array($sql);

            foreach($rs as $data)
            {
                echo "
                   <tr>
                      <td>{$data['id']}</td>
                      <td>{$data['provincia']}</td>
                      <td>{$data['direccion']}</td>
                      <td>
                            <a class='btn btn-danger'href='gestionarSucursales.php?del={$data['id']}' style='margin-right: 20px; width:100px;color:white;'>Eliminar</a>
                            <button data-toggle='modal' data-target='#modalRegistrarSucursal' class='btn btn-success'>Editar</button>
                         </td>
                   </tr>
                ";
            }
        
        ?>
    </tbody>
    </table>

     <!-- Vertically centered login modal -->
     <div class="modal" tabindex="-1" role="dialog" id="modalRegistrarSucursal" aria-labelledby="titulo-modal2" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                <div class="foto">
                  <img src="img/logo.png" class="logo-modal" alt="Sweet Happineess">
                </div>
                <form method="POST" class="mb-2" action="loguear.php">
                    <div class="form-group">
                        <label for="provincia" class="font-weight-bold">Provincia</label>
                        <input type="text" class="form-control" id="provincia" placeholder="Provincia" name="provincia">
                    </div>
                    <div class="form-group">
                        <label for="password" class="font-weight-bold">Dirección</label>
                        <input type="text" class="form-control" id="direccion" placeholder="Dirección" name="direccion">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn col-12" style="margin: 5px auto;">Guardar</button>
                    </div>
                </form>    
              </div>
            </div>
        </div>
      <!-- End Vertically centered login modal -->
</div>


<?php include("footer.php")?>



