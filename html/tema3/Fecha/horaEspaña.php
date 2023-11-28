<?
date_default_timezone_set('Europe/Madrid');
$hora_espana = time();
echo date('Y-m-d H:i:s', $hora_espana);
//diferencia de fechas con strtotime
$fecha1 = strtotime('2023-11-25'); // Primera fecha en marca de tiempo UNIX
$fecha2 = strtotime('2023-12-10'); // Segunda fecha en marca de tiempo UNIX

$diferencia_segundos = $fecha2 - $fecha1; // Diferencia en segundos

// Para obtener la diferencia en días:
$diferencia_dias = $diferencia_segundos / (60 * 60 * 24);

echo "La diferencia entre las fechas es de $diferencia_dias días.";
//diferencia de fecha con datetime en dias
$fecha1 = new DateTime('2023-11-25');
$fecha2 = new DateTime('2023-12-10');

$diferencia = $fecha1->diff($fecha2);

echo "La diferencia es de " . $diferencia->format('%a días');
//diferencia en años con date time
$fechaNueva = '1990-12-15'; // Fecha de nacimiento en formato 'YYYY-MM-DD'
$fechaActual = date('Y-m-d'); // Fecha actual en formato 'YYYY-MM-DD'

$fechaNacimientoObj = new DateTime($fechaNueva);
$fechaActualObj = new DateTime($fechaActual);

$diferencia = $fechaNacimientoObj->diff($fechaActualObj);
$edad = $diferencia->y;

echo "La edad es: $edad años";
//dia de la semana de una fecha determinada
function obtenerDiaSemana($fecha) {
    $diasSemana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    $numeroDia = date('w', strtotime($fecha));
    return $diasSemana[$numeroDia];
}

// Uso de la función
$miFecha = '2023-11-25'; // Cambia esta fecha por la que necesites
$nombreDia = obtenerDiaSemana($miFecha);
echo "El día de la semana para $miFecha es: $nombreDia";
//dia de la semana en formato europeo
function obtenerDiaSemana1($fecha) {
    $diasSemana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    $fechaTimestamp = strtotime(str_replace('-', '/', $fecha)); // Reemplaza '-' por '/'
    $numeroDia = date('w', $fechaTimestamp);
    return $diasSemana[$numeroDia];
}

// Uso de la función
$miFecha = '25-11-2023'; // Cambia esta fecha por la que necesites
$nombreDia = obtenerDiaSemana1($miFecha);
echo "El día de la semana para $miFecha es: $nombreDia";


//dias que hay de diferencia desde hoy 
function obtenerDiferenciaDias($fechaHoy, $otraFecha) {
    $fechaHoyObj = new DateTime($fechaHoy);
    $otraFechaObj = new DateTime($otraFecha);

    $diferencia = $fechaHoyObj->diff($otraFechaObj);
    return $diferencia->days;
}

$fechaHoy = date('Y-m-d');
$otraFecha = '2023-12-31'; // Fecha con la que quieres comparar

$diasDiferencia = obtenerDiferenciaDias($fechaHoy, $otraFecha);
echo "Hay $diasDiferencia días hasta el $otraFecha desde hoy ($fechaHoy).";
