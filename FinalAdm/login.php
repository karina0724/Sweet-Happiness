<?php
    include("libs/conexion.php");
    include("libs/configx.php");

    if($_POST){
        session_start();
        $contraseña = $contraseña;


    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Sweet Happiness</title>
    <style>
       *{
            margin: 0;
            padding: 0;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        body{
            background:#284243;
        }
        .container{
            background: #f3f4f7;
        }
        .logo{
            
            height: 200px;
            vertical-align: top;
            margin:0 auto;
        }
        .btn{
            background:#284243;
            color:#fff
        }
    </style>
</head>
<body>
    <div class="container col-md-8" style="border-radius: 8px; box-shadow: 2px 2px 1px 1px #C3C8C6; margin: 10% auto;">
        <img src="img/logo.png" class="logo" action="loguear.php" alt="Sweet Happineess">
        <form method="POST" class="mb-2" >
            <div class="form-group">
                <label for="email">l</label>
                <input type="text" class="form-control" id="email" placeholder="Correo Electrónico" name="email">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password">
            </div>
            <div>
                <button type="submit" class="btn btn-lg btn-block">Iniciar Sesión</button>
            </div>
        </form>
        <div style="color:red;">
            <span><? echo $error; ?></span>
        </div>
        <div class="enlaces mb-2">
            <a href="#">¿Olvidaste tu contraseña?</a>
            <a href="register.php">Registrarse</a>
        </div>
    </div>
</body>
</html>
