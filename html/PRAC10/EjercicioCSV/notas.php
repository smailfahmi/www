<?
include("./verificacion.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            text-align: center;
            border: solid;
        }
    </style>
</head>

<body>
    <?php
    $boton = 0;
    if (isset($_GET['editar'])) {
        header("Location: editar.php?ocult=" . $_REQUEST['oculto'] . "&accion=" . $_REQUEST['editar']);
    } elseif (isset($_GET['eliminar'])) {
        // echo $_REQUEST['oculto'];
        eliminar($_REQUEST['oculto']);
    } elseif (isset($_REQUEST['añadir'])) {

        header("Location: editar.php?accion=" . $_REQUEST['añadir']);
    } else {
    ?>
        <table class="default">
            <tr>
                <td>nota</td>
                <td>nota 1</td>
                <td>nota 2</td>
                <td>nota 3</td>
                <td>botones</td>

            </tr>
            <?
            $elemento = 0;
            $fila = 0;
            if (($gestor = fopen("notas.csv", "r")) !== FALSE) {
                while (($datos = fgetcsv($gestor, filesize("notas.csv"), ";")) !== FALSE) {
                    $numero = count($datos);
                    echo "<tr>";
                    echo        " <form action='' method='get'>";
                    for ($c = 0; $c < $numero; $c++) {

                        echo "<td>";
                        echo $datos[$c];

                        echo "</td>";
                        $elemento++;

                        if ($elemento == 4) {  ?>
                            <td> <label for="Leer">
                                    <input type="hidden" value="<? echo $fila; ?>" name="oculto">
                                    <input type="submit" value="editar" name="editar">
                                </label>
                                <label for="Escribir">
                                    <input type="submit" value="eliminar" name="eliminar">
                                </label>
                            </td>
            <?

                            echo "  </form>";
                            echo "</tr>";
                            $elemento = 0;
                            $boton++;
                        }
                    }
                    $fila++;
                }
                fclose($gestor);
            }
            ?>

        </table>

    <?php } ?>
    <form action="" method="get">
        <input type="submit" value="añadir" name="añadir">
    </form>
</body>

</html>