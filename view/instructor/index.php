<?php
require_once('entity/Aprendiz.php');
?>
<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Lista de Instructores";
include ('view/head.php');
?>
<body>
    <div class="container">
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <a href="index.php?obj=instructor&action=agregar" class="btn btn-success">Crear Instructor</a>
        <a href="index.php" class="btn btn-secondary float-end">Volver Menu</a>
        <br><br>
        <?php
        if (count($instructores)>0) {
            ?>
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Area</th>
                    <th>Email</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    <?php
                    foreach($instructores as $instructor) {
                        echo "<tr>";
                        echo "<td>$instructor->id</td>";
                        echo "<td>$instructor->documento</td>";
                        echo "<td>$instructor->nombres</td>";
                        echo "<td>".$instructor->apellidos."</td>";
                        echo "<td>".$instructor->area."</td>";
                        echo "<td>".(($instructor->email)?$instructor->email:"No tienen Email")."</td>";
                        echo "<td>";
                        echo "<a href='index.php?obj=instructor&action=editar&id=$instructor->id' class='btn btn-warning me-1'>Editar</a>";
                        echo "<a href='index.php?obj=instructor&action=eliminar&id=$instructor->id' class='btn btn-danger'>Eliminar</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "<h2>No existen instructores</h2>";
        }
        ?>
    </div>
    <?php
    include_once("view/footer.php");
    ?>
</body>
</html>