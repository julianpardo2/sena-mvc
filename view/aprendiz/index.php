<?php
require_once('entity/Aprendiz.php');
?>
<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Lista de Aprendices";
include ('view/head.php');
?>
<body>
    <div class="container">
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
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
                        echo "<a href='index.php?obj=aprendiz&action=editar&id=$aprendiz->id' class='btn btn-warning me-1'>Editar</a>";
                        echo "<a href='index.php?obj=aprendiz&action=eliminar&id=$aprendiz->id' class='btn btn-danger'>Eliminar</a>";
                        echo "</td>";
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