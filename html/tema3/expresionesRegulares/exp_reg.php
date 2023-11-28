<?
// $exp = '/maria/';
// echo preg_match($exp, 'la mejor profe se llama maria jiji');

// echo '<br>uso del comodin';
// echo "<br>";
// $exp = '/mari./';
// echo preg_match($exp, 'la mejor profe se llama maria jiji');
// echo preg_match($exp, 'la mejor profe se llama mario jiji');

// echo '<br>uso de maria o mario';
// echo "<br>";
// $exp = '/mari[ao]/';
// echo preg_match($exp, 'la mejor profe se llama maria jiji');
// echo preg_match($exp, 'la mejor profe se llama mario jiji');


// echo '<br>busqueda de letra+espacio+letra';
// echo "<br>";
// $exp = '/\s[A-Za-z]\s/';
// $frase = 'maria y mi madre o mario y mi padre';
// echo $frase;
// $array = [];
// echo preg_match_all($exp, $frase, $array);
// echo "<pre>";
// print_r($array);

// echo'<br> NUMERICO';
// echo "<br>";
// $frase = 'maria es la numero 11 y mi 2223 madre o mario y mi padre';
// //$exp= '[0-9]';
// $array = [];
// // $exp= '/\d\d/';
// $exp= '/\d{4}/';
// preg_match_all($exp,$frase,$array);
// print_r($array);

// echo '<br>uso del comodin';
// echo "<br>";
// $exp = '/mari[^ao]/';
// echo preg_match($exp, 'la mejor profe se llama maris jiji');
// echo preg_match($exp, 'la mejor profe se llama mario jiji');
//+una o mas veces *varias veces 
// nov , noviembre , november
//echo '<br>solo permite nov , noviembre , november';
//$exp = '/^(nov|noviembre|november)$/i'; // La 'i' al final hace que la coincidencia sea insensible a mayúsculas/minúsculas
//$exp = '/^nov(iembre|ember)?/i';
// if (preg_match($patron, $cadena)) {
//     echo "La cadena coincide con el patrón.";
// } else {
//     echo "La cadena no coincide con el patrón.";
// }
// echo "<br>";
// echo preg_match($exp, 'november');
//echo preg_match($exp, 'la mejor profe se llama mario jiji');

//echo 'buscar en un array';
// $array = ['luenes', 'martes', 'sabado'];
// $esp = '/es/';
// print_r(preg_grep($esp, $array));

// $array = [1, 's', 'B', 5];
// $patron =  ['/^\d$/', '/^\D$/'];
// $cambio = ['numero', 'letra'];
// echo "<pre>";
// print_r(preg_replace($patron, $cambio, $array));

// // en el siguiente solo devuelve si hay cambios
// $array = [1, 's', 'B', 5];
// $patron =  ['/^\d$/'];
// $cambio = ['numero'];
// echo "<pre>";
// print_r(preg_filter($patron, $cambio, $array));


// $frase= 'maria es mi profe favo 1 si o que ' ;
// $patron =  ['/a/'];
// $cambio = '@';
// echo "<pre>";
// print_r(preg_filter($patron, $cambio, $frase));
// echo "<pre>";
// echo "coregir fechas";
// $frase = 'si hay una fecha 1/2/2023 y otra mal 1/2/2023 o mal tambien 10/12/20';
//si el mes tiene solo dig añado 0
//año tiene 2 dig mayor de 20 pongo 20 añado 20 y si es menor pongo 19
// function corrige($coincide)
// {
//     echo "<pre>";
//     print_r($coincide);
//     if ($coincide[1] < 10 && strlen($coincide[1]) != 2) {
//         $coincide[1] = '0' . $coincide[1];
//     }
//     if ($coincide[3] < 10 && strlen($coincide[1]) != 2) {
//         $coincide[3] = '0' . $coincide[3];
//     }
//     if ($coincide[5] <= 23) {
//         $coincide[5] = '20' . $coincide[5];
//     }
//     if ($coincide[5] > 23 && $coincide[1] < 100) {
//         $coincide[5] = '19' . $coincide[5];
//     }
//     return $coincide[1] . $coincide[2] . $coincide[3] . $coincide[4] . $coincide[5];
// }
// $array = [];

// $exp = '/(\d{1,2})(\/)(\d{1,2})(\/)(\d{2,4})/';
// print_r(preg_replace_callback($exp, 'corrige', $frase));
// //preg_match_all($exp,$frase,$array);
//manera bartulos
// $frase = 'si hay una fecha 1/2/2023 y otra mal 1/2/2023 o mal tambien 10/12/20';
// function corrige($coincide){
//     print_r($coincide);
//     if ($coincide[1]<10 && strlen($coincide[1])<2) {
//         $coincide[1]= "0" . $coincide[1];
//     }
//     if ($coincide[3]<10 && strlen($coincide[3])<2) {
//         $coincide[3]= "0" . $coincide[3];
//     }
//     if ($coincide[5]<=23 && strlen($coincide[5])==2) {
//         $coincide[5]= "20" . $coincide[5];

//     }elseif($coincide[5]>23 && $coincide[5]<100 && strlen($coincide[5])==2) {
//         $coincide[5]= "19" . $coincide[5];

//     }
//     return $coincide[1].$coincide[2].$coincide[3].$coincide[4].$coincide[5];
// }

// $exp = "/(\d{1,2})(\/)(\d{1,2})(\/)(\d{2,4})/";
// // preg_match_all($exp,$frase, $array);
// // print_r($array);
// print_r(preg_replace_callback($exp,"corrige",$frase));



//miguel

$frase = 'Si hay una fecha 1/2/2012 está bien pero 10/2/2021 mal, y 15/12/21 mal';
 //si el mes tiene solo un digito, añadir 0 delante, y el dia igual
 //si el año tiene 2 dig, si es menor de 23 añado y si es mayor añado 19
 
 function corrige($coincide){
    echo "<pre>";
    print_r($coincide);
    if($coincide[1]<10 && strlen($coincide[1])!=2){
        $coincide[1] = '0'.$coincide[1];
    }
    if($coincide[3]<10 && strlen($coincide[3])!=2){
        $coincide[3] = '0'.$coincide[3];
    }
    if($coincide[5]<=23){
    $coincide[5] = '20'.$coincide[5];
    } elseif($coincide[5]>23 && $coincide[5]<100){
        $coincide[5] = '19'.$coincide[5];
    }
    return $coincide[1].$coincide[2].$coincide[3].$coincide[4].$coincide[5];
 }
 
 $exp = '/(\d{1,2})(\/)(\d{1,2})(\/)(\d{2,4})/';
 //preg_match_all($exp,$frase,$array);
 //print_r($array);
 
 print_r(preg_replace_callback($exp,'corrige',$frase));

 

 