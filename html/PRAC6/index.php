<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>
<?php
$liga =
    array(
        "Zamora" =>  array(
            "Salamanca" => array(
                "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
            ),
            "Avila" => array(
                "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
            ),
            "Valladolid" => array(
                "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 1
            )
        ),
        "Salamanca" =>  array(
            "Zamora" => array(
                "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
            ),
            "Avila" => array(
                "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
            ),
            "Valladolid" => array(
                "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 2, "Penalti" => 1
            )
        ),
        "Avila" =>  array(
            "Zamora" => array(
                "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 2
            ),
            "Salamanca" => array(
                "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 3, "Penalti" => 0
            ),
            "Valladolid" => array(
                "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 0, "Penalti" => 1
            )
        ),
        "Valladolid" =>  array(
            "Zamora" => array(
                "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
            ),
            "Salamanca" => array(
                "Resultado" => "3-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
            ),
            "Avila" => array(
                "Resultado" => "1-1", "Roja" => 1, "Amarilla" => 1, "Penalti" => 2
            )
        ),
    );

$auxiliar = [];
echo 'ejercicio  2 -------------------------------------------------------------';
echo '<style>';
echo '.container { display: flex; border: 1px solid black; }';
echo '.item { flex: 1; text-align: center; border: 1px solid black; }';
echo '</style>';
echo '<pre>';
echo '<table>';
echo '<tr>';
echo '<td>EQUIPOS</td>';
foreach ($liga as $key => $value) {
    echo '<td>' . strtoupper($key) . '</td>';
    $auxiliar[] = $key;
}
foreach ($liga as $equipo => $informacion) {
    $conta = 0;
    echo '<tr>';
    echo '<td>' . strtoupper($equipo) . '</td>';
    foreach ($informacion as $enfrenta => $resultados) {
        $resultado = current($resultados);
        next($resultados);
        $rojas = current($resultados);
        next($resultados);
        $amarillas = current($resultados);
        next($resultados);
        $penalti = current($resultados);
        if ($auxiliar[$conta] == $equipo)
            echo '<td></td>';

        echo '<td style="text-align:center;">';
        echo '<div style="flex: 1; text-align: center; border: 1px solid black;background:orange;">' . $resultado . '</div>';
        echo '<div class="container">';
        echo '<div class="item" style=background:red;">' . $rojas . '</div>';
        echo '<div class="item" style=background:yellow;">' . $amarillas . '</div>';
        echo '<div class="item" style=background:green;">' . $penalti . '</div>';
        echo '</div>';
        echo '</td>';
        $conta++;
    }
}
echo '<td></td>';
// otra version del ejercicio
echo '<style>
    .container { display: flex; border: 1px solid black; }
    .item { flex: 1; text-align: center; border: 1px solid black; }
    .resultado { flex: 1; text-align: center; border: 1px solid black; background: orange; }
    .rojas { background: red; }
    .amarillas { background: yellow; }
    .penalti { background: green; }
</style>';
echo '<pre>';
echo '<table>';
echo '<tr>';
echo '<td>EQUIPOS</td>';
foreach ($liga as $key => $value) {
    echo '<td>' . strtoupper($key) . '</td>';
    $auxiliar[] = $key;
}
foreach ($liga as $equipo => $informacion) {
    $conta = 0;
    echo '<tr>';
    echo '<td>' . strtoupper($equipo) . '</td>';
    foreach ($informacion as $enfrenta => $resultados) {
        $resultado = current($resultados);
        next($resultados);
        $rojas = current($resultados);
        next($resultados);
        $amarillas = current($resultados);
        next($resultados);
        $penalti = current($resultados);
        if ($auxiliar[$conta] == $equipo)
            echo '<td></td>';

        echo '<td style="text-align:center;">';
        echo '<div class="resultado">' . $resultados['Resultado'] . '</div>';
        echo '<div class="container">';
        echo '<div class="item rojas">' . $resultados['Roja'] . '</div>';
        echo '<div class="item amarillas">' . $resultados['Amarilla'] . '</div>';
        echo '<div class="item penalti">' . $resultados['Penalti'] . '</div>';
        echo '</div>';
        echo '</td>';
        $conta++;
    }
}
echo '<td></td>';
echo '<br>';
echo 'otra version ----------------------------------------------------------------------';
echo '<pre>';
// maneras de crear multidimensionales
$zamora = [];
$avila = [];
$salamanca = [];
$valladolid = [];



foreach ($liga as $key => $value) {
    foreach ($value as $key1 => $value1) {
        $resultado1 = substr($value1['Resultado'], 0, 1);
        $resultado2 = substr($value1['Resultado'], 2, 3);
        if ($resultado1 > $resultado2) {
            # code...
        }
        switch ($key1) {
            case 'Zamora':
                $zamora['golesf'][] = $resultado2;
                $zamora['golesc'][] = $resultado1;
                break;
            case 'Avila':
                $avila['golesf'][] = $resultado2;
                $avila['golesc'][] = $resultado1;
                break;
            case 'Salamanca':
                $salamanca['golesf'][] = $resultado2;
                $salamanca['golesc'][] = $resultado1;
                break;
            case 'Valladolid':
                $valladolid['golesf'][] = $resultado2;
                $valladolid['golesc'][] = $resultado1;
                break;
        }
        switch ($key) {
            case 'Zamora':
                $zamora['golesf'][] = $resultado1;
                $zamora['golesc'][] = $resultado2;
                break;
            case 'Avila':
                $avila['golesf'][] = $resultado1;
                $avila['golesc'][] = $resultado2;
                break;
            case 'Salamanca':
                $salamanca['golesf'][] = $resultado1;
                $salamanca['golesc'][] = $resultado2;
                break;
            case 'Valladolid':
                $valladolid['golesf'][] = $resultado1;
                $valladolid['golesc'][] = $resultado2;
                break;
        }
    }
    echo '<br>';
}
$puntuaciones = [
    'zamora' => $zamora,
    'avila' => $avila,
    'salamanca' => $salamanca,
    'valladolid' => $valladolid
];
// print_r($puntuaciones);
$resul = array(
    'zamora' => array(
        'favor' => 0,
        'contra' => 0,
        'puntos' => 0,
    ),
    'avila' => array(
        'favor' => 0,
        'contra' => 0,
        'puntos' => 0,
    ),
    'salamanca' => array(
        'favor' => 0,
        'contra' => 0,
        'puntos' => 0,
    ),
    'valladolid' => array(
        'favor' => 0,
        'contra' => 0,
        'puntos' => 0,
    )
);

foreach ($puntuaciones as $key => $value) {
    for ($conta = 0; $conta < count($value['golesf']); $conta++) {
        $resul[$key]['favor'] += $value['golesf'][$conta];
        $resul[$key]['contra'] += $value['golesc'][$conta];

        if ($value['golesf'][$conta] > $value['golesc'][$conta]) {
            $resul[$key]['puntos'] += 3;
        } elseif ($value['golesf'][$conta] === $value['golesc'][$conta]) {
            $resul[$key]['puntos'] += 1;
        }
    }
}
echo '<table>';
echo '<tr>';
echo '<td>EQUIPOS</td>';
echo '<td>GOLESF</td>';
echo '<td>GOLESC</td>';
echo '<td>PUNTOS</td>';
foreach ($resul as $equipo => $datos) {
    echo '<tr>';
    echo '<td>' . $equipo . '</td>';
    echo '<td>' . $datos['favor'] . '</td>';
    echo '<td>' . $datos['contra'] . '</td>';
    echo '<td>' . $datos['puntos'] . '</td>';
}
print_r($resul);
