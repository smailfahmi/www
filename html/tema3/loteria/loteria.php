<style>
    table,
    td {
        border: solid;
        color: green;
    }
</style>
<?php
$array = array();
for ($i = 1; $i < 51; $i++) {

    $array[$i] = $i;
}
$loteria = array();
generarale($loteria);
function generarale(&$loteria)
{
    $aleatorios1 = array();
    $aleatorios2 = array();
    for ($i = 0; $i < 5; $i++) {
        $numeroAleatorio = rand(1, 50);
        for ($j = 0; $j < count($aleatorios1); $j++) {
            if ($numeroAleatorio == $aleatorios1[$j]) {
                $numeroAleatorio = rand(0, 50);
            }
        }

        $aleatorios1[$i] = $numeroAleatorio;
    }
    $loteria[0] = $aleatorios1;
    //  print_r($aleatorios1);
    for ($i = 0; $i < 2; $i++) {
        $numeroAleatorio = rand(1, 10);
        for ($j = 0; $j < count($aleatorios2); $j++) {
            if ($numeroAleatorio == $aleatorios2[$j]) {
                $numeroAleatorio = rand(0, 50);
            }
        }
        $aleatorios2[$i] = $numeroAleatorio;
    }
    // print_r($aleatorios2);
    $loteria[1] = $aleatorios2;
}
print_r($loteria);
$llaves = current($loteria);
//print_r($llaves);
for ($i = 0; $i < count($loteria); $i++) {
    // Loop through the columns within each row
    for ($j = 0; $j < count($loteria[$i]); $j++) {
        echo $loteria[$i][$j] . " "; // Print each element
    }
    echo "<br>"; // Move to the next row
}
?>
<table>
    
    <tbody>
        <?php

        echo     "<tr>";


        for ($i = 1; $i < 50; $i++) {
            if ($i == $loteria[0][0] || $i == $loteria[0][1] || $i == $loteria[0][2] || $i == $loteria[0][3] || $i == $loteria[0][4]) {
                echo "<td style='background-color: red;'>";
                echo $array[$i] ;
                echo "</td>";
                if ($i == 7 || $i == 14 || $i == 21 || $i == 28 || $i == 35 || $i == 42 || $i == 49) {
                    echo "<br>";
                    echo "</tr>";
                    echo     "<tr>";
                }
            } else {
                echo "<td>";
                echo $array[$i] . " ";
                echo  "</td>";
                if ($i == 7 || $i == 14 || $i == 21 || $i == 28 || $i == 35 || $i == 42 || $i == 49) {
                    echo "<br>";
                    echo "</tr>";
                    echo     "<tr>";
                }
            }
        }
        ?>
    </tbody>
</table>

<table>
    <tbody>
        <?php
        echo     "<tr>";


        for ($i = 1; $i < 13; $i++) {
            echo "<td>";
            echo $array[$i] . " ";
            echo  "</td>";
            if ($i == 4 || $i == 8 || $i == 21 || $i == 28 || $i == 35 || $i == 42 || $i == 49) {
                echo "<br>";
                echo "</tr>";
                echo     "<tr>";
            }
        }
        ?>
    </tbody>
</table>