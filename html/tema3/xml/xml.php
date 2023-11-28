<style>
    table,
    td,
    th {
        border: solid black;
        padding: auto;
        text-align: center;
    }
</style>
<?php
// echo "<pre>";
// if (file_exists('ficheroXML.xml')) {
//     $xml = simplexml_load_file('ficheroXML.xml');
//     print_r($xml);
//     foreach ($xml as $key) {
//         echo "El id : " . $key['id'];

//         echo " y la marca es : " . $key->marca;
//         echo "<br>";
//     }
// } else {
//     exit('Error abriendo test.xml.');
// }
// // lee fichero si saber las etiquetas 
//Podemos no saber el nombre de las etiquetas
// if (file_exists('ficheroXML.xml')) {
//     $xml = simplexml_load_file('ficheroXML.xml');
//     echo "<pre>";
//     //print_r($xml);
//     foreach ($xml as $elemento) {
//         leerElemento($elemento);
//     }
// } else {
//     exit('Error abriendo ficheroXML.xml.');
// }

// function leerElemento($elemento){
//     foreach ($elemento->children() as $a) {
//         echo $a;
//     }
//     echo $elemento->children()[0];
//     echo $elemento->children()[1];
//     echo $elemento->children()->count();
// }
// para escribir y crear 
$xml = new SimpleXMLElement('<juegos></juegos>');
$juego1 = $xml->addChild('juego');
$juego1->addAttribute('id', '1');
$juego1->addAttribute('disponible', 'si');
$juego1->addChild('nombre', 'Fifa');
$dispositivos = $juego1->addChild('dispositivos');
$dispositivos->addChild('dispositivo', 'play');
$dispositivos->addChild('dispositivo', 'xbox');

$juego2 = $xml->addChild('juego');
$juego2->addAttribute('id', '2');
$juego2->addAttribute('disponible', 'no');
$juego2->addChild('nombre', 'gta');
$dispositivos = $juego2->addChild('dispositivos');
$dispositivos->addChild('dispositivo', 'play');
$dispositivos->addChild('dispositivo', 'xbox');

$juego3 = $xml->addChild('juego'); // Cambié de $juego2 a $juego3
$juego3->addAttribute('id', '3'); // Cambié de $juego2 a $juego3
$juego3->addAttribute('disponible', 'si'); // Cambié de $juego2 a $juego3
$juego3->addChild('nombre', 'tetrix'); // Cambié de $juego2 a $juego3
$dispositivos = $juego3->addChild('dispositivos'); // Cambié de $juego2 a $juego3
$dispositivos->addChild('dispositivo', 'pc');
$dispositivos->addChild('dispositivo', 'play');
$dispositivos->addChild('dispositivo', 'xbox');
$xml->asXml('juegos.xml');
echo "<pre>";
// print_r($xml);
echo "<pre>";
if (file_exists('juegos.xml')) {
    $xml = simplexml_load_file('juegos.xml');
    foreach ($xml->juego as $key) { // Cambié de $xml a $xml->juego
        if ($key['disponible'] == 'si') {
            echo "El juego: " . $key->nombre;
            echo " dispositivos compatibles ";
            foreach ($key->dispositivos->dispositivo as $key1) { // Cambié de $key->dispositivos a $key->dispositivos->dispositivo
                echo " " . $key1;
            }
            echo "<br>";
        }
    }
} else {
    exit('Error abriendo juegos.xml.');
}
//----------------------------------------------------------------------------------------
function cambiardispo($id, $nombre)
{
    $xml = simplexml_load_file($nombre);
    foreach ($xml->juego as $key) {
        if ($key['id'] == $id) {
            $key['disponible'] = 'si'; // Modifica el valor del atributo 'disponible'
        }
    }
    $xml->asXml($nombre); // Guarda los cambios en el archivo XML
}

cambiardispo(2, 'juegos.xml');

//-------------------------------------------------------------------------
function agregarJuego($xml, $id, $disponible, $nombre, $plataformas)
{
    $juego = $xml->addChild('juego');
    $juego->addAttribute('id', $id);
    $juego->addAttribute('disponible', $disponible);
    $juego->addChild('nombre', $nombre);

    $dispositivos = $juego->addChild('dispositivos');
    foreach ($plataformas as $plataforma) {
        $dispositivos->addChild('dispositivo', $plataforma);
    }
}

// Uso de la función para agregar un nuevo juego
agregarJuego($xml, '4', 'si', 'Mario Kart', ['switch', 'wii']);
$xml->asXml('juegos.xml');
//-------------------------------------------------------------------------------
?>
<table>
    <tr>
        <th>

            juego
        </th>
        <th>

            id
        </th>
        <th>
            compatibles
        </th>
    </tr>
    <?
    echo "<pre>";
    if (file_exists('juegos.xml')) {
        $xml = simplexml_load_file('juegos.xml');
        foreach ($xml->children() as $juego) {

            $disponible = $juego['disponible'];
            if ($disponible == 'si') {
                echo "<tr>";
                echo '<td>';
                echo $juego->nombre;
                echo '</td>';
                echo '<td>';
                echo $juego['id'];
                echo '</td>';
                echo '<td>';
                foreach ($juego->dispositivos->children() as $dispositivo) {
                    echo  $dispositivo;
                    echo "<br>";
                }
                echo '</td>';
                echo "</tr>";
            }
        }
    } else {
        exit('Error abriendo juegos.xml.');
    }
    ?>
</table>

