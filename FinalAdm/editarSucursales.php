<?php 
ob_start();
include("header.php");

if($_POST){
    extract($_POST);
 
      if(isset($_GET['edit'])){

        $id = $_GET['edit'];
        $sql="update sucursales set direccion = '{$direccion}', provincia = '{$provincia}' where id= '{$id}'";
        
        $rs = conexion::execute($sql); 
        
        $sql2 = "INSERT INTO log_huesped(usuario_operario, usuario_afectado, accion, fecha_hora) VALUES ('Administrador', 'Sucursal', 'Modificó Sucursal ({$id})', {$fecha})";
        $rs = conexion::execute($sql2);
      }
      
      header("Location: gestionarSucursales.php"); 
}

if(isset($_GET['edit'])){
 
    $sql= "select * from sucursales where id= ". $_GET['edit'];
    $rs = conexion::query_array($sql);

    if(count($rs) > 0){
        $data = $rs[0];
        $_POST= $data;  
    }
}
ob_end_flush();
?>

<div class="container d-flex flex-row justify-content-between" style="margin-top:50px;" >
    <h2>Modificar Sucursales</h2>
     <a href="gestionarSucursales.php" class="btn btn-secondary" style="color:white; width:250px; font-size: 18px;">Consultar Sucursales</a>
</div>
<div style="max-width: 80%; margin:50px auto; margin-bottom: 150px;">
    
               <form method="POST" class="mb-2">
                    <div class="form-group">
                        <label for="password" class="font-weight-bold">Dirección</label>
                        <input type="text" class="form-control" id="direccion" value="<?php echo $_POST['direccion']?>" placeholder="Dirección" name="direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="provincia" class="font-weight-bold">Provincia</label>
                        <input type="text" class="form-control" id="provincia" value="<?php echo $_POST['provincia']?>" placeholder="Provincia" name="provincia" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success" style="margin: 5px auto; width:250px;">Guardar</button>
                    </div>
                </form>    
      
</div>
