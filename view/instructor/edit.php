<?php

require_once('entity/Instructor.php');

?>

<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Editar de Instructor";
include ('view/head.php');
?>
<body>
    <div class="container">
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $instructor->id; ?>" />
            <input class="form-control" type="number" name="documento" value="<?php echo $instructor->documento; ?>" />
            <input class="form-control" type="text" name="nombres"  value="<?php echo $instructor->nombres; ?>" />
            <input class="form-control" type="text" name="apellidos"  value="<?php echo $instructor->apellidos; ?>" />
            <input class="form-control" type="text" name="area"  value="<?php echo $instructor->area; ?>" />
            <input class="form-control" type="email" name="email"  value="<?php echo $instructor->email; ?>" />
            <button class="btn btn-success" type="submit">Modificar Instructor</button>
        </form>
    </div>
</body>
</html>