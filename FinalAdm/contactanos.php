<?php

  include("libs/conexion.php");
  include("libs/configx.php");
  if($_POST){
    foreach($_POST as &$valor){
      $valor = addslashes($valor);
  }

  extract($_POST);

  $sql = "insert into solicitudes (cedula, nombre, apellido, ciudad, curso, comentario) 
            values ('Juan David Matos','Mi Apellido','{$nombre}','{$nombre}','{$nombre}','{$nombre}')";

  $rsid = conexion::execute($sql, true);
  }
?>
<div class="container" style="background-color: #CCC; border-radius: 15px;" class="p-1">
    <div class="text-center text-bold">
        <h2>
            Contactanos
        </h2>
    </div>
    <div>
        <form method="POST" class="m-2">
            <div class="form-row">
                <div class="form-group col-lg-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                <div class="form-group col-lg-6">
                    <label for="correo">Correo</label>
                    <input type="text" name="correo" id="correo" class="form-control" required>
                </div>
                <div class="form-group col-lg-12">
                    <label for="asunto">Asunto / Descripción</label>
                    <textarea name="asunto" class="form-control mb-1" id="asunto"></textarea>
                </div>
                <div class="container text-center">
                    <button class="btn btn-dark" type="submit">
                        Enviar
                    </button>
                </div>
            </div>
        </form>
    </div><br>
</div>