<?
function enviado()
{
    if (!isset($_REQUEST['Enviar'])) {
        return false;
    }
    return true;
}
function validacion(&$errores)
{
    comID($errores);
    comAno($errores);
    if (textoVacio('titulo')) { //como solo hay que validar que no este vacio  lo hago aqui directamente 
        $errores['titulo'] = "RELLLENE CAMPO";
    }
    if (textoVacio('director')) {
        $errores['director'] = "RELLLENE CAMPO";
    }
    comDuracion($errores);

    comActores($errores);
    comSinopsi($errores);

    if (count($errores) == 0) {
        return true;
    } else
        return false;
}
function textovacio($name)
{
    if (empty($_REQUEST[$name])) {
        return true;
    }
    return false;
}
function escribirErrores($errores, $name)
{

    if (isset($errores[$name])) {
        echo '<span style="color: red;">' . $errores[$name] . '</span>';
    }
}
function escribirNombre($name)
{
    if (enviado() && !empty($_REQUEST[$name])) {
        echo $_REQUEST[$name];
    }
}
function comID(&$errores)
{
    if (textoVacio('id')) {
        $errores['id'] = "RELLLENE CAMPO";
    } elseif (!preg_match('/^\d{4}[A-Z]{2}\-\d{3}$/', $_REQUEST['id'])) {
        $errores['id'] = "COMBINACION INCORRECTA";
    }
}
function comAno(&$errores)
{
    if (textoVacio('ano')) {
        $errores['ano'] = "RELLLENE CAMPO";
    } elseif (!preg_match('/^\d{4}$/', $_REQUEST['ano'])) {
        $errores['ano'] = "COMBINACION INCORRECTA";
    }
}
function comDuracion(&$errores)
{
    if (textoVacio('duracion')) {
        $errores['duracion'] = "RELLLENE CAMPO";
    } elseif (!preg_match('/^\d{2}\:\d{2}\:\d{2}$/', $_REQUEST['duracion'])) {
        $errores['duracion'] = "COMBINACION INCORRECTA";
    }
}
function comActores(&$errores)
{
    if (textoVacio('actores')) {
        $errores['actores'] = "RELLLENE CAMPO";
    } elseif (!preg_match('/^([A-Za-z]+\,)+$/', $_REQUEST['actores'])) {
        $errores['actores'] = "COMBINACION INCORRECTA";
    }
}
function comSinopsi(&$errores)
{
    $texto = $_REQUEST['comentario'];
    if (textoVacio('comentario')) {
        $errores['comentario'] = "RELLLENE CAMPO";
    } elseif (strlen($texto) < 50) {
        $errores['comentario'] = "CAMPO INSUFICIENTE";
    }
}
function recuerdaChek($name, $valor)
{
    if (enviado() && isset($_REQUEST[$name])) {
        foreach ($_REQUEST[$name] as $key => $value) {
            if ($valor == $value)
                return 'checked';
        }
        return '';
    } else if (isset($_REQUEST['borrar']))
        echo '';
}
//aqui ya son funciones distintas a las validaciones


function rellenapelis()
{
    $xmlFile = 'peliculas.xml';

    // Verificar si el archivo XML existe
    if (file_exists($xmlFile)) {
        // Cargar el archivo XML existente
        $dom = new DOMDocument();
        $dom->load($xmlFile);

        $raiz = $dom->documentElement;
    } else {
        // Si el archivo no existe, crear uno nuevo
        $dom = new DOMDocument("1.0", "utf-8");
        $raiz = $dom->appendChild($dom->createElement('peliculas'));
    }

    $pelicula = $dom->createElement('pelicula');
    $pelicula->setAttribute('id', $_REQUEST['id']);
    $titulo = $dom->createElement('titulo', $_REQUEST['titulo']);
    $director = $dom->createElement('director', $_REQUEST['director']);
    $lanzamiento = $dom->createElement('lanzamiento', $_REQUEST['ano']);
    $actores = $dom->createElement('actores');

    $pelicula->appendChild($titulo);
    $pelicula->appendChild($director);
    $pelicula->appendChild($lanzamiento);

    // Agregar actores
    $actorList = explode(",", $_REQUEST['actores']);
    foreach ($actorList as $actorName) {
        $actor = $dom->createElement('actor', $actorName);
        $actores->appendChild($actor);
    }

    $pelicula->appendChild($actores);
    $raiz->appendChild($pelicula);

    $dom->formatOutput = true;
    $dom->save($xmlFile);
    mostrar();
}
function mostrar() //funcion mostrar pero no consigo añadir mas de una pelicula
{

    $dom = new DOMDocument("1.0", "utf-8");
    $dom->load('peliculas.xml');

    $peliculas = $dom->getElementsByTagName('pelicula');

    foreach ($peliculas as $pelicula) {



        foreach ($pelicula->childNodes as  $value) {
            if ($value->nodeType == 1) {
                if ($value->childElementCount > 0) {
                    echo $value->tagName . " : ";
                    foreach ($value->childNodes as  $actor) {
                        if ($actor->nodeType == 1) {
                            if ($actor->nodeType == 1 &&  !empty($actor->nodeValue)) {
                                echo  $actor->textContent . ",";
                            }
                        }
                    }
                } else {
                    echo $value->tagName . " : " . $value->textContent;
                    echo '<br>';
                }
            }
        }
    }
}
function buscar()
{
}
function nuevapeli() //no soy capaz de añadir mas peliculas que una por ahi van los tiros pero ni idea 
{
    $dom = new DOMDocument("1.0", "utf-8");
    $dom->load('peliculas.xml');
    $peliculas = $dom->getElementsByTagName('peliculas');
    $pelicula = $dom->getElementsByTagName('pelicula');
    rellenapelis();
    foreach ($peliculas as $key => $value) {
        $value->appendChild($peliculas);
    }
    $dom->formatOutput = true;
    $dom->save('peliculas.xml');
    mostrar();
}
