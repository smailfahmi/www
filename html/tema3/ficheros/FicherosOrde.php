<?
// Verifica si el archivo 'fichero.txt' existe
if (file_exists('fichero.txt')) {
    // Muestra un mensaje indicando que el archivo existe
    echo "Existe";

    // Intenta abrir el archivo en modo lectura ('r')
    if (!$fp = fopen('fichero.txt', 'r')) {
        // Muestra un mensaje si hay problemas al abrir el archivo
        echo "Ha habido un problema al abrir el fichero";
    } else {
        // Lee todo el contenido del archivo
        $leido = fread($fp, filesize('fichero.txt'));

        // Muestra el contenido leído del archivo
        echo $leido;

        // Cierra el archivo después de leerlo
        fclose($fp);
    }
} else {
    // Muestra un mensaje si el archivo no existe
    echo "No existe";
}

// Muestra un encabezado indicando la operación de escritura con 'w' o 'a'-------------------
// 'w' sobrescribe el archivo existente; 'a' agrega al final del archivo
// echo "<h1>Escribir fichero con w borra lo anterior</h1>";

// Verifica si el archivo 'fichero.txt' existe
// Si existe, realiza la operación de escritura
if (file_exists('fichero.txt')) {
    // Muestra un mensaje si el archivo existe
    // Esto sirve solo para propósitos de demostración
    echo "Existe";

    // Intenta abrir el archivo en modo de escritura al final ('a')
    if (!$fp = fopen('fichero.txt', 'a')) {
        // Muestra un mensaje si hay problemas al abrir el archivo
        echo "Ha habido un problema al abrir el fichero";
    } else {
        // Contenido a escribir en el archivo
        $texto = "Escribiendo...";

        // Escribe el contenido en el archivo
        if (!fwrite($fp, $texto, strlen($texto))) {
            // Muestra un mensaje si hay un error al escribir
            echo "Error al escribir";
        }

        // Cierra el archivo después de escribir en él
        fclose($fp);
    }
} else {
    // Muestra un mensaje si el archivo no existe
    echo "No existe";
}

// Verifica si el archivo 'fichero.txt' existe-------------------------------
if (file_exists('fichero.txt')) {
    // Muestra un mensaje si el archivo existe
    echo "Existe";

    // Intenta abrir el archivo en modo de escritura ('r+') escritura y lectura
    if (!$fp = fopen('fichero.txt', 'r+')) {
        // Muestra un mensaje si hay problemas al abrir el archivo
        echo "Ha habido un problema al abrir el fichero";
    } else {
        // Contenido a escribir en el archivo
        $texto = "manda...";

        // Mueve el puntero del archivo a la posición 15
        fseek($fp, 15);

        // Escribe el contenido en el archivo desde la posición 15
        if (!fwrite($fp, $texto, strlen($texto))) {
            // Muestra un mensaje si hay un error al escribir
            echo "Error al escribir";
        }

        // Cierra el archivo después de escribir en él
        fclose($fp);
    }
} else {
    // Muestra un mensaje si el archivo no existe
    echo "No existe";
}

// Comprueba si el archivo 'ficheroLineas.txt' existe------------------------
// Si existe, abre el archivo en modo de lectura ('r')
if (file_exists('ficheroLineas.txt')) {
    // Muestra un mensaje si el archivo existe
    echo "Existe";

    // Intenta abrir el archivo en modo de lectura
    if (!$fp = fopen('ficheroLineas.txt', 'r')) {
        // Muestra un mensaje si hay problemas al abrir el archivo
        echo "Ha habido un problema al abrir el fichero";
    } else {
        // Lee el archivo línea por línea hasta el final
        while ($leido = fgets($fp, filesize("ficheroLineas.txt"))) {
            // Imprime cada línea leída del archivo junto con la posición actual del puntero
            echo '<br>' . $leido . ftell($fp);
        };

        // Cierra el archivo después de leerlo
        fclose($fp);
    }
} else {
    // Muestra un mensaje si el archivo no existe
    echo "No existe";
}


// Nombre del archivo------------------------------------------
$nombreArchivo = 'ficheroLineas.txt';

// Verifica si el archivo existe
if (file_exists($nombreArchivo)) {
    // Muestra un mensaje si el archivo existe
    echo "El archivo existe";

    // Lee todas las líneas del archivo en un array
    $lineas = file($nombreArchivo);

    // Verifica si hay un problema al abrir el archivo
    if ($lineas === false) {
        echo "Ha habido un problema al abrir el fichero";
    } else {
        // Número de línea que se desea modificar (comenzando desde 0)
        $lineaDeseada = 0;

        // Nueva línea a agregar
        $nuevaLinea = "\nchacho\n";

        // Verifica si la línea deseada existe en el archivo
        if ($lineaDeseada >= 0 && $lineaDeseada < count($lineas)) {
            // Reemplaza la línea deseada por la nueva línea
            $lineas[$lineaDeseada] = $nuevaLinea;

            // Escribe el contenido modificado en el archivo
            if (file_put_contents($nombreArchivo, implode("", $lineas)) === false) {
                echo "Error al escribir en el archivo.";
            } else {
                // Muestra un mensaje si se modificó la línea con éxito
                echo "Línea modificada con éxito.";
            }
        } else {
            // Muestra un mensaje si la línea deseada no existe en el archivo
            echo "La línea deseada no existe en el archivo.";
        }
    }
} else {
    // Muestra un mensaje si el archivo no existe
    echo "El archivo no existe";
}

// Crea un nombre de archivo temporal en el directorio actual----------------------------------
$tmp = tempnam('.', "tem.txt");

// Verifica si 'ficheroLineas.txt' existe
if (file_exists('ficheroLineas.txt')) {
    // Muestra un mensaje si el archivo existe
    echo "Existe";

    // Intenta abrir el archivo original en modo de lectura y el archivo temporal en modo de escritura
    if ((!$fp = fopen('ficheroLineas.txt', 'r')) || (!$ft = fopen($tmp, 'w'))) {
        // Muestra un mensaje si hay un problema al abrir los archivos
        echo "Ha habido un problema al abrir el fichero";
    } else {
        // Contenido a agregar en la primera línea
        $texto = "Linea nueva";

        // Variable para controlar la escritura de la nueva línea
        $contador = 1;

        // Lee cada línea del archivo original
        while ($leido = fgets($fp, filesize("ficheroLineas.txt"))) {
            // Escribe las líneas del archivo original en el archivo temporal
            fputs($ft, $leido, strlen($leido));

            // Agrega la nueva línea al principio (solo en la primera iteración)
            if ($contador == 1) {
                fputs($ft, $texto, strlen($texto));
                fputs($ft, "\n", strlen("\n"));
                $contador++;
            }
        }

        // Cierra los archivos originales
        fclose($fp);
        fclose($ft);

        // Elimina el archivo original
        unlink("ficheroLineas.txt");

        // Renombra el archivo temporal al nombre del archivo original
        rename($tmp, "ficheroLineas.txt");

        // Cambia los permisos del archivo renombrado
        chmod("ficheroLineas.txt", 0777);
    }
} else {
    // Muestra un mensaje si el archivo no existe
    echo "No existe";
}
