<?php
// Obtener los parámetros de la URL para la primera persona
$ano1 = isset($_GET['ano1']) ? $_GET['ano1'] : null;
$mes1 = isset($_GET['mes1']) ? $_GET['mes1'] : null;
$dia1 = isset($_GET['dia1']) ? $_GET['dia1'] : null;

// Obtener los parámetros de la URL para la segunda persona
$ano2 = isset($_GET['ano2']) ? $_GET['ano2'] : null;
$mes2 = isset($_GET['mes2']) ? $_GET['mes2'] : null;
$dia2 = isset($_GET['dia2']) ? $_GET['dia2'] : null;

// Verificar si se proporcionaron todas las fechas de nacimiento
if ($ano1 && $mes1 && $dia1 && $ano2 && $mes2 && $dia2) {
    // Crear fechas de nacimiento para ambas personas
    $fecha1 = "$ano1-$mes1-$dia1";
    $fecha2 = "$ano2-$mes2-$dia2";

    // Calcular la diferencia de edad en años
    $diff = date_diff(date_create($fecha1), date_create($fecha2));

    // Mostrar las fechas de nacimiento y la diferencia de edad
    echo "Persona 1 - Fecha de nacimiento: $fecha1<br>";
    echo "Persona 2 - Fecha de nacimiento: $fecha2<br>";
    echo "Diferencia de edad: " . $diff->y . " años";
} else {
    echo "Por favor, proporciona las fechas de nacimiento para ambas personas en la URL.";
}
?>