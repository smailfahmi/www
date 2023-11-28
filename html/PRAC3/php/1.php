<?php

$fechaActual = new DateTime();


$fechaFutura = $fechaActual->modify('+60 days');


$nombreDiaSemana = $fechaFutura->format('l');


$fechaFormateada = $fechaFutura->format('d/m/Y');

echo "Fecha dentro de 60 días: $fechaFormateada<br>";
echo "Día de la semana: $nombreDiaSemana";
// // Muestra la dirección IP del equipo desde el que se está accediendo
//         $direccionIP = $_SERVER['REMOTE_ADDR'];
//         echo "<p>Dirección IP del equipo: $direccionIP</p>";
echo "b DIRECCION DEL CLIENTE :";
echo "<pre>";
echo "$_SERVER[REMOTE_ADDR]";
echo "</pre>";
$hoy = strtotime("now");
echo "<p>" . date("hoy es " . "y/m/d H:i:s", $hoy) . "</p>";

echo "LA FECHA EN OPORTO ES ";
date_default_timezone_set("Europe/Lisbon");
echo date("y/m/d H:i:s");
echo "</br>";
// // Muestra el path donde se encuentra el fichero en ejecución
// $rutaArchivo = __FILE__;
// echo "<p>Ruta del archivo en ejecución: $rutaArchivo</p>";
// 

echo " MOSTRAR PATH :";
echo "<pre>";
echo "EL PATH DEL FICHERO ES " . "$_SERVER[SCRIPT_FILENAME]";
echo "</pre>";

// // Muestra el nombre del fichero en ejecución
// $nombreArchivo = basename(__FILE__);
// echo "<p>Nombre del archivo en ejecución: $nombreArchivo</p>";
echo "a EL FICHERO EN EJECUCUION :";
echo "<pre>";
echo "EL NOMBRE DEL FICHERO ES " . "$_SERVER[SCRIPT_NAME]";
echo "</pre>";
//print_r($_SERVER);

$miCumpleTimestamp = strtotime("10-06-1999"); // Fecha en formato YYYY-MM-DD
$miCumpleFecha = date("d/m/Y", $miCumpleTimestamp); // Formato dd/mm/yyyy

echo "Mi cumpleaños en formato timestamp: $miCumpleTimestamp<br>";
echo "Mi cumpleaños en formato dd/mm/yyyy: $miCumpleFecha";
