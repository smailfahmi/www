<?
$dom = new DOMDocument("1.0", "utf-8");
$raiz = $dom->appendChild($dom->createElement('insrumentos'));
$instrumento = $dom->createElement('instrumento');
$nombre = $dom->createElement('nombre', 'guitarra');
$familia = $dom->createElement('familia', 'cuerda');
$raiz->appendChild($instrumento);
$instrumento->appendChild($nombre);
$instrumento->appendChild($familia);
$instrumento->setAttribute('id', '1');

$instrumento = $raiz->appendChild($dom->createElement('instrumento'));
$instrumento->appendChild($dom->createElement('nombre', 'violin'));
$instrumento->appendChild($dom->createElement('familia', 'cuerda'));
$instrumento->setAttribute('id', '2');

$dom->formatOutput = true;
$dom->save('instrumentos.xml');


$dom->load('instrumentos.xml');
echo '<a href="./descarga.php">descargar</a>';
//descargar archivo
// $fileName = "instrumentos.xml";
// header('Content-type: text/xml'); // Corrected the content type
// header("Content-Disposition: attachment; filename=$fileName");
// readfile($fileName);//ESTA LINEA SOBRA 

echo '<pre>';
//esto solo funciona si el xml esta en linea es decir sin el codigo formateado 
// print_r($dom);
foreach ($dom->childNodes as $key) {
    foreach ($key->childNodes as $key1) {
        if ($key1->nodeType == 1) {
            $nodo = $instrumento->firstChild;
            do {
                if ($key1->nodeType == 1) {
                    echo "\n" . $nodo->tagName . ":" . $nodo->nodeValue;
                }
            } while ($nodo = $nodo->nextSibling);
        }
        // echo "\nNombre: " . $key1->firstChild->nodeValue;
        // echo "\nNombre: " . $key1->firstChild->firstChild->data;
    }
}

echo '<pre>';
foreach ($dom->childNodes as $key) {
    if ($key->nodeType == 1) { // Verificar si el nodo es de tipo elemento (1)
        foreach ($key->childNodes as $key1) {
            if ($key1->nodeType == 1) { // Verificar si el nodo hijo es de tipo elemento (1)
                echo "\n" . $key1->tagName . ":" . $key1->nodeValue;
            }
        }
    }
}


# code...

// Iterar sobre los elementos 'instrumento' e imprimir sus detalles
echo '<pre>';
foreach ($dom->getElementsByTagName('instrumento') as $instrumento) {
    $nombre = $instrumento->getElementsByTagName('nombre')->item(0)->nodeValue;
    $familia = $instrumento->getElementsByTagName('familia')->item(0)->nodeValue;

    echo "\nNombre: " . $nombre;
    echo "\nFamilia: " . $familia;
}
