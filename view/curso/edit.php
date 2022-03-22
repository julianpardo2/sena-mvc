<?php

require_once('entity/Curso.php');
require_once('entity/Instructor.php');

?>

<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Editar de Curso";
include ('view/head.php');
?>
<body>
    <div class="container">
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $curso->id; ?>" />
            <input class="form-control" type="text" name="codigo" value="<?php echo $curso->codigo; ?>" />
            <input class="form-control" type="text" name="nombre"  value="<?php echo $curso->nombre; ?>" />
            <select class="form-control" name="instructor">
                <?php
                foreach ($instructores as $instructor) {
                    if ($curso->instructor == $instructor->id) {
                        echo "<option selected value='".$instructor->id."'>".$instructor->nombres." ".$instructor->apellidos."</option>";
                    } else {
                        echo "<option value='".$instructor->id."'>".$instructor->nombres." ".$instructor->apellidos."</option>";
                    }
                    
                }
                ?>
            </select>
            <input class="form-control" type="number" name="numHoras"  value="<?php echo $curso->numHoras; ?>" />
            <button class="btn btn-success" type="submit">Modificar Curso</button>
        </form>
    </div>
</body>
</html>