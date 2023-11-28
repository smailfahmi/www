<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tema 2</title>

</head>

<body>

    <h1>Tema 2</h1>

    <h3>Echo</h3>

    <?php

        echo "Hola Mundo";

        echo "<br>Hola mundo","hola";

 

        print "<br>Hola mundo con print";

        print "<br>";

        print "<h3>Formas de escribir</h3>";

        //17.99 escribirlo como un String

        printf("%s","17,99");

        print "<br>";

        //17.99 escribirlo como un entero

        printf("%d","17,99");

        print "<br>";

        //17.99 escribirlo como un decimal

          //(hay que usar . en lugar de ,)

        printf("%f","17.99");

 

        print "<br>Informacion de var_dump<br>";

        var_dump("mario");

        print "<br>";

        var_dump(7);

 

        //declarar variables

        print "<h3>Variables</h3>";

        print "<h4>Entero</h4>";

        $entero = 6;

        echo "Mi variable es: $entero , es de tipo " . gettype($entero);

        print "<h4>Decimal</h4>";

        $decimal = 6.5;

        echo "Mi variable es: $decimal , es de tipo " . gettype($decimal);

 

        print "<h4>Boolean</h4>";

        $booleano = true;

        echo "Mi variable es: $booleano , es de tipo " . gettype($booleano) . "<br>";

        var_dump($booleano);

 

        print "<h4>Cadena</h4>";

        $cadena="Hola";

        echo "Mi variable es: $cadena , es de tipo " . gettype($cadena) . "<br>";

       

        print "<h4>Nulo</h4>";

        $nulo = null;

        echo "Mi variable es: $nulo , es de tipo " . gettype($nulo) . "<br>";

 

        $cadena2 = "se escribe con comillas \" a\"";

        print $cadena2;

 

        $heredoc = <<< TEXT

        Se puede escribir todo lo que se quiera <p> " comillas "</p>

        TEXT;
        echo $heredoc;

        $var =0x2A;
        echo $var;
$var =8.3e-1;
echo $var;
echo "<h2>conversion de tipo s</h2>";




$a = 3;
$b = 4.5;
$c ="maria";
$d =true;
$e =false;
 
 
$r =$a-$b;
echo "Mi variable es: $a,$b y $r es de tipo " . gettype($r) . "<br>";

//con . en vez de menos concatena
 
$r =$a.$b;
echo "Mi variable es: $a,$b y $r es de tipo " . gettype($r) . "<br>";


 
$r =$a+$d;
echo "Mi variable es: $a,$d y $r es de tipo " . gettype($r) . "<br>";

 
$r =$a-$e;
echo "Mi variable es: $a,$e y $r es de tipo " . gettype($r) . "<br>";

 
$r =$a.$e;
echo "Mi variable es: $a,$e y $r es de tipo " . gettype($r) . "<br>";

echo "<br>";
$r =$a+(int)$b;
echo "Mi variable es: $a,$b y $r es de tipo " . gettype($r) . "<br>";


echo "<h1>variable de variable</h1>";
$al1="miguel";
$al2="miguel1";
$al3="migue2";
$al4="miguel3";

$elegido  = "al".random_int (1,4);

echo $$elegido


    ?>

<a href="mipagina.php?nombre=smail&nombre1=maria">pasar nombre</a>
</body>

</html>