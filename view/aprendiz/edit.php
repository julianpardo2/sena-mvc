<?php

require_once('entity/Aprendiz.php');

?>

<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Editar de Aprendiz";
include ('view/head.php');
?>
<body>
    <div class="container">
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $aprendiz->id; ?>" />
            <input class="form-control" type="number" name="documento" value="<?php echo $aprendiz->documento; ?>" />
            <input class="form-control" type="text" name="nombres"  value="<?php echo $aprendiz->nombres; ?>" />
            <input class="form-control" type="text" name="apellidos"  value="<?php echo $aprendiz->apellidos; ?>" />
            <input class="form-control" type="email" name="email"  value="<?php echo $aprendiz->email; ?>" />
            <button class="btn btn-success" type="submit">Modificar Aprendiz</button>
        </form>
    </div>
</body>
</html>