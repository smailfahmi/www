<?php
echo 5 <=> 5;
foreach ($_SERVER as $key => $value) {
    echo "<br> Clave : " . $key . " Informacion : " . $value;
}
foreach ($_SERVER as $value) {
    echo " Informacion : " . $value;
}

$pisos = 8;

for ($i = 0; $i < $pisos; $i++) {
    for ($k = $i; $k < $pisos - 1; $k++) {
        echo "&nbsp" . "&nbsp";
    }

    for ($j = 0; $j < $i; $j++) {
        echo "X";
        echo "&nbsp" . "&nbsp";
    }

    echo "<br>";
}


$linea = 8;

for ($i = 0; $i < $linea; $i++) {
    if ($i < $linea) {
        for ($k = $i; $k < $linea - 1; $k++) {
            echo "&nbsp" . "&nbsp";
        }

        for ($j = 0; $j < $i; $j++) {
            echo "X";
            echo "&nbsp" . "&nbsp";
        }

        echo "<br>";
    }
}

for ($i = 0; $i < $linea; $i++) {
    if ($i < $linea) {
        for ($k = $i; $k < $linea - 1; $k++) {
            echo "&nbsp" . "&nbsp";
        }

        for ($j = 0; $j < $i; $j++) {
            echo "X";
            echo "&nbsp" . "&nbsp";
        }

        echo "<br>";
    }
}
