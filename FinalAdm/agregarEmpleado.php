<?php include("header.php");

if($_POST){
    extract($_POST);
    $contraseña = $contraseña;  
   
    if(isset($_GET['edit'])){
        $sql= "select * from empleados where id= ". $_GET['edit'];
        $rs = conexion::query_array($sql);

        var_dump($rs);
        exit();

        if(count($rs) > 0){
            $data = $rs[0];
            $_POST= $data;  
        }
    }
    else{
        $sql = "INSERT INTO empleados(id_sucursales, cédula, nombre, apellido, teléfono, celular, correo, contraseña, rol_hotel, rol) VALUES ('{$sucursal}','{$cedula}','{$nombre}','{$apellido}','{$telefono}','{$celular}','{$correo}','{$contraseña}','{$rolHotel}','2')";

        $rs = conexion::execute($sql);
    }
        
}

?>

<div class="container d-flex flex-row justify-content-between" style="margin-top:50px;" >
    <h2>Registro de Empleados</h2>
     <a href="gestionarEmpleados.php" class="btn btn-secondary" style="color:white; width:250px; font-size: 18px;">Consultar Empleados</a>
</div>
<div style="max-width: 80%; margin:50px auto; margin-bottom: 150px;">
    
            <form method="POST" class="needs-validation" novalidate>        
                <div class="form-row">
                    <div class="form-group col-md-6">
                         <label for="nombre">Nombre</label>
                         <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo "Hola"; ?>" placeholder="Nombre">
                    </div>
                    <div class="form-group col-md-6">
                         <label for="apellido">Apellido</label>
                         <input type="text" class="form-control" id="apellido" name="apellido" placeholder = "Apellido">
                    </div>
                </div>
                <div class="form-group col-12">
                        <label for="cedula">Cédula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" placeholder = "Cédula">
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                        <label for="rolHotel">Cargo</label>
                            <select name="rolHotel" class="form-control" id="rolHotel" required>
                            <option value=0>Seleccione el cargo</option>
                               <?php 
                                 $sql = "SELECT * FROM roles_hotel";
                                 $rs = conexion::query_array($sql);
                                 foreach($rs as $data)
                                 {
                                    echo "
                                       <option value='{$data['nombre']}'>{$data['nombre']}</option>
                                    ";
                                 }
                               ?>
                           </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="sucursal">Sucursal</label>
                            <select name="sucursal" class="form-control" id="sucursal" required>
                            <option value=0>Seleccione el cargo</option>
                               <?php 
                                 $sql = "SELECT * FROM sucursales";
                                 $rs = conexion::query_array($sql);
                                 foreach($rs as $data)
                                 {
                                    echo "
                                       <option value='{$data['id']}'>{$data['provincia']}</option>
                                    ";
                                 }
                               ?>
                           </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder = "Teléfono">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="celular">Celular</label>
                        <input type="text" class="form-control" id="celular" name="celular" placeholder = "Celular">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="correo" placeholder = "Correo Electrónico">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="contraseña" placeholder = "Contraseña">
                    </div>
                </div>
                <div class="text-center" style="margin-top:35px;">
                    <button type="submit" class="btn btn-success" style="width: 300px; font-size: 18px;">Guardar</button>
                </div>
            </form>
      
</div>


<?php include("footer.php")?>



