<?php 
ob_start();
include('head.php');
include('redes.php');
$fecha= (new DateTime())->format('Y/m/d H:i:s'); 
 if(isset($_GET['del'])){

    $id = $_GET['del'];

     $sql = "delete from sucursales where id = {$id}";
     $rs = conexion::execute($sql);

     $sql2 = "INSERT INTO log_huesped(usuario_operario, usuario_afectado, accion, fecha_hora) VALUES ('Administrador', 'Sucursal', 'Eliminó Sucursal ({$id})', {$fecha})";
     $rs = conexion::execute($sql2);
 }

 if($_POST){
    extract($_POST);
            
            $sql = "INSERT INTO sucursales(direccion, provincia) VALUES ('{$direccion}', '{$provincia}')";
            $rs = conexion::execute($sql);

            $sql2 = "INSERT INTO log_huesped(usuario_operario, usuario_afectado, accion, fecha_hora) VALUES ('Administrador', 'Sucursal', 'Agregó Sucursal', '{$fecha}')";
            $rs = conexion::execute($sql2);
      
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
<div style="max-width: 80%;" class="container">
    <?php  ?> <br> <br>

    <div class="container col-md-7">
        <h2>Sucursales</h2>
        <button data-toggle='modal' data-target='#modalRegistrarSucursal' class='btn btn-secondary'style="width:250px;color:white;">Nueva Sucursal</button>
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
                            <a class='btn btn-success'href='editarSucursales.php?edit={$data['id']}' style='margin-right: 20px; width:100px;color:white;'>Editar</a>
                         </td>
                   </tr>
                ";
            }
        
        ?>
            </tbody>
        </table>

        <!-- Vertically centered insert modal -->
        <div class="modal" tabindex="-1" role="dialog" id="modalRegistrarSucursal" aria-labelledby="titulo-modal2"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="foto">
                            <img src="img/logo.png" class="logo-modal" alt="Sweet Happineess">
                        </div>
                        <form method="POST" class="mb-2">
                            <div class="form-group">
                                <label for="password" class="font-weight-bold">Dirección</label>
                                <input type="text" class="form-control" id="direccion"
                                    value="<?php echo $_POST['direccion']?>" placeholder="Dirección" name="direccion">
                            </div>
                            <div class="form-group">
                                <label for="provincia" class="font-weight-bold">Provincia</label>
                                <input type="text" class="form-control" id="provincia"
                                    value="<?php echo $_POST['provincia']?>" placeholder="Provincia" name="provincia">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn col-12" style="margin: 5px auto;">Guardar</button>
                            </div>
                        </form>
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
</div>

<?php include("footer.php")?>


</body>

