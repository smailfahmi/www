<?php
// Obtener los valores desde la URL
$valor_producto = $_GET['producto'];
$valor_pagado = $_GET['pago'];

// Calcular el cambio
$cambio = $valor_pagado - $valor_producto;

// Definir las denominaciones de monedas
$monedas = array(2, 1, 0.5, 0.2, 0.1, 0.05, 0.02, 0.01);
$contador_monedas = array_fill(0, count($monedas), 0);

// Calcular el número mínimo de monedas para el cambio
for ($i = 0; $i < count($monedas); $i++) {
    while ($cambio >= $monedas[$i]) {
        $cambio -= $monedas[$i];
        $contador_monedas[$i]++;
    }
}

// Mostrar el número mínimo de monedas para el cambio
for ($i = 0; $i < count($monedas); $i++) {
    if ($contador_monedas[$i] > 0) {
        echo $contador_monedas[$i] . " moneda(s) de " . $monedas[$i] . "€<br>";
    }
}
?>
