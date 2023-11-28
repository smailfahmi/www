<?php
echo time();
echo "<br>";
echo "zona que yine el servidor";
echo "<br>";
echo date_default_timezone_get();
echo "<br> cambio";
echo "<br>";
date_default_timezone_set("Europe/Madrid");
echo date_default_timezone_get();
echo "<br> cambio";
echo "<br>";
echo date("r");
echo "<br> en españa";
echo "<br>";
echo date("d/m/y H:i:s");
echo "hola";
echo "<p>STRING TO FECHA</p>";

$micumple = strtotime("10/06/1999");
echo $micumple;
echo "<p>" . date("d/m/y", $micumple) . "</p>";
$ho = strtotime("now");
echo "<p>" . date("d/m/y", $ho) . "</p>";

$micumple = new DateTime("1999-06-10");
$hoy  = new DateTime();
$intervalo = $micumple->diff($hoy);
echo "<pre>";
print_r($intervalo);
echo "</pre>";


echo "<pre>";
print_r(getdate());
echo "</pre>";

//$ruta = $_SERVER . ['SCRIPT_FILENAME'];
echo "<a href='http://" . $_SERVER['SERVER_ADDR'] . "./micodigo.php?fichero=" . $_SERVER['SCRIPT_FILENAME'] . "'>Ver codigo</a>";
// echo "<a href='./micodigo.php?fichero=".$ruta."'>ver mi codigo</a>";
