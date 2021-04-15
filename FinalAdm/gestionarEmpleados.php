 <?php include("header.php");
 
    if(isset($_GET['del'])){
        $sql = "delete from empleados where id = {$_GET['del']}";
        $rs = conexion::execute($sql);
    }

 ?>
.$_GET['del']
<div class="container" style="max-width: 90%; margin-top:50px;">
    <h2>Empleados</h2>
     <a href="agregarEmpleado.php" class="btn btn-secondary" style="margin-top:25px; width:250px;">Añadir Empleado</a>
</div>
<div style="max-width: 90%; margin:50px auto; margin-bottom: 250px;">
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
                            <a class='btn btn-danger'href='gestionarEmpleados.php?del={$data['id']}' style='margin-right: 20px; width:100px;'>Eliminar</a>
                            <a href='agregarEmpleado.php?edit={$data['id']}' class='btn btn-success' style='width:100px;'>Editar</a>
                         </td>
                      </tr>
                   ";
               }
           
           ?>
       </tbody>
       </table>
</div>


<?php include("footer.php")?>



