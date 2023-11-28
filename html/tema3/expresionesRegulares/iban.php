<?
echo'<br> NUMERICO';
echo "<br>";
$frase = 'ES00 0000 0000 00 0000000000';
//$exp= '[0-9]';
$array = [];
// $exp= '/\d\d/';
$exp= '/^[A-Z]{2}\d{2}\s\d{4}\s\d{4}\s\d{2}\s\d{10}$/';
echo preg_match($exp,$frase,$array);

//print_r($array);