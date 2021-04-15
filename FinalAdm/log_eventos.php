<?php
include('redes.php');

?>
<!--end menu-h-->

<div style="max-width: 80%;" class="container">
<?php include('head.php'); ?> <br> <br>

<h2 class="text-dark">Log de Eventos</h2>
<table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Fecha - Hora</th>
                <th scope="col">Usuario Operario</th>
                <th scope="col">Campo Afectado</th>
                <th scope="col">Acción Realizada</th>
            </tr>
        </thead>
        <tbody>
        <?php 
               $sql = "SELECT * FROM log_huesped";
               $rs = conexion::query_array($sql);

               foreach($rs as $data)
               {
                   echo "
                      <tr>
                         <td>{$data['fecha_hora']}</td>
                         <td>{$data['usuario_operario']}</td>
                         <td>{$data['usuario_afectado']}</td>
                         <td>{$data['accion']}</td>
                      </tr>
                   ";
               }
?> 
        </tbody>
    </table>
   <hr>
       
</div>
</div>
<!--end contacto-->
</div>
<!--end bg1-->

</body>
<?php include("footer.php")?>
</html>


