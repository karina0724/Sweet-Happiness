<?php 
ob_start();
include("header.php");

if($_POST){
    extract($_POST);
    $contraseña = $contraseña; 
    $fecha= (new DateTime())->format('Y/m/d H:i:s'); 

      if(isset($_GET['edit'])){

        $id = $_GET['edit'];
        $sql="update empleados set id_sucursales = '{$sucursal}', cédula= '{$cedula}', nombre= '{$nombre}',  apellido= '{$apellido}', teléfono= '{$telefono}', celular= '{$celular}', correo= '{$correo}', contraseña= '{$contraseña}', rol_hotel= '{$rolHotel}' where id= '{$id}'";
        
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
if(isset($_GET['edit'])){
 
    $sql= "select * from empleados where id= ". $_GET['edit'];
    $rs = conexion::query_array($sql);

    if(count($rs) > 0){
        $data = $rs[0];
        $_POST= $data;  
    }
}
ob_end_flush();
?>
<div style="max-width: 80%;" class="container">
<div class="container d-flex flex-row justify-content-between" style="margin-top:50px;" >
    <h2>Registro de Empleados</h2>
     <a href="gestionarEmpleados.php" class="btn btn-secondary" style="color:white; width:250px; font-size: 18px;">Consultar Empleados</a>
</div>
<div style="max-width: 80%; margin:50px auto; margin-bottom: 150px;">
    
            <form method="POST" class="needs-validation" novalidate>        
                <div class="form-row">
                    <div class="form-group col-md-6">
                         <label for="nombre">Nombre</label>
                         <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $_POST['nombre']; ?>" placeholder="Nombre">
                    </div>
                    <div class="form-group col-md-6">
                         <label for="apellido">Apellido</label>
                         <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $_POST['apellido']; ?>" placeholder = "Apellido">
                    </div>
                </div>
                <div class="form-group">
                        <label for="cedula">Cédula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" placeholder = "Cédula" value="<?php echo $_POST['cédula']; ?>">
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                        <label for="rolHotel">Cargo</label>
                            <select name="rolHotel" class="form-control" id="rolHotel" required>
                            <?php 
                               if(isset($_GET['edit'])){
                                   ?><option value=<?php echo $_POST['rol_hotel'];?>><?php echo $_POST['rol_hotel'];?></option><?php
                                   $sql = "SELECT * FROM roles_hotel WHERE nombre != '{$_POST['rol_hotel']}'";
                                   $rs = conexion::query_array($sql);
                                   foreach($rs as $data)
                                   {
                                      echo "
                                         <option value='{$data['nombre']}'>{$data['nombre']}</option>
                                      ";
                                   }
                               }
                               else{
                                   ?> <option value=0>Seleccione una opción</option><?php
                                   $sql = "SELECT * FROM roles_hotel";
                                   $rs = conexion::query_array($sql);
                                   foreach($rs as $data)
                                   {
                                      echo "
                                         <option value='{$data['nombre']}'>{$data['nombre']}</option>
                                      ";
                                   }
                               }
                            ?>
                           </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="sucursal">Sucursal</label>
                            <select name="sucursal" class="form-control" id="sucursal" required>
                            <?php 
                               if(isset($_GET['edit'])){
                                   ?> <option value=<?php echo $_POST['id_sucursales']; ?>><?php echo $_POST['id_sucursales'];?></option><?php
                                   $sql = "SELECT * FROM sucursales WHERE provincia != '{$_POST['id_sucursales']}'";
                                   $rs = conexion::query_array($sql);
                                   foreach($rs as $data)
                                   {
                                      echo "
                                         <option value='{$data['id']}'>{$data['provincia']}</option>
                                      ";
                                   }
                               }
                               else{
                                ?> <option value=0>Seleccione una opción</option><?php
                                $sql = "SELECT * FROM sucursales";
                                $rs = conexion::query_array($sql);
                                foreach($rs as $data)
                                {
                                   echo "
                                      <option value='{$data['id']}'>{$data['provincia']}</option>
                                   ";
                                }
                            }
                            ?>
                           
                           </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $_POST['teléfono']; ?>" placeholder = "Teléfono">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="celular">Celular</label>
                        <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $_POST['celular']; ?>" placeholder = "Celular">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="correo" value="<?php echo $_POST['correo']; ?>" placeholder = "Correo Electrónico">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="contraseña" value="<?php echo $_POST['contraseña']; ?>"placeholder = "Contraseña">
                    </div>
                </div>
                <div class="text-center" style="margin-top:35px;">
                    <button type="submit" class="btn btn-success" style="width: 300px; font-size: 18px;">Guardar</button>
                </div>
            </form>
      
</div>
</div>


<?php include("footer.php")?>



