<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?

    if (isset($_REQUEST['volver'])) {
        header("Location: notas.php");
        //si le doy a escribir
    } elseif (isset($_REQUEST['modificar'])) {
        $tmp = tempnam('.', "tem.csv");
        if (file_exists('notas.csv')) {
            if ((!$fp = fopen('notas.csv', 'r')) || (!$ft = fopen($tmp, 'w')))
                echo "Ha habido un problema al abrir el fichero";
            else {
                $texto = [$_REQUEST['nombre'], $_REQUEST['no1'], $_REQUEST['no2'], $_REQUEST['no3']];
                $contador = 0;
                while ($leido = fgetcsv($fp, filesize("notas.csv"), ";")) {

                    if ($contador == $_REQUEST['oculto']) {
                        fputcsv($ft, $texto, ";");
                        // fputs($ft, "\n", strlen('\n'));
                    } else {
                        fputcsv($ft, $leido, ";");
                    }
                    $contador++;
                }
                if (empty($_REQUEST['oculto'])) {
                    fputcsv($ft, $texto, ";");
                }
                fclose($fp);
                fclose($ft);
                unlink("notas.csv");
                rename($tmp, "notas.csv");
                chmod("notas.csv", 0777);
            }
        } else {
            echo "No existe";
        }
        header("Location: notas.php");
    } elseif ($_REQUEST['accion'] == "editar") {
        $dates = [];
        $fila = 0;
        if (($gestor = fopen("notas.csv", "r")) !== FALSE) {
            while (($datos = fgetcsv($gestor, filesize("notas.csv"), ";")) !== FALSE) {
                $numero = count($datos);
                $conta = 0;
                for ($c = 0; $c < $numero; $c++) {
                    if ($fila == (int)$_REQUEST['ocult']) {
                        $dates[$conta] =  $datos[$conta];
                        $conta++;
                    }
                }
                $fila++;
            }
            fclose($gestor);
        }
        # code...
    }
    ?>
    <form action="" method="get">
        <p><label for="">nombre: <input type="text" name="nombre" <? if ($_REQUEST['accion'] == "editar") {
                                                                        echo "readonly";
                                                                    } else {
                                                                        echo "";
                                                                    } ?> value="<?
                                                                                if ($_REQUEST['accion'] == "editar") {
                                                                                    echo $dates[0];
                                                                                } else {
                                                                                    echo "";
                                                                                }  ?>" name="nombre"></label></p>
        <p><label for="">nota 1: <input type="number" name="no1" value="<?
                                                                        echo $dates[1] ?>" name="nota1"></label></p>
        <p><label for="">nota 2: <input type="number" name="no2" value="<?
                                                                        echo $dates[2] ?>" name="nota2"></label></p>
        <p><label for="">nota 3: <input type="number" name="no3" value="<?
                                                                        echo $dates[3] ?>" name="nota3"></label></p>
        <p>
            <input type="hidden" value="<? if (isset($_REQUEST['ocult'])) {
                                            echo $_REQUEST['ocult'];
                                        } ?>" name="oculto">
            <label for="Leer">
                <input type="submit" value="volver" name="volver">
            </label>
            <label for="Escribir">
                <input type="submit" value="modificar" name="modificar">
            </label>
        </p>
    </form>

</body>

</html>