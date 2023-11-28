<?php
// Función para pintar un <br>
function br() {
    echo '<br>';
}

// Función para pintar un texto entre etiquetas <h1>
function h1($cadena) {
    echo '<h1>' . $cadena . '</h1>';
}

// Función para pintar un texto entre etiquetas <p>
function p($cadena) {
    echo '<p>' . $cadena . '</p>';
}

// Función para devolver el nombre del archivo actual
function self() {
    return basename($_SERVER['PHP_SELF']);
}

// Función para obtener la letra del DNI a partir del número
function letraDni($dni) {
    $letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
    $modulo = $dni % 23;
    return $letras[$modulo];
}

// Función para generar números aleatorios
function generarNumeros($array, $min, $max, $cantidad, $repetir) {
    if ($repetir) {
        for ($i = 0; $i < $cantidad; $i++) {
            $array[] = rand($min, $max);
        }
    } else {
        $numeros = range($min, $max);
        shuffle($numeros);
        $array = array_merge($array, array_slice($numeros, 0, $cantidad));
    }//merge concatena dos array y slice recorta el array desde 0 hasta cantidad shuffle desordena el array
    return $array;
}
?>
