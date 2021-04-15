<?php 
include("head.php");
?>

<div class="container" style="max-width: 90%; margin-top:50px;">
    <h2>Log de Eventos</h2>
</div>
<div style="max-width: 90%; margin:50px auto; margin-bottom: 250px;">
       <table class="table table-hover">
       <thead>
           <tr>
               <th scope="col">Fecha - Hora</th>
               <th scope="col">Usuario Operario</th>
               <th scope="col">Usuario Afectado</th>
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
</div>

<?php
include("footer.php")
?>