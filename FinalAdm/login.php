<?php
    include("libs/conexion.php");
    include("libs/configx.php");
    include("header.php");
?>
<br>
<div class="container col-md-8 bg-white" style="border-radius: 8px; box-shadow: 2px 2px 1px 1px #C3C8C6;">
<h3 class="text-center">Login</h3>
    <form method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" placeholder="password" name="password">
        </div>
        <div>
            <button type="submit" class="btn btn-dark btn-lg btn-block">enviar</button>
        </div><br>
    </form>
</div><br>

<?php
    include("footer.php");
?>