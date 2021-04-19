<?php
    include('head.php');
    include('redes.php');

    if(isset($_GET['idHuesped']))
    {
        $idHuesped = $_GET['idHuesped'];
    }
?>
<!--end menu-h-->

<div style="max-width: 80%;" class="container"><br> <br>

<h2 class="text-dark">Mis reservaciones</h2>
<a href="consultarHabitaciones.php" class="btn btn-secondary" style="margin-top:20px; width:250px;color:white;">Agregar Reservación</a><br><br><br>

<?php 
    $sql = "SELECT r.fecha_inicio, DATEDIFF(fecha_fin, fecha_inicio) as Dias, s.provincia, r.monto_total from reservaciones_habitaciones r inner join sucursales s  on s.id = r.id_sucursales where r.id_HReservador = {$idHuesped}";
    $rs = conexion::query_array($sql);
    
    if(empty($rs)){
        echo "<h3 class='text-center text-dark font-weight-bold'> Usted no ha realizado ninguna reservación.</h3><br>";
    }
    else{ ?>
        <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Duración</th>
                        <th scope="col">Sucursal</th>
                        <th scope="col">Monto Total</th>
                        <th scope="col">Detalles</th>
                        <!-- <th scope="col">Habitación</th>
                        <th scope="col">Cantidad Acompañantes</th> En ver detalles-->
                    </tr>
                </thead>
                <tbody>
                    
        <?php 
                    
                            foreach($rs as $data)
                            {
                                echo "
                                    <tr>
                                        <td>{$data['fecha_inicio']}</td>
                                        <td>{$data['Dias']} días</td>
                                        <td>{$data['provincia']}</td>
                                        <td>RD$ {$data['monto_total']}</td>
                                        <td><a class= 'btn btn-info'>Ver detalles</a></td>
                                    </tr>
                                ";
                            }
                        }
        ?> 
                </tbody>
            </table>
        <hr>
       
</div>
</div>
<!--end contacto-->
</div>
<!--end bg1-->

</body>
<?php include("footer.php")?>
</html>


