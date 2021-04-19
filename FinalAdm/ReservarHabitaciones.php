<?php
ob_start();
include('head.php'); 

if(isset($_GET['precio']) && isset($_GET['habitacion']) && isset($_GET['idHabitacion'])){
    $precio = $_GET['precio'];
    $tipoHabitacion = $_GET['habitacion'];
    $idHabitacion = $_GET['idHabitacion'];
}

if($_POST){
    
    extract($_POST);
    var_dump($idHabitacion, $_SESSION['UserId'], $provincia, $fechaIni, $fechaFin,  $precio);
   
    $sql2 = "INSERT INTO reservaciones_habitaciones(id_habitaciones, id_HReservador, id_sucursales, fecha_inicio, fecha_fin, monto_total) 
    VALUES ({$idHabitacion}, {$_SESSION['UserId']}, {$provincia}, '{$fechaIni}', '{$fechaFin}', {$precio})";

    $rs = conexion::execute($sql2);

    header("location: consultarReservaciones.php?idHuesped={$_SESSION['UserId']}");
   
}
if(isset($_SESSION['initialization_sistem'])){
    if(isset($_SESSION['rol']) == 3 || isset($_SESSION['rol']) == 1){

ob_end_flush();
?>
<br>
<div class=" container col-md-8">
    <h2>Reservar Habitación</h2>
    <form method="POST">
        <div class="form-row">
        <div class="form-group col-md-6">
                        <label for="habitaciones">Habitación</label>   
                        <input type="text" class="form-control" id="habitaciones" name="habitaciones" value="<?php echo $tipoHabitacion; ?>" disabled>
        </div>
            <div class="form-group col-md-6">
                        <label for="provincia">Sucursal</label>
                            <select name="provincia" class="form-control" id="provincia" name="provincia" required>
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
<<<<<<< HEAD
            <label for="monto">Precio</label>
            <input type='number' class='form-control' id='monto' name='monto' value="<?php echo $precio;?>" disabled>
=======
<<<<<<< HEAD
            <label for="monto">Monto total 10%</label>
            <?php $numero_aleatorio = rand(1,100);
            $numero_aleatorio / 100; ?>
            <input type='disable' class='form-control' id='monto' name='monto' placeholder='Monto' value="2500">
=======
            <label for="monto">Abono</label>
            <input type='number' class='form-control' id='monto' name='monto' >
>>>>>>> 8a4ed113904ac0c0c842fe1efdc141415d37c305
>>>>>>> c13ffbfa3b04fb4a75fb6c5c9b7d34e17c45fd86
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

include("footer.php");
?>