<?php
include('header.php');
include('redes.php');

?>
<!--end menu-h-->

<div style="max-width: 80%;" class="container">
<div class="contentBoxMaster">
    <div class="contentBoxMasterBox1">
        <div class="contentMaster">

            <div class="panelSuperior">

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/1.jpg" class="img-carrousel" alt="First Slide">
                        </div>
                        <div class="carousel-item">
                            <img src="img/2.jpg" class="img-carrousel" alt="Second Slide">
                        </div>
                        <div class="carousel-item">
                            <img src="img/3.jpg" class="img-carrousel" alt="Third Slide">
                        </div>
                    </div>
                    <!-- Carousel controls -->
                    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>

            </div>


            <!--end panelSuperior-->

            <div class="clr"></div>
            <div class="panelCentral">
                <div class="sobreNosotros">
                    <div class="txtSobreNosotros">
                        <h2>Sobre Nosotros</h2>
                        <p>
                            Sweet Happiness es una cadena hotelera formada por los desarrolladore Juan David Matos,
                            Karina
                            Montero y la licenciada en turismo Helen Violeta Mont??s, fue fundada el 25 de marzo del a??o
                            2005 en
                            Santo Domingo, Rep??blica Dominicana. Contamos con 5 sucursales en todo el territorio
                            nacional,
                            ubicadas en: Santo Domingo Este, Santiago de los Caballeros, Saman??, La Romana y Puerto
                            Plata. </p>

                        <p>Tenemos el mejor lugar rebosado de naturaleza, donde tu comodidad es lo m??s importante para
                            nosotros. Nuestras plantas cuentan con piscinas, bares, areas de juegos, restaurant, etc.
                        </p>
                    </div>
                    <img src="img/sobreNosotros.jpg" alt="Sobre Nosotros">

                </div>
            </div>
            <!--end panelCentral-->
            <?php
            include('galeria.php');
            ?>
            <div class="clr"></div>
        </div>
        <!--end contentMaster-->
    </div>
    <!--end contentBoxMasterBox1-->
</div>
<!--end contentBoxMaster-->
</div>
<!--end main-wrapp-->
<hr>
</div>
<script>
var myCarousel = document.querySelector('#carouselExampleCaptions')
var carousel = new bootstrap.Carousel(myCarousel, {
    interval: 2000,
    wrap: false
});
</script>



        </div>
        <!--end contentBoxMasterBox1-->

    </div>
</div>
</div>
</div>
<!--end contacto-->
</div>
<!--end bg1-->

</body>
<?php 
if(isset($_SESSION['rol']) != 1){include("contactanos.php");}
    include("footer.php");
?>
</html>
