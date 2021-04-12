<?php
    include("libs/conexion.php");
    include("libs/configx.php");
    include("header.php");
?>

<div class="container col-md-10">
<h1 class="text-center">Registrarse</h1>
    <form method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="provincia">Provincia</label>
                <input type="text" class="form-control" id="provincia" name="provincia">
            </div>
            <div class="form-group col-md-6">
                <label for="cedula">Cedula</label>
                <input type="text" class="form-control" id="cedula" name="cedula">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="form-group col-md-6">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="telefono">Telefono</label>
                <input type="text" class="form-control" id="telefono" name="telefono">
            </div>
            <div class="form-group col-md-6">
                <label for="celular">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Correo</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group col-md-6">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>
        <button type="submit" class="btn btn-dark btn-lg btn-block">Registrarse</button>
    </form>
</div>