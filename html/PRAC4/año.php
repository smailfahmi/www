<?php
// Obtener el año desde la URL
$year = $_GET['year'];

// Verificar si el año es bisiesto
if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
    echo $year . " es un año bisiesto.";
} else {
    echo $year . " no es un año bisiesto.";
}
?>
