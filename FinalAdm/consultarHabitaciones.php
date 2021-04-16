<?php include("head.php"); 


$sql = "SELECT * FROM habitaciones";
$rs = conexion::query_array($sql);
    foreach($rs as $data)
    {
       $arr[] = $data['costo'];
    }

?>

            <div class="servicios">
              <div>
                <h2>Habitaciones</h2>
              </div>
              <div class="row">
                <!-- Gallery item -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                  <div class="bg-white rounded shadow-sm"><img src="img/habitacionPresidencial.jpg" alt="Playa"
                      class="img-fluid card-img-top">
                    <div class="p-4">
                      <h5> <a href="#" class="text-dark">Presidencial</a></h5>
                      <p class="small text-muted mb-0">Sweet Happiness <br> status: <span
                          style="color: blue;">Disponible</span></p>
                          <p><?php echo "Precio: ". $arr[0]; ?></p>
                      <div class="d-grid gap-2 d-md-block d-flex rounded-pill bg-light px-3 py-2 mt-4">
                        <a href="ReservarHabitaciones.php" class="btn btn-success" style="color:white;">
                          Reservar
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End -->
<!-- Gallery item -->
            <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                  <div class="bg-white rounded shadow-sm"><img src="img/habitacionDoble.jpg" alt=""
                      class="img-fluid card-img-top">
                    <div class="p-4">
                      <h5> <a href="#" class="text-dark">Individual</a></h5>
                      <p class="small text-muted mb-0">Sweet Happiness<br> status: <span
                          style="color: blue;">Disponible</span></p>
                          <p><?php echo "Precio: ". $arr[1]; ?></p>
                      <div class="d-grid gap-2 d-md-block d-flex rounded-pill bg-light px-3 py-2 mt-4">
                        <a href="ReservarHabitaciones.php" class="btn btn-success" style="color:white;">
                          Reservar
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End -->
                <!-- Gallery item -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                  <div class="bg-white rounded shadow-sm"><img src="img/habitacioneQueen.jpg" alt=""
                      class="img-fluid card-img-top">
                    <div class="p-4">
                      <h5> <a href="#" class="text-dark">Doble</a></h5>
                      <p class="small text-muted mb-0">Sweet Happiness <br> status: <span
                          style="color: blue;">Disponible</span></p>
                          <p><?php echo "Precio: ". $arr[2]; ?></p>
                      <div class="d-grid gap-2 d-md-block d-flex rounded-pill bg-light px-3 py-2 mt-4">
                        <a href="ReservarHabitaciones.php" class="btn btn-success" style="color:white;">
                          Reservar
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End -->
                <!-- Gallery item -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                  <div class="bg-white rounded shadow-sm"><img src="img/servicioBanquete.jpg" alt=""
                      class="img-fluid card-img-top">
                    <div class="p-4">
                      <h5> <a href="#" class="text-dark">Estudio</a></h5>
                      <p class="small text-muted mb-0">Banquete Sweet Happiness <br> status: <span
                          style="color: blue;">Active</span></p>
                          <p><?php echo "Precio: ". $arr[3]; ?></p>
                      <div class="d-grid gap-2 d-md-block d-flex rounded-pill bg-light px-3 py-2 mt-4">
                        <a href="ReservarHabitaciones.php" class="btn btn-success" style="color:white;">
                          Reservar
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End -->
                <!-- Gallery item -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                  <div class="bg-white rounded shadow-sm"><img src="img/servicioHabitacion.jpg" alt=""
                      class="img-fluid card-img-top">
                    <div class="p-4">
                      <h5> <a href="#" class="text-dark">King</a></h5>
                      <p class="small text-muted mb-0">Sweet Happiness <br> status: <span
                          style="color: blue;">Disponible</span></p>
                          <p><?php echo "Precio: ". $arr[4]; ?></p>
                      <div class="d-grid gap-2 d-md-block d-flex rounded-pill bg-light px-3 py-2 mt-4">
                        <a href="ReservarHabitaciones.php" class="btn btn-success" style="color:white;">
                          Reservar
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End -->
                <!-- Gallery item -->
                <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                  <div class="bg-white rounded shadow-sm"><img src="img/servicioPiscina.jpg" alt=""
                      class="img-fluid card-img-top">
                    <div class="p-4">
                      <h5> <a href="#" class="text-dark">Queen</a></h5>
                      <p class="small text-muted mb-0">Sweet Happiness <br> status: <span
                          style="color: blue;">Disponible</span></p>
                          <p><?php echo "Precio: ". $arr[5]; ?></p>
                      <div class="d-grid gap-2 d-md-block d-flex rounded-pill bg-light px-3 py-2 mt-4">
                        <a href="ReservarHabitaciones.php?precio={$arr[5]}" class="btn btn-success" style="color:white;">
                          Reservar
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End -->

<?php include("footer.php"); ?>