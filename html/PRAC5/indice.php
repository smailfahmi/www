<style>
    table, th, td {
  border:1px solid black;
}
</style>





<?php
$datos = [2, 5, 9, 7, 6, 3, 1, 5, 4, 8, 3, 2, 6, 9, 3, 5, 1, 2, 3];

// Ordenar el array y eliminar elementos duplicados
$resultado = array_unique($datos);
sort($resultado);

// Mostrar el resultado

print_r($resultado);
echo '<br>';
echo'---------------------------------------------'.'<br>';
foreach ($datos as $clave => $valor) {
    if ($valor == 3) {
        echo 'posicion ';
        echo $datos[$clave] = $clave;
        echo '<br>';
    }
}

// Mostrar el resultado
print_r($datos);

echo '<br>';
echo'-----------------------------------------------------------------------------';
// ejercicio 1
// $datos = [2, 5, 9, 7, 6, 3, 1, 5, 4, 8, 3, 2, 6, 9, 3, 5, 1, 2, 3];
// asort($datos);
// $unico = array_unique($datos);
// foreach ($unico as $key => $val) {
//     echo "$key = $val\n";
// }

// ejercicio 2
// echo "<br>";
// $clave = array_search(3, $datos);
// //echo $clave;
// while ($clave) {

//     $datos[$clave] = $clave;
//     $clave = array_search(3, $datos);
// }
// foreach ($datos as $key => $val) {
//     echo "$key = $val\n";
// //     echo "<br>";
// }
//ejercios 3
$largo = 4;
$ancho = 4;
$matriz = array();
echo "<br>";
for ($i = 0; $i < $largo; $i++) {
    $array[$i] = array();
    // print_r($array.$i);
    for ($j = 0; $j < $largo; $j++) {
        //Ponemos 1 cuando i o j sea 0
        if ($i == 0 || $j == 0) {
            $array[$i][$j] = 1;
        } else {
            $array[$i][$j] = $array[$i - 1][$j] + $array[$i][$j - 1];
        }

        //sino son 0 formula del aneterior tanto en i como en j
        //$array.$i.[0] = 1;

    }
}


for ($i = 0; $i < $largo; $i++) {
    echo "<pre>";
    foreach ($array[$i] as $key => $value) {

        echo $value . "        ";

        # code...
    } # code...
    echo "</pre>";
    echo " <br>";
}
?>
<table>
    <thead>
        <?php
        echo "<tr>";
        // for ($i = 0; $i < $largo; $i++) {
            // echo "<th>Tabla</th>";
        $i=0;
            foreach ($array[$i] as $key => $value) {
                echo "<th>$key</th>";
                $i++;
        
        }
        echo "</tr>";
        ?>
    </thead>
    <tbody>
        <?php
    
        for ($i = 0; $i < $largo; $i++) {
            echo "<tr>";
            foreach ($array[$i] as $key => $value) {

                echo "<td> ";
                echo $value;
                echo "</td> ";

                # code...
            } # code...
            echo "</tr>";
        }
      
        ?>

    </tbody>
</table>



// foreach ($matriz as $key => $val) {
// echo "$val";
// }