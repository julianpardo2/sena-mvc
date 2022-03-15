<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Crear de Instructor";
include ('view/head.php');
?>
<body>
    <div class="container">
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <form method="post">
            <input class="form-control" type="number" name="documento" />
            <input class="form-control mt-2" type="text" name="nombres" />
            <input class="form-control mt-2" type="text" name="apellidos" />
            <input class="form-control mt-2" type="text" name="area" />
            <input class="form-control mt-2" type="email" name="email" />
            <button class="btn btn-success mt-2" type="submit">Crear Instructor</button>
            <button id="btnVolver" class="btn btn-secondary mt-2 float-end" type="button">Volver Instructores</button>
        </form>
        
        
    </div>
    <?php
    include_once("view/footer.php");
    ?>
</body>
</html>