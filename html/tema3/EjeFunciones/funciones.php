<?php
// a. br() Pinta un br
function funbr()
{
    echo "<br>";
}

// b. h1( cadena ) Pinta la cadena entre dos h1
function funh1($texto)
{
    echo "<h1>$texto</h1>";
    return $texto;
}
// c. p(cadena) Pinta la cadena entre etiqueta p
function funp($texto)
{
    echo "<p>$texto</p>";
    return $texto;
}
// d. self() Devuelve el fichero actual
function funfich()
{
    $pathParts = explode("/", $_SERVER['SCRIPT_NAME']);
    $nombre = end($pathParts); // Obtiene el último elemento del arreglo

    echo "EL ARCHIVO EN EJECUCIÓN ES: ";
    echo "<pre>";
    echo "EL NOMBRE DEL ARCHIVO ES " . $nombre;
    echo "</pre>";
}
function funfich1()
{
    $scriptPath = $_SERVER['SCRIPT_NAME'];
    $scriptName = basename($scriptPath); // Obtiene el nombre del archivo del camino.

    echo "EL ARCHIVO EN EJECUCIÓN ES: ";
    echo "<pre>";
    echo "EL NOMBRE DEL ARCHIVO ES " . $scriptName;
    echo "</pre>";
}

// e. letraDni() Se introduce el dni y devuelve la letra que le corresponde
function fundni($numero)
{
    $indice = (int)($numero % 23);
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    $letra = substr($letras, $indice,1);
    return $letra;


    // $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    // $indice = $numero % 23;
    // $letra = $letras[$indice];
    // return $letra;
}


// f. Realiza una página que utilice estas funciones
//ejercicio 2
//cho rand(), "\n";
$n = 50;
$min = 1;
$max = 50;
$permitirRepetidos = true;
$numerosAleatorios = array();
generarNumerosAleatorios($numerosAleatorios, $min, $max, $n, $permitirRepetidos);
print_r($numerosAleatorios);

// if (generarNumerosAleatorios($numerosAleatorios, $min, $max, $n, $permitirRepetidos)) {
//     // Mostrar los números generados
//     echo "Números aleatorios generados: " . implode(", ", $numerosAleatorios);
// } else {
//     echo "No es posible generar la cantidad de números solicitados sin repetición, dado el rango y la cantidad disponibles.";
// }

function generarNumerosAleatorios(&$array, $minimo, $maximo, $cantidad, $permitirRepetidos)
{
    if ($permitirRepetidos) {
        for ($i = 0; $i < $cantidad; $i++) {
            $numeroAleatorio = rand($minimo, $maximo);
            $array[$i] = $numeroAleatorio;
        }
    } else {
        $disponibles = range($minimo, $maximo);
        if ($cantidad > count($disponibles)) {
          
            return false;
        }
        for ($i = 0; $i < $cantidad; $i++) {
            $indice = array_rand($disponibles);
            $numeroAleatorio = $disponibles[$indice];
            $array[] = $numeroAleatorio;
            unset($disponibles[$indice]);
            $disponibles = array_values($disponibles); 
        }
    }
    return $array;
}


