<?php

$variable = $_GET['variable'];
echo $variable . "<br>";
echo "Tipo de la variable: " . gettype($variable) . "<br>";


echo "Es numérico: " . is_numeric($variable) . "<br>";
echo "Es verdadero ?? ";
var_dump(is_numeric($variable));
echo "<br>";

if (is_numeric($variable)) {
    $variable = $variable + 0;
    echo "Es entero: " . is_int($variable) . "<br>";
    echo "Es float: " . is_float($variable) . "<br>";
}
