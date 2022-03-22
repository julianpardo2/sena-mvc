<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Crear de Curso";
include ('view/head.php');
?>
<body>
    <div class="container">
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <form method="post">
            <input class="form-control" type="text" name="codigo" />
            <input class="form-control" type="text" name="nombre" />
            <select class="form-control" name="instructor">
                <?php
                foreach ($instructores as $instructor) {
                    echo "<option value='".$instructor->id."'>".$instructor->nombres." ".$instructor->apellidos."</option>";
                }
                ?>
            </select>
            <input class="form-control" type="number" name="numHoras" />
            <button class="btn btn-success" type="submit">Crear Curso</button>
        </form>
        
        
    </div>
</body>
</html>