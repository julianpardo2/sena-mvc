<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Crear de Aprendiz";
include ('view/head.php');
?>
<body>
    <div class="container">
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <form method="post">
            <input class="form-control" type="number" name="documento" />
            <input class="form-control" type="text" name="nombres" />
            <input class="form-control" type="text" name="apellidos" />
            <input class="form-control" type="email" name="email" />
            <button class="btn btn-success" type="submit">Crear Aprendiz</button>
        </form>
        
        
    </div>
</body>
</html>