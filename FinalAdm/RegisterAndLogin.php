<?php

  include("libs/conexion.php");
  include("libs/configx.php");
  if($_POST){
    foreach($_POST as &$valor){
      $valor = addslashes($valor);
  }

  extract($_POST);

  $sql = "insert into solicitudes (cedula, nombre, apellido, ciudad, curso, comentario) 
            values ('Juan David Matos','Mi Apellido','{$cedula}','{$celular}','{$celular}','{$celular}')";

  $rsid = conexion::execute($sql, true);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
  
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  overflow: hidden;
  padding: 0 10px;
  background: #17a2b8;
}
::selection{
  background: rgba(23,162,184,0.3);
}
.wrapper{
    max-width: 600px;
    width: 100%;
    margin: 10px auto;
    padding: 25px 25px 25px 25px;
  border-radius: 5px;
  background: #fff;
  box-shadow: 0px 10px 15px rgba(0,0,0,0.1);
}
.wrapper header{
  font-size: 30px;
  font-weight: 600;
  padding-bottom: 3px;
}
.wrapper nav{
  position: relative;
  width: 80%;
  height: 50%;
  display: flex;
  align-items: center;
}
.wrapper nav label{
  display: block;
  height: 100%;
  width: 100%;
  text-align: center;
  line-height: 50px;
  cursor: pointer;
  position: relative;
  z-index: 1;
  color: #17a2b8;
  font-size: 17px;
  border-radius: 5px;
  margin: 0 5px;
  transition: all 0.3s ease;
}
.wrapper nav label:hover{
  background: rgba(23,162,184,0.3);
}
#home:checked ~ nav label.home,
#blog:checked ~ nav label.blog{
  color: #fff;
}
nav label i{
  padding-right: 7px;
}
nav .slider{
  position: absolute;
  height: 100%;
  width: 50%;
  left: 0;
  bottom: 0;
  z-index: 0;
  border-radius: 5px;
  background: #17a2b8;
  transition: all 0.3s ease;
}
input[type="radio"]{
  display: none;
}
#blog:checked ~ nav .slider{
  left: 50%;
}
section .content{
  display: none;
  background: #fff;
}
#home:checked ~ section .content-1,
#blog:checked ~ section .content-2{
  display: block;
}
section .content .title{
  font-size: 21px;
  font-weight: 500;
  margin: 30px 0 10px 0;
}
section .content p{
text-align: justify;
}

  </style>
<body>
  <div class="wrapper">
    <header>Sweet Happiness</header>
    <input type="radio" name="slider" checked id="home">
    <input type="radio" name="slider" id="blog">
    <nav class="text-center">
      <label for="home" class="home"><i class="fas fa-sign-in-alt"></i>Login</label>
      <label for="blog" class="blog"><i class="fas fa-user-plus"></i>Registrar</label>
      <div class="slider"></div>
    </nav>
    <section>
      <div class="content content-1"><br>
        <form action="">
            <div class="mb-3 row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword">
              </div>
            </div>
            <div class="text-center">
              <button class="btn btn-outline-dark btn-lg btn-block">
                Entrar
              </button><br>
            </div>
        </form>
      </div>
      <div class="content content-2"><br>
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
            <button type="submit" class="btn btn-outline-dark btn-lg btn-block">Registrarse</button>
          </form>
      </div>
    </section>
  </div>

</body>
</html>
