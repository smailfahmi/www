<?php
function existe($name)
{

    if (file_exists($name)) {
        return true;
    } else {
        $ficheroCreado = fopen($name, 'w');
        $texto = "linea creada automaticamente";
        fwrite($ficheroCreado, $texto);
        if (file_exists($name)) {
            return true;
        } else
            return false;
    }
}
function eliminar($name)
{
    $tmp = tempnam('.', "tem.csv");
    if (file_exists('notas.csv')) {
        if ((!$fp = fopen('notas.csv', 'r')) || (!$ft = fopen($tmp, 'w')))
            echo "Ha habido un problema al abrir el fichero";
        else {

            $contador = 1;
            while ($leido = fgetcsv($fp, filesize("notas.csv"), ";")) {

                if ($contador == ((int)$name+1)) {
                } else {
                    fputcsv($ft, $leido, ";");
                }
                $contador++;
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
}
