<?php

 
                        echo "<tr>";
                        echo "<td>$curso->id</td>";
                        echo "<td>$curso->codigo</td>";
                        echo "<td>$curso->nombre</td>";
                        echo "<td>".$curso->instructorObj->nombres."</td>";
                        //echo "<td></td>";
                        echo "<td>".$curso->numHoras."</td>";
                        echo "<td>";
                        echo "<a href='index.php?obj=curso&action=editar&id=$curso->id' class='btn btn-warning me-1'>Editar</a>";
                        echo "<a href='index.php?obj=curso&action=eliminar&id=$curso->id' class='btn btn-danger'>Eliminar</a>";
                        echo "</td>";
                        echo "</tr>";
                    
                    ?>