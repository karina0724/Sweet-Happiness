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
                                        <td>
                                           <a class= 'btn btn-info'>Ver detalles</a>
                                           <a class= 'btn btn-success'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                                                <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
                                            </svg>
                                           </a>
                                           <a class= 'btn btn-danger'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill'viewBox='0 0 16 16'>
                                            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                            </svg>
                                           </a>
                                        </td>
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


