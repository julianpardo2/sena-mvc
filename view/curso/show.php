<?php

require_once('entity/Curso.php');
require_once('entity/Instructor.php');

?>

<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Ver de Curso";
include ('view/head.php');
?>
<body>
    <div class="container">
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <table class="table table-striped">
            <tr>
                <td>Codigo del Curso</td>
                <td><?php echo $curso->codigo; ?></td>
            </tr>
            <tr>
                <td>Nombre del Curso</td>
                <td><?php echo $curso->nombre; ?></td>
            </tr>
            <tr>
                <td>Nombre del Instructor</td>
                <td><?php echo $curso->instructorObj->nombres . " " . $curso->instructorObj->apellidos; ?></td>
            </tr>
            <tr>
                <td>Numero de Horas del Curso</td>
                <td><?php echo $curso->numHoras; ?></td>
            </tr>
        </table>
        <br><br>
        <h1>Lista de Aprendices</h1>
        <br><br>
        <?php
        if (count($curso->aprendices)>0) {
            ?>
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                </thead>
                <tbody>
                    <?php
                    foreach($curso->aprendices as $aprendiz) {
                        echo "<tr>";
                        echo "<td>$aprendiz->id</td>";
                        echo "<td>$aprendiz->documento</td>";
                        echo "<td>$aprendiz->nombres</td>";
                        echo "<td>".$aprendiz->apellidos."</td>";
                        echo "<td>".(($aprendiz->email)?$aprendiz->email:"No tienen Email")."</td>";
                        echo "</tr>";
                    }
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