<pre>
<?php
print_r($_SERVER);

print_r($_GET);

?>
</pre>


<?php
echo "AMBITO DE LAS VARIABLES";

$contador = 5;
function prueba_variable()
{
  //  echo $contador . "<br>";
}

function prueba_variable1($contador)
{
    echo $contador . "<br>";
    $contador++;
    echo $contador;
}
function prueba_variable1_referencia(&$contador)
{
    echo $contador . "<br>";
    $contador++;
    echo $contador;
}
function prueba_variable1_global()
{
    global $contador;
    echo $contador . "<br>";
    $contador++;
    echo $contador;
}

echo  "<p>no puede acceder</p>";
prueba_variable();
echo  "<p>pasado como parametros </p>";
prueba_variable1($contador);
echo  "<p>que le pasaa contaodr ?  </p>";
echo  "<p>pasado como referencia </p>";
prueba_variable1_referencia($contador);
echo  "<p>global</p>";
prueba_variable1_global();
echo  "<p>singlestone</p>";
function  contador()
{
    static $a = 0;
    $a++;
    echo "<br>" . $a;
}
contador();
contador();
contador();
contador();
contador();
contador();
echo  "<p>constante</p>";
define("user", "maria");
echo user;



?>