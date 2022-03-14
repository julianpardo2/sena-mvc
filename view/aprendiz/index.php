<?php
require_once('entity/Aprendiz.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Aprendices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="mt-3">Lista de Aprendices</h1>
        <br><br>
        <a href="index.php?obj=aprendiz&action=agregar" class="btn btn-success">Crear Aprendiz</a>
        <br><br>
        <?php
        if (count($aprendices)>0) {
            ?>
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    <?php
                    foreach($aprendices as $aprendiz) {
                        echo "<tr>";
                        echo "<td>$aprendiz->id</td>";
                        echo "<td>$aprendiz->documento</td>";
                        echo "<td>$aprendiz->nombres</td>";
                        echo "<td>".$aprendiz->apellidos."</td>";
                        echo "<td>".(($aprendiz->email)?$aprendiz->email:"No tienen Email")."</td>";
                        echo "<td>";
                        echo "<a href='edit.php?id=$aprendiz->id' class='btn btn-warning'>Editar</a>";
                        echo "<a href='delete.php?id=$aprendiz->id' class='btn btn-danger'>Eliminar</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    $aprendiz->nombres="Freddy";
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "<h2>No existen aprendices</h2>";
        }
        ?>
    </div>
</body>
</html>