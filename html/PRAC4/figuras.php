<?php
// Obtener el número de filas desde la URL
$num_filas = $_GET['filas'];

// Bucle para imprimir la pirámide
for ($i = 1; $i <= $num_filas; $i++) {
    for ($j = 1; $j <= $num_filas - $i; $j++) {
        echo "&nbsp;&nbsp;&nbsp;";
    }
    for ($j = 1; $j <= 2 * $i - 1; $j++) {
        echo "*&nbsp;";
    }
    echo "<br>";
}

// Bucle para imprimir la pirámide hueca
for ($i = 1; $i <= $num_filas; $i++) {
    for ($j = 1; $j <= $num_filas - $i; $j++) {
        echo "&nbsp;&nbsp;&nbsp;";
    }
    for ($j = 1; $j <= 2 * $i - 1; $j++) {
        if ($j == 1 || $j == 2 * $i - 1 || $i == $num_filas) {
            echo "*&nbsp;";
        } else {
            echo "&nbsp;&nbsp;&nbsp;";
        }
    }
    echo "<br>";
}


// Bucle para imprimir el rombo hueco


for ($i = 1; $i <= $num_filas; $i++) {
    for ($j = 1; $j <= $num_filas - $i; $j++) {
        echo "&nbsp;&nbsp;&nbsp;";
    }
    for ($j = 1; $j <= 2 * $i - 1; $j++) {
        if ($j == 1 || $j == 2 * $i - 1 ) {

            echo "*&nbsp;";
        } else {
            echo "&nbsp;&nbsp;&nbsp;";
        }
    }
    echo "<br>";
}

for ($i = $num_filas - 1; $i >= 1; $i--) {
    for ($j = 1; $j <= $num_filas - $i; $j++) {
        echo "&nbsp;&nbsp;&nbsp;";
    }
    for ($j = 1; $j <= 2 * $i - 1; $j++) {
        if ($j == 1 || $j == 2 * $i - 1 || $i == $num_filas) {
            echo "*&nbsp;";
        } else {
            echo "&nbsp;&nbsp;&nbsp;";
        }
    }
    echo "<br>";
}
?>