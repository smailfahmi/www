<?php
//array numerico
$arrayNum = array(10);
print_r($arrayNum);
echo "<br>";
$array = array("lunes", "martes", "miercoles", "jueves", "viernes");
print_r($array);
echo "<br>";
$array1 = array("lunes", 1, "miercoles");
print_r($array1);
var_dump($array1);
echo "<br>";
echo gettype($array);

echo "<br>";
$array2 = ["lunes", 1, "miercoles"];
print_r($array2);
var_dump($array2);

for ($i = 0; $i < count($array); $i++) {
    echo "<br>" . $array[$i];
}


//array dinamico 
//modificar su tamaño /contenido
$array[5] = "sabado";
for ($i = 0; $i < count($array); $i++) {
    echo "<br>" . $array[$i];
}
$array[7] = "fiesta";
for ($i = 0; $i < count($array); $i++) {
    echo "<br>" . $array[$i];
}

foreach ($array as $key => $value) {
    echo "<br>" . $array[$key];
    echo "<br>" . $value;
}

print_r(array_keys($array));

//array asociativos
$notas = array("smail" => 10, "mario" => 9);
foreach ($notas as $key => $value) {
    echo "<br> la nota de $key (key) es : $value(value)";
}


//arrays multiples
$arraydam = array("PROGRAMACION" => "JAVA", "SISTEMAS INFORMATICOS" => "LINUX");
$ciclos = array(
    "DAM" => $arraydam, "DAW" => array("CLIENTE" => "PHP", "SERVIDOR" => "JS"),
    "ASIR" => array("CLIENTEs" => "PHPs", "SERVIDORs" => "JSs")
);
//Array numerico 

echo "<pre>";
print_r($ciclos);
echo "<pre>";
foreach ($ciclos as $key => $value) {
    echo "<br> el ciclo $key tiene : ";
    foreach ($value as $siglas => $value1) {
        echo "<br> $siglas es : $value1";
    }
}
//reset ir primero
echo "<pre>";
while (current($ciclos)) {
    //print_r(current($ciclos));
    echo "<br> el ciclo " . key($ciclos) . "tiene :";
    $ciclo = current($ciclos);
    while (current($ciclo)) {
        echo "<br> el ciclo " . key($ciclo) . "tiene :" . current($ciclo);
        next($ciclo);
    }

    next($ciclos);
}
echo "<pre>";
