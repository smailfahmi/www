<?
$liga = array(
    "Zamora" => array(
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
    // ...
);

// Ahora, puedes utilizar un bucle `foreach` para dividir este array en arrays más pequeños para cada equipo:

// ```php
$equipos = array_keys($liga); // Obtiene una lista de nombres de equipos
print_r($equipos);
foreach ($equipos as $equipo1) {
    $partidosDelEquipo = $liga[$equipo1]; // Obtiene los partidos del equipo
    echo "Equipo: $equipo1\n";
    echo "<br>";
    foreach ($partidosDelEquipo as $equipo2 => $datosPartido) {
        echo "Equipo contra $equipo2:\n";
        $datosPartido = current($partidosDelEquipo);
        foreach ($datosPartido as $key => $value) {
            echo $datosPartido;
        }
      // print_r($datosPartido);
        echo "<br>";

    }
    
    echo "\n";
}
