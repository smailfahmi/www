<?php

// //primero ver si existe
// //abrimos y lo leemos
// if (file_exists('fichero.txt')) {
//     echo "Existe";
//     if (!$fp = fopen('fichero.txt', 'r'))
//         echo "Ha habido un problema al abrir el fichero";
//     else {
//         $leido = fread($fp, filesize('fichero.txt'));
//         echo $leido;
//         fclose($fp);
//     }
// } else {
//     echo "No existe";
// }


// //Escribir el anterior. con w borra lo anterior; con a escribe al final del fichero
// echo "<h1>Escribir fichero con w borra lo anterior</h1>";
// if (file_exists('fichero.txt')) {
//     echo "Existe";
//     if (!$fp = fopen('fichero.txt', 'a'))
//         echo "Ha habido un problema al abrir el fichero";
//     else {
//         $texto = "Escribiendo...";
//         if (!fwrite($fp, $texto, strlen($texto)))
//             echo "Error al escribir";
//         fclose($fp);
//     }
// } else {
//     echo "No existe";
// }

// //Escribir el anterior. con w borra lo anterior; con a escribe al final del fichero
// echo "<h1>Escribir fichero con w borra lo anterior</h1>";
// if (file_exists('fichero.txt')) {
//     echo "Existe";
//     if (!$fp = fopen('fichero.txt', 'w'))
//         echo "Ha habido un problema al abrir el fichero";
//     else {
//         $texto = "Escribiendo...";
//         if (!fwrite($fp, $texto, strlen($texto)))
//             echo "Error al escribir";
//         fclose($fp);
//     }
// } else {
//     echo "No existe";
// }

//Escribir en la mitad
// echo "<h1>Escribir fichero con c para escribir en la mitad contando </h1>";
// if (file_exists('fichero.txt')) {
//     echo "Existe";
//     if (!$fp = fopen('fichero.txt', 'c'))
//         echo "Ha habido un problema al abrir el fichero";
//     else {
//         $texto = "manda...";
//         fseek($fp,15);
//         if (!fwrite($fp, $texto, strlen($texto)))
//             echo "Error al escribir";
//         fclose($fp);
//     }
// } else {
//     echo "No existe";
// }

// echo "<h1>leer lineas completas </h1>";
// if (file_exists('ficheroLineas.txt')) {
//     echo "Existe";
//     if (!$fp = fopen('ficheroLineas.txt', 'r'))
//         echo "Ha habido un problema al abrir el fichero";
//     else {
//         while ($leido = fgets($fp, filesize("ficheroLineas.txt"))) {
//             echo '<br>' . $leido. ftell($fp);
//         };

//         fclose($fp);
//     }
// } else {
//     echo "No existe";
// }


// echo "<h1>Escribir una linea completa</h1>";
// if (file_exists('ficheroLineas.txt')) {
//     echo "Existe";
//     if (!$fp = fopen('ficheroLineas.txt', 'a'))
//         echo "Ha habido un problema al abrir el fichero";
//     else {

//         $texto = "\n mi nueva linea";
//         if (!fputs($fp, $texto, strlen($texto))) {
//            echo "error al escribir";
//         }
//         fclose($fp);
//     }
// } else {
//     echo "No existe";
// }

// echo "<h1>Escribir una linea en fila seleccionada</h1>";
// echo "<h1>leer lineas completas </h1>";

// $nombreArchivo = 'ficheroLineas.txt';

// if (file_exists($nombreArchivo)) {
//     echo "El archivo existe";
//     $lineas = file($nombreArchivo); // Leer todas las líneas del archivo en un array

//     if ($lineas === false) {
//         echo "Ha habido un problema al abrir el fichero";
//     } else {
//         $lineaDeseada = 0; // Número de línea que deseas modificar (comienza desde 0)
//         $nuevaLinea = "\nchacho\n"; // Nueva línea a agregar

//         if ($lineaDeseada >= 0 && $lineaDeseada < count($lineas)) {
//             $lineas[$lineaDeseada] = $nuevaLinea; // Reemplaza la línea deseada

//             if (file_put_contents($nombreArchivo, implode("", $lineas)) === false) {
//                 echo "Error al escribir en el archivo.";
//             } else {
//                 echo "Línea modificada con éxito.";
//             }
//         } else {
//             echo "La línea deseada no existe en el archivo.";
//         }
//     }
// } else {
//     echo "El archivo no existe";
// }

//cuando queremeos modificar un ficher secuencial
// crear un archivo temporal leer y modificar
// borrar el anterior y renombrar el temp con el nombre del anteriror

$tmp = tempnam('.',"tem.txt");
if(file_exists('ficheroLineas.txt')){
    echo "Existe";
    if((!$fp=fopen('ficheroLineas.txt','r')) || (!$ft = fopen($tmp,'w')))
        echo "Ha habido un problema al abrir el fichero";       
    else{        
        $texto = "Linea nueva";
        $contador = 1;
        while($leido = fgets($fp,filesize("ficheroLineas.txt"))){  
                 fputs($ft,$leido,strlen($leido));
                 if($contador==1){
                    fputs($ft,$texto,strlen($texto));
                    fputs($ft,"\n",strlen('\n'));
                    $contador++;
                 }
        }
        fclose($fp);
        fclose($ft);
        unlink("ficheroLineas.txt");
        rename($tmp,"ficheroLineas.txt");
        chmod("ficheroLineas.txt",0777);
    }
}else{
    echo "No existe";
}
