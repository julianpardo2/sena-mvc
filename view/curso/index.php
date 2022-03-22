<?php
require_once('entity/Curso.php');
require_once('entity/Instructor.php');
?>
<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Lista de Cursos";
include ('view/head.php');
?>
<body>
    <div class="container">
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <a href="index.php?obj=curso&action=agregar" class="btn btn-success">Crear Curso</a>
        <br><br>
        <?php
        if (count($cursos)>0) {
            ?>
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Instructor</th>
                    <th>Numero de Horas</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    <?php
                    foreach($cursos as $curso) {
                        echo "<tr>";
                        echo "<td>$curso->id</td>";
                        echo "<td>$curso->codigo</td>";
                        echo "<td>$curso->nombre</td>";
                        //echo "<td>".$curso->instructorObj->nombres."</td>";
                        echo "<td></td>";
                        echo "<td>".$curso->numHoras."</td>";
                        echo "<td>";
                        echo "<a href='index.php?obj=curso&action=editar&id=$curso->id' class='btn btn-warning me-1'>Editar</a>";
                        echo "<a href='index.php?obj=curso&action=eliminar&id=$curso->id' class='btn btn-danger'>Eliminar</a>";
                        echo "<a href='index.php?obj=curso&action=ver&id=$curso->id' class='btn btn-secondary'>Ver</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "<h2>No existen Cursos</h2>";
        }
        ?>
    </div>
</body>
</html>