<?php

require_once('entity/Aprendiz.php');

?>

<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Lista de Aprendices Disponibles";
include ('view/head.php');
?>
<body>
    <div class="container">
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <form method="post" action="index.php?obj=curso&action=addAprendicesCurso&id=<?php echo $id?>">
        <button type="submit" class="btn btn-success">Agregar Aprendices</button>
        <br><br>
        <?php
        if (count($aprendices)>0) {
            ?>
            <table class="table table-striped">
                <thead>
                    <th></th>
                    <th>Id</th>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    
                </thead>
                <tbody>
                    <?php
                    foreach($aprendices as $aprendiz) {
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='aprendices[]' value='$aprendiz->id' /></td>";
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