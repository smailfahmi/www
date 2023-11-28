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
function guardar($fichero)
{

    // if (isset($_REQUEST[$name])) {
    //     $contenido = $_POST['comentario'];
    //     $nombreArchivo = "mifichero.txt";
    //     $archivo = fopen($nombreArchivo, "w");
    //     if ($archivo) {
    //         // Escribe el contenido del textarea en el archivo
    //         fwrite($archivo, $contenido);
    //         fclose($archivo);
    //         echo "El contenido se ha guardado en el archivo correctamente.";
    //     } else {
    //         echo "Error al abrir el archivo para escritura.";
    //     }
    // } else {
    //     echo "No se recibió contenido desde el formulario.";
    // }


    if (file_exists($fichero)) {
        echo "Existe";
        if (!$fp = fopen($fichero, 'w'))
            echo "Ha habido un problema al abrir el fichero";
        else {
            $contenido = $_POST['comentario'];
            if (!fwrite($fp, $contenido, strlen($contenido)))
                echo "Error al escribir";
            fclose($fp);
        }
    } else {
        echo "No existe";
    }
}
