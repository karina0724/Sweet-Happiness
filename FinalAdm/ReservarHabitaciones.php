<?php
include('head.php'); 
if($_POST){
    $datos = extract($_POST);

    $sql2 = "INSERT INTO reservaciones_habitaciones(id_habitaciones, id_HReservador, id_sucursales, fecha_inicio, fecha_fin, monto_total) 
<<<<<<< HEAD
    VALUES ({$habitaciones}, {$_SESSION['UserId']} , {$provincia}, {$fechaIni}, {$fechaFin}, {$monto})";
=======
    VALUES ({$habitaciones}, {$_SESSION['UserId']} , {$provincia}, '{$fechaIni}', '{$fechaFin}', '{$monto}')";
>>>>>>> 0e8edc28fbd730953f635425349815ed0d119e59
    $rs = conexion::execute($sql2);
}
if(isset($_SESSION['initialization_sistem'])){
    if(isset($_SESSION['rol']) == 3 || isset($_SESSION['rol']) == 1){
        
?>
<<<<<<< HEAD
<br
<div class=" container col-md-9"><br>
=======
<br>
<div class=" container col-md-8">
>>>>>>> 0e8edc28fbd730953f635425349815ed0d119e59
    <h2>Reservar Habitación</h2>
    <form method="POST">
        <div class="form-row">
        <div class="form-group col-md-6">
                        <label for="habitaciones">Habitaciones</label>
                            <select name="habitaciones" class="form-control" id="habitaciones" required>
                            <?php 
                               if(isset($_GET['edit'])){
                                   ?> <option value=<?php echo $_POST['id_sucursales']; ?>><?php echo $_POST['categoria'];?></option><?php
                                   $sql = "SELECT * FROM habitaciones WHERE categoria != '{$_POST['id']}'";
                                   $rs = conexion::query_array($sql);
                                   foreach($rs as $data)
                                   {
                                      echo "
<<<<<<< HEAD
                                         <option value='{$data['id']}' name='habitaciones'>{$data['categoria']}</option>
=======
                                         <option value='{$data['id']}'>{$data['categoria']}</option>
>>>>>>> 95cc8a49520fd0a7c8f4d41ccb6d87148c7e379c
                                      ";
                                   }
                               }
                               else{
                                ?> <option value=0>Seleccione una opción</option><?php
                                $sql = "SELECT * FROM habitaciones";
                                $rs = conexion::query_array($sql);
                                foreach($rs as $data)
                                {
                                   echo "
<<<<<<< HEAD
                                      <option value='{$data['id']}' name='habitaciones'>{$data['categoria']}</option>
=======
                                      <option value='{$data['id']}'>{$data['categoria']}</option>
>>>>>>> 95cc8a49520fd0a7c8f4d41ccb6d87148c7e379c
                                   ";
                                }
                            }
                            ?>
                           
                           </select>
                    </div>
            <div class="form-group col-md-6">
                        <label for="provincia">Sucursal</label>
                            <select name="provincia" class="form-control" id="provincia" required>
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
        <div class="form-group">
            <label for="fechaIni">Fecha de inicio</label>
            <input type="date" class="form-control" id="fechaIni" name="fechaIni" placeholder="Fecha Inicio">
        </div>
        <div class="form-group">
            <label for="fechaFin">Fecha Final</label>
            <input type="date" class="form-control" id="fechaFin" name="fechaFin" placeholder="Fecha Final">
        </div>
        <div class="form-group">
            <label for="monto">Monto total 10%</label>
            <input type='number' class='form-control' id='monto' name='monto' placeholder='Monto'>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-dark btn-lg btn-block">Reservar</button>
        </div>
    </form>
</div>
<?php
    }
} else {
    echo "
    <br><br>
    <h1>No te haz registrado</h1>
    ";
}

include("footer.php")
?>