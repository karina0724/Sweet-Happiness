<?php
    
    include("head.php");

    if($_POST){
        foreach($_POST as &$valor){
            $valor = addslashes($valor);
        }
        extract($_POST);
        $contraseña = md5($contraseña);

        $sql = "INSERT INTO reservadores_huesped(cédula, provincia, nombre, apellido, teléfono, celular, correo, contraseña, rol) VALUES ('{$cedula}','{$provincia}','{$nombre}','{$apellido}','{$telefono}','{$celular}','{$correo}','{$contraseña}','3')";
        $rs = conexion::execute($sql);
    }
?>

<div class="d-flex flex-row justify-content-between .bg1" style="margin: 40px 0;">
  <div class="col-md-6 d-flex flex-column align-items-center"> 
       <img src="img/register.png" alt="Imagen" >
        <h2>Ven y comparte con nosotros del mejor ambiente.</h2>
  </div>
  <div class="container col-md-10">
  <div class="col-md-6">
       <h1 class="text-center">Registrarse</h1>
        <form method="POST" class="needs-validation" novalidate>        
            <div class="form-row">
                <div class="form-group col-md-6">
                     <label for="cedula">Cedula</label>
                     <input type="number" class="form-control" id="cedula" name="cedula" placeholder="Cédula">
                     <div class="invalid-feedback">Looks good!</div>
                </div>
                <div class="form-group col-md-6">
                     <label for="provincia">Provincia</label>
                     <input type="text" class="form-control" id="provincia" name="provincia" placeholder = "Provincia">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder = "Nombre">
                </div>
                <div class="form-group col-md-6">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder = "Apellido">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder = "Teléfono">
                </div>
                <div class="form-group col-md-6">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular" placeholder = "Celular">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Correo</label>
                    <input type="email" class="form-control" id="email" name="correo" placeholder = "Correo">
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="contraseña" placeholder = "Contraseña">
                </div>
            </div>
            <button type="submit" class="btn btn-dark btn-lg btn-block">Registrarse</button>
        </form>
  </div>
</div>
</div>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

</script>

<?php include("redes.php"); ?>