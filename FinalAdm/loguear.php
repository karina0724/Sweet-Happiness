
<?php
include('libs/conexion1.php');


session_start();

$usuario =$_POST['email'];
$clave =$_POST['password'];
$clave = $clave;

$q="SELECT COUNT(*) as contar from administrador where cedula = '$usuario' and contraseña ='$clave'";
$consulta =mysqli_query($conexion,$q);
$array=mysqli_fetch_array($consulta);

$q1="SELECT COUNT(*) as contar1 from reservadores_huesped where cédula = '$usuario' and contraseña ='$clave'";
$consulta1 =mysqli_query($conexion,$q1);
$array1=mysqli_fetch_array($consulta1);

$q2="SELECT COUNT(*) as contar2 from empleados where cédula = '$usuario' and contraseña ='$clave'";
$consulta2 =mysqli_query($conexion,$q2);
$array2=mysqli_fetch_array($consulta2);

if($array['contar']>0){
    $_SESSION['initialization_sistem'] = true;
    $q = "SELECT nombre, apellido, rol, id FROM administrador where cedula = '$usuario'";
    $consulta = mysqli_query($conexion, $q);
    $arr = mysqli_fetch_array($consulta);
    $_SESSION['username'] = $arr['nombre'];
    $_SESSION['rol'] = $arr['rol'];
    $_SESSION['admin']=$usuario;
    $_SESSION['UserId']=$arr['id'];
header("location: index.php");

}

else if($array1['contar1']>0){
    $_SESSION['initialization_sistem'] = true;
    $q = "SELECT nombre, apellido, rol, id FROM reservadores_huesped where cédula = '$usuario'";
    $consulta = mysqli_query($conexion, $q);
    $arr = mysqli_fetch_array($consulta);
    $_SESSION['username'] = $arr['nombre'];
    $_SESSION['rol'] = $arr['rol'];
    $_SESSION['huesped']=$usuario;
    $_SESSION['UserId']= $arr['id'];
header("location: index.php");
}


else if($array2['contar2']>0){
    $_SESSION['initialization_sistem'] = true;
    $q = "SELECT nombre, apellido, rol, id, rol_hotel FROM empleados where cédula = '$usuario'";
    $consulta = mysqli_query($conexion, $q);
    $arr = mysqli_fetch_array($consulta);
    $_SESSION['username'] = $arr['nombre'];
    $_SESSION['rol'] = $arr['rol'];
    $_SESSION['rol-hotel'] = $arr['rol_hotel'];
    $_SESSION['empleado']=$usuario;
    $_SESSION['UserId']=$arr['id'];
    
header("location: index.php");

}

else{
    echo'<script type="text/javascript">
    alert("Clave Incorrecta");
    window.location.href="index.php";
    </script>';
}

?>
