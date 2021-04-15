<?php
include('head.php'); 
if($_POST){
    extract($_POST);

    $sql2 = "INSERT INTO reservaciones_habitaciones(id_habitaciones, id_HReservador, id_sucursales, fecha_inicio, fecha_fin, monto_total) 
    VALUES ('{$habitaciones}', '{$provincia}', '{$fechaIni}', '{$fechaFin}', '${monto}')";
    $rs = conexion::execute($sql2);
}
if(isset($_SESSION['initialization_sistem'])){
    if(isset($_SESSION['rol']) == 3 || isset($_SESSION['rol']) == 1){
        
?>
<br>
<div class=" container col-md-9"><br>
    <h2>Reservar Habitación</h2>
    <form method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="habitaciones">Habitaciones</label>
                <input type="text" class="form-control" id="habitaciones" name="habitaciones">
            </div>
            <div class="form-group col-md-6">
                <label for="provincia">Provincia</label>
                <input type="text" class="form-control" id="provincia" name="provincia">
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
            <input type="number" class="form-control" id="monto" name="monto" placeholder="Monto">
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