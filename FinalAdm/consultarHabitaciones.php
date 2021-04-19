<?php include("head.php"); 


$sql = "SELECT * FROM habitaciones";
$rs = conexion::query_array($sql);
    foreach($rs as $data)
    {
       $arr[] = $data['costo'];
       $arrHabitacionp[] = $data['categoria'];
       $arrId[] = $data['id'];
    }

?>
        <div class="container col-md-9">
            <div class="servicios">
              <div>
                <h2>Habitaciones</h2>
              </div>
              <div class="row">
                <!-- Gallery item -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                  <div class="bg-white rounded shadow-sm"><img src="img/habitacionPresidencial.jpg" style="width: 315px; height: 215px;" alt="Presidencial"
                      class="img-fluid card-img-top">
                    <div class="p-4">
                      <h5> <a href="#" class="text-dark">Presidencial</a></h5>
                      <p class="small text-muted mb-0">Sweet Happiness <br> status: <span
                          style="color: blue;">Disponible</span></p>
                          <p><?php echo "Precio: RD$ ". $arr[0]; ?></p>
                        <a href="ReservarHabitaciones.php?precio=<? echo $arr[0];?>&habitacion=<? echo $arrHabitacionp[0];?>&idHabitacion=<?echo $arrId[0];?>" class="btn btn-success" style="color:white;">
                          Reservar
                        </a>
                    </div>
                  </div>
                </div>
                <!-- End -->
<!-- Gallery item -->
            <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                  <div class="bg-white rounded shadow-sm"><img src="img/habitacionIndividual.jpg" style="width: 315px; height: 215px;" alt="Individual"
                      class="img-fluid card-img-top">
                    <div class="p-4">
                      <h5> <a href="#" class="text-dark">Individual</a></h5>
                      <p class="small text-muted mb-0">Sweet Happiness<br> status: <span
                          style="color: blue;">Disponible</span></p>
                          <p><?php echo "Precio: RD$ ". $arr[1]; ?></p>
                        <a href="ReservarHabitaciones.php?precio=<? echo $arr[1];?>&habitacion=<? echo $arrHabitacionp[1];?>&idHabitacion=<?echo $arrId[1];?>" class="btn btn-success" style="color:white;">
                          Reservar
                        </a>
                    </div>
                  </div>
                </div>
                <!-- End -->
                <!-- Gallery item -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                  <div class="bg-white rounded shadow-sm"><img src="img/habitacionDoble.jpg" style="width: 315px; height: 215px;" alt="Doble"
                      class="img-fluid card-img-top">
                    <div class="p-4">
                      <h5> <a href="#" class="text-dark">Doble</a></h5>
                      <p class="small text-muted mb-0">Sweet Happiness <br> status: <span
                          style="color: blue;">Disponible</span></p>
                          <p><?php echo "Precio: RD$ ". $arr[2]; ?></p>
                        <a href="ReservarHabitaciones.php?precio=<? echo $arr[2];?>&habitacion=<? echo $arrHabitacionp[2];?>&idHabitacion=<?echo $arrId[2];?>" class="btn btn-success" style="color:white;">
                          Reservar
                        </a>
                    </div>
                  </div>
                </div>
                <!-- End -->
                <!-- Gallery item -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                  <div class="bg-white rounded shadow-sm"><img src="img/habitacionEstudio.jpg" style="width: 315px; height: 215px;" alt="Estudio"
                      class="img-fluid card-img-top">
                    <div class="p-4">
                      <h5> <a href="#" class="text-dark">Estudio</a></h5>
                      <p class="small text-muted mb-0">Banquete Sweet Happiness <br> status: <span
                          style="color: blue;">Disponible</span></p>
                          <p><?php echo "Precio: RD$ ". $arr[3]; ?></p>
                        <a href="ReservarHabitaciones.php?precio=<? echo $arr[3];?>&habitacion=<? echo $arrHabitacionp[3];?>&idHabitacion=<?echo $arrId[3];?>" class="btn btn-success" style="color:white;">
                          Reservar
                        </a>
                    </div>
                  </div>
                </div>
                <!-- End -->
                <!-- Gallery item -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                  <div class="bg-white rounded shadow-sm"><img src="img/habitacionKing.jpg" style="width: 315px; height: 215px;" alt="King"
                      class="img-fluid card-img-top">
                    <div class="p-4">
                      <h5> <a href="#" class="text-dark">King</a></h5>
                      <p class="small text-muted mb-0">Sweet Happiness <br> status: <span
                          style="color: blue;">Disponible</span></p>
                          <p><?php echo "Precio: RD$ ". $arr[4]; ?></p>
                        <a href="ReservarHabitaciones.php?precio=<? echo $arr[4];?>&habitacion=<? echo $arrHabitacionp[4];?>&idHabitacion=<?echo $arrId[4];?>" class="btn btn-success" style="color:white;">
                          Reservar
                        </a>
                    </div>
                  </div>
                </div>
                <!-- End -->
                <!-- Gallery item -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                  <div class="bg-white rounded shadow-sm"><img src="img/habitacioneQueen.jpg" style="width: 315px; height: 215px;" alt="Queen"
                      class="img-fluid card-img-top">
                    <div class="p-4">
                      <h5> <a href="#" class="text-dark">Queen</a></h5>
                      <p class="small text-muted mb-0">Sweet Happiness <br> status: <span
                          style="color: blue;">Disponible</span></p>
                          <p><?php echo "Precio: RD$ ". $arr[5]; ?></p>
                        <a href="ReservarHabitaciones.php?precio=<? echo $arr[5];?>&habitacion=<? echo $arrHabitacionp[5];?>&idHabitacion=<?echo $arrId[5];?>" class="btn btn-success" style="color:white;">
                          Reservar
                        </a>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              </div>
              <!-- End -->

<?php include("footer.php"); ?>