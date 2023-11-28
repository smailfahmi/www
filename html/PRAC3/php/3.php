<?php
$ano = isset($_GET['ano']) ? $_GET['ano'] : 2023;
$mes = isset($_GET['mes']) ? $_GET['mes'] : 10;
$dia = isset($_GET['dia']) ? $_GET['dia'] : 3;
$fecha = "$ano-$mes-$dia";
$dia_semana1 = date('l', strtotime($fecha));
$dia_semana = date('w', mktime(0, 0, 0, $mes, $dia, $ano));

echo "La fecha $dia/$mes/$ano corresponde a un día de la semana: $dia_semana y otro metodo: $dia_semana1";
