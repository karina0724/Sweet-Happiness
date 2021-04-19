<?php 
  include("libs/conexion.php");
  include("libs/configx.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0ca7f63421.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/template.css">
</head>

<body>
    <div style="max-width: 80%;" class="container">
        <?php

    session_start();
    if(isset($_SESSION['initialization_sistem'])){
     
?>
        <div class="bg1">
            <div class="main-wrapp">
                <div class="headerBox">
                    <div class="logo">
                        <a href="#" target="_self">
                            <!--[ESPECIFICAR LA RUTA AL INICIO DEL PORTAL]-->

                            <div class="logito">

                                <img src="img/logo.png" width="150" height="150" title="Sweet Happiness"
                                    alt="Logo de la cadena de hoteles">
                                <p class="slogan">Vive la mejor experiencia.</p>
                            </div>
                        </a>
                    </div>
                    <!--end logo-->
                    <div class="headerBoxBox1">
                        <div class="repDom"></div>
                        <div class="pSearch">
                            <!--[COLOCAR BUSCADOR EN ESTA PARTE]-->
                            <div class="search">
                                <input name="search" type="text" id="mod-search-searchword">
                                <input name="search" type="image" src="images/searchButton.gif">
                            </div>
                            <!--end search-->
                        </div>
                        <!--end pSearch-->
                        <div class="navMenu">

                            <!--[COLOCAR EN ESTA PARTE EL MENU DE NAVEGACION FACIL]-->
                            <ul class="menu">
                                <li><a href="#">Inicio</a></li>
                                <li><a href="#">Mapa de sitio</a></li>
                                <li><a href="#">Contacto</a></li>
                            </ul>

                            <!--end menu-->
                        </div>
                        <!--end navMenu-->
                    </div>
                    <!--end headerBoxBox1-->
                </div>
                <!--end headerBox-->

                <div class="menu-h">
                    <?php
            switch($_SESSION['rol']){
               case 1:?>
                    <nav class="menu-ja">
                        <a href="index.php">Inicio</a>
                        <a href="gestionarEmpleados.php">Gestionar Empleados</a>
                        <a href="gestionarSucursales.php">Gestionar Sucursales</a>
                        <a href="log_eventos.php">Log de Eventos</a>
                    </nav><?php
                break;
               case 2:
               if($_SESSION['rol-hotel'] == 'Servicio al Cliente'){
                 ?>
                    <nav class="menu-ja">
                        <a href="index.php">Inicio</a>
                        <a href="gestionarHuespedes.php">Gestionar Huéspedes</a>
                        <a href="#">Consultar Hoteles</a>
                    </nav>
                    <?php
               }else if($_SESSION['rol-hotel'] == 'Contador'){
                 ?>
                    <nav class="menu-ja">
                        <a href="index.php">Inicio</a>
                        <a href="#">Consultar Huéspedes</a>
                        <a href="#">Registrar Pagos</a>
                        <a href="#">Consultar Pagos</a>
                    </nav>
                    <?php
               }
               ?>
                    <?php
                break;
               case 3:?>
                    <nav class="menu-ja">
                        <a href="index.php">Inicio</a>
                        <a href="consultarHabitaciones.php">Habitaciones</a>
                        <a href="consultarReservaciones.php?idHuesped=<? echo $_SESSION['UserId']?>">Reservaciones</a>
                        <a href="pagoHuesped.php">Pagos</a>
                    </nav><?php
                 break;
               case 4:?>
                    <nav class="menu-ja">
                        <a href="index.php">Inicio</a>
                        <a href="#">Sobre Nosotros</a>
                        <a href="#" class="dropdown">
                            <a class="dropdown-toggle" type="button" style="margin-left:0;" id="dropdownMenu2"
                                data-toggle="dropdown">
                                Servicios
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item" type="button">Consultar Reservación</button>
                            </div>
                        </a>
                        <a href="#">Contacto</a>
                    </nav><?php
                 break;
                 default:?><nav class="menu-ja">
                        <a href="index.php">Inicio</a>
                        <a href="#">Sobre Nosotros</a>
                        <a href="#">Servicios</a>
                        <a href="#">Contacto</a>
                    </nav><?php
                 break;
            }
            
      ?>

                    <!-- Vertically centered login modal -->
                    <div class="modal" tabindex="-1" role="dialog" id="modalIniciarSesion"
                        aria-labelledby="titulo-modal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="foto">
                                        <img src="img/logo.png" class="logo-modal" alt="Sweet Happineess">
                                    </div>
                                    <form method="POST" class="mb-2" action="loguear.php">
                                        <div class="form-group">
                                            <label for="email" class="font-weight-bold">Cedula</label>
                                            <input type="text" class="form-control" id="email" placeholder="Cedula"
                                                name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="font-weight-bold">Contraseña</label>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Contraseña" name="password">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn col-12" style="margin: 5px auto;">Iniciar
                                                Sesión</button>
                                        </div>
                                    </form>
                                    <div class="enlaces mb-2 d-flex flex-column text-center">
                                        <a href="#">¿Olvidaste tu contraseña?</a>
                                        <a href="register.php">Registrarse</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End Vertically centered login modal -->


                    </div>
                    <div class="btnSesiones">
                        <a style="margin-right: 30px; color:white;"
                            class="font-weight-bolder"><?php echo $_SESSION['username']?></a>
                        <a href="logout.php" class="btnSes" style="color:white;">Cerrar Sesión</a>
                    </div>
                </div>

                <?php } else { ?>
                <div class="bg1">
                    <div class="main-wrapp">
                        <div class="headerBox">
                            <div class="logo">
                                <a href="#" target="_self">
                                    <!--[ESPECIFICAR LA RUTA AL INICIO DEL PORTAL]-->

                                    <div class="logito">
                                        <img src="img/logo.png" width="150" height="150" title="Sweet Happiness"
                                            alt="Logo de la cadena de hoteles">
                                        <p class="slogan">Vive la mejor experiencia.</p>
                                    </div>
                                </a>
                            </div>
                            <!--end logo-->
                            <div class="headerBoxBox1">
                                <div class="repDom"></div>
                                <div class="pSearch">
                                    <!--[COLOCAR BUSCADOR EN ESTA PARTE]-->
                                    <div class="search">
                                        <input name="search" type="text" id="mod-search-searchword">
                                        <input name="search" type="image" src="images/searchButton.gif">
                                    </div>
                                    <!--end search-->
                                </div>
                                <!--end pSearch-->
                                <div class="navMenu">
                                    <!--[COLOCAR EN ESTA PARTE EL MENU DE NAVEGACION FACIL]-->
                                    <ul class="menu">
                                        <li><a href="#">Inicio</a></li>
                                        <li><a href="#">Mapa de sitio</a></li>
                                        <li><a href="#">Contacto</a></li>
                                    </ul>
                                    <!--end menu-->
                                </div>
                                <!--end navMenu-->
                            </div>
                            <!--end headerBoxBox1-->
                        </div>
                        <!--end headerBox-->

                        <div class="menu-h">

                            <nav class="menu-ja">
                                <a href="index.php">Inicio</a>
                                <a href="#">Sobre Nosotros</a>
                                <a href="#">Servicios</a>
                                <a href="#">Contacto</a>
                            </nav>


                            <!-- Vertically centered login modal -->
                            <div class="modal" tabindex="-1" role="dialog" id="modalIniciarSesion"
                                aria-labelledby="titulo-modal" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="foto">
                                                <img src="img/logo.png" class="logo-modal" alt="Sweet Happineess">
                                            </div>
                                            <form method="POST" class="mb-2" action="loguear.php">
                                                <div class="form-group">
                                                    <label for="email" class="font-weight-bold">Cedula</label>
                                                    <input type="text" class="form-control" id="email"
                                                        placeholder="Cedula" name="email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password" class="font-weight-bold">Contraseña</label>
                                                    <input type="password" class="form-control" id="password"
                                                        placeholder="Contraseña" name="password">
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn col-12"
                                                        style="margin: 5px auto;">Iniciar Sesión</button>
                                                </div>
                                            </form>
                                            <div class="enlaces mb-2 d-flex flex-column text-center">
                                                <a href="#">¿Olvidaste tu contraseña?</a>
                                                <a href="register.php">Registrarse</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Vertically centered login modal -->


                            </div>

                            <div class="btnSesiones">
                                <button href="#" data-toggle="modal" data-target="#modalIniciarSesion"
                                    class="btnSes">Iniciar Sesión</button>
                                <button href="#" data-toggle="modal" data-target="#modalRegistrarse"
                                    class="btnSes">Registrarse</button>
                            </div>

                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>