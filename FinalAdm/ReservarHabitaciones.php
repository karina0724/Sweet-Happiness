<?php
ob_start();
include('header.php'); 


if(isset($_GET['precio']) && isset($_GET['habitacion']) && isset($_GET['idHabitacion'])){
    $precio = $_GET['precio'];
    $tipoHabitacion = $_GET['habitacion'];
    $idHabitacion = $_GET['idHabitacion'];
}

if($_POST){
    
    extract($_POST);

    if(isset($_GET['edit'])){

        $sql= "SELECT * FROM habitaciones WHERE id = {$_POST['habitacion']}"; 
        $rs = conexion::query_array($sql);

        foreach($rs as $data)
        {
            $precio = $data['costo'];
        }
       
        $sql2="UPDATE reservaciones_habitaciones SET id_habitaciones={$habitacion}, id_sucursales={$provincia}, fecha_inicio='{$fechaIni}', fecha_fin= '{$fechaFin}', monto_total={$precio} WHERE id={$_GET['edit']}";

        $rs = conexion::execute($sql2); 
    }else{ 
        $sql2 = "INSERT INTO reservaciones_habitaciones(id_habitaciones, id_HReservador, id_sucursales, fecha_inicio, fecha_fin, monto_total) 
        VALUES ({$idHabitacion}, {$_SESSION['UserId']}, {$provincia}, '{$fechaIni}', '{$fechaFin}', {$precio})";
        
        $rs = conexion::execute($sql2); 
        // var_dump($idHabitacion, $_SESSION['UserId'], $provincia, $fechaIni, $fechaFin, $precio);
        // exit();
    }
    
}


if(isset($_GET['edit'])){
    $sql= "select * from reservaciones_habitaciones where id= {$_GET['edit']}";
    $rs = conexion::query_array($sql);

    if(count($rs) > 0){
        $data = $rs[0];
        $_POST= $data;  
    }
    
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
                        <label for="habitacion">Habitación</label> 
                        <?php 
                          if(isset($_GET['edit'])){
                           $sql= "SELECT * FROM habitaciones WHERE id = {$_POST['id_habitaciones']}"; 
                           $rs = conexion::query_array($sql);?>

                           <select name="habitacion" class="form-control" id="habitacion">
                          <?php foreach($rs as $data)
                           {
                              echo "
                                 <option value='{$data['id']}' selected>{$data['categoria']}</option>
                              ";
                           }

                           $sql2= "SELECT * FROM habitaciones WHERE id != {$_POST['id_habitaciones']}"; 
                           $rs2 = conexion::query_array($sql2);
                           foreach($rs2 as $data)
                           {
                              echo "
                                 <option value='{$data['id']}'>{$data['categoria']}</option>
                              ";
                           }?>
                            </select>
                           <?php

                        }    
                        else{?>
                            <input type="text" class="form-control" id="habitacion" name="habitacion" value="<?php echo "$tipoHabitacion"; ?>" disabled>

                            <?php
                            } 
                        ?>  
        </div>
            <div class="form-group col-md-6">
                        <label for="provincia">Sucursal</label>
                            <select name="provincia" class="form-control" id="provincia" name="provincia" required>
                            <?php 
                               if(isset($_GET['edit'])){
                                   
                           $sql= "SELECT * FROM sucursales WHERE id = '{$_POST['id_sucursales']}'"; 
                           $rs = conexion::query_array($sql);

                           foreach($rs as $data)
                           {
                              echo "
                                 <option value='{$data['id']}' selected>{$data['provincia']}</option>
                              ";
                           }

                           $sql2= "SELECT * FROM sucursales WHERE id != '{$_POST['id_sucursales']}'"; 
                           $rs2 = conexion::query_array($sql2);

                           foreach($rs2 as $data)
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
            <input type="date" class="form-control" id="fechaIni" name="fechaIni" value="<?php echo $_POST['fecha_inicio']; ?>">
        </div>
        <div class="form-group">
            <label for="fechaFin">Fecha Final</label>
            <input type="date" class="form-control" id="fechaFin" name="fechaFin" value="<?php echo $_POST['fecha_fin']; ?>" >
        </div>
        <div class="form-group">
            
            <?php 
               if(isset($_GET['edit'])){ 
            ?>
                <input type='number' class='form-control' id='precio' name='precio' hidden>              
           
            <?php
            }else{
            ?>
                   <label for="precio">Precio</label>
                   <input type='number' class='form-control' id='precio' name='precio' value="<?php echo "$precio"; ?>" disabled>
            <?php
            }
            ?>

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