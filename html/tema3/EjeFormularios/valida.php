
<?php
session_start(); // Inicia la sesión al comienzo del archivo


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == UPLOAD_ERR_OK) {
        $nombre_temporal = $_FILES["imagen"]["tmp_name"];
        $nombre_archivo = $_FILES["imagen"]["name"];
        $directorio_destino = "imagenes_subidas/"; // Ruta donde guardarás las imágenes

        move_uploaded_file($nombre_temporal, $directorio_destino . $nombre_archivo);

        // Guarda la ruta del archivo en una variable de sesión
        $_SESSION["ruta_imagen"] = $directorio_destino . $nombre_archivo;
    }
}
function enviado()
{
    if (isset($_REQUEST['Enviar'])) {
        return true;
    }
    return false;
}
function textoVacio($variable)
{
    if (empty($_REQUEST[$variable])) {
        return true;
    }
    return false;
}
function validacio(&$errores)
{

    if (textoVacio('Alfabetico') && textoVacio('NumericoOpci')) {
        $errores['Alfabetico'] = "Escribe alguna letra ";
    }
    if (textoVacio('AlfabeticoOpci')) {
        $errores['AlfabeticoOpci'] = "Escribe alguna letra ";
    }
    if (textoVacio('Alfanumerico')) {
        $errores['Alfanumerico'] = "Escribe alguna letra ";
    }
    if (textoVacio('AlfanumericoOpci')) {
        $errores['AlfanumericoOpci'] = "Escribe alguna letra ";
    }
    if (textoVacio('NumericoOpci')) {
        $errores['NumericoOpci'] = "Escribe alguna letra ";
    }
    if (textoVacio('Numerico')) {
        $errores['Numerico'] = "Escribe alguna letra ";
    } else {
        if ($_REQUEST['Numerico'] <= 0 || $_REQUEST['Numerico'] >= 100) {
            $errores['Numerico'] = "El numro introducido no es correcto";
        }
    }
    if (textoVacio('Contraseña')) {
        $errores['Contraseña'] = "Escribe alguna letra ";
    }
    if (textoVacio('Telefono')) {
        $errores['Telefono'] = "Escribe alguna letra ";
    }
    if (textoVacio('Email')) {
        $errores['Email'] = "Escribe alguna letra ";
    }
    if (textoVacio('Fecha')) {
        $errores['Fecha'] = "Introduce una fecha ";
    } else {
        $fechaActual = date('Y-m-d');
        $fechaNacimiento  = $_REQUEST['Fecha'];
        $fechaNacimientoObj = new DateTime($fechaNacimiento);
        $fechaActualObj = new DateTime($fechaActual);
        $diferencia = $fechaNacimientoObj->diff($fechaActualObj);
        $edad = $diferencia->y;
        if ($edad <= 18) {
            $errores['Fecha'] =  "La persona no es mayor de edad.";
        }
    }
    if (textoVacio('opcion')) {
        $errores['opcion'] = "Marca una opcion";
    } else {
        // print_r($_REQUEST['opcion']);
        $valor = current($_REQUEST['opcion']);
        // echo $valor;
        // foreach ($_REQUEST['opcion'] as $key => $value) {
        if ($valor == 'opcion1') {
            $errores['opcion'] = "Marca otra opcion que no sea la opcion1";
            //   }

        }
    }
    if (textoVacio('opcionCh')) {
        $errores['opcionCh'] = "Marca una opcion";
    } else {
        $valor = count($_REQUEST['opcionCh']);
        //echo $valor;
        // foreach ($_REQUEST['opcion'] as $key => $value) {
        if ($valor > 3) {
            $errores['opcionCh'] = "Marca menos opciones";
            //   }

        }
    }
    if (textoVacio('imagen')) {
        $errores['imagen'] = "adjunta algun fichero";
    }
    if (count($errores) == 0) {
        return true;
    } else
        return false;
}
function escribirErrores($errores, $name)
{

    if (isset($errores[$name])) {
        echo '<span style="color: red;">' . $errores[$name] . '</span>';
    }
}
function radiovacio($name)
{
    if (!isset($_REQUEST[$name])) {
        return true;
    }
    return false;
}
function recuerda($name)
{
    if (enviado() && !empty($_REQUEST[$name])) {
        echo $_REQUEST[$name];
    } else if (isset($_REQUEST['borrar']))
        echo '';
}
// function recuerdaradio($name, $value)
// {
//     //  echo current($_REQUEST['opcion']);
//     foreach ($_REQUEST[$name] as $key => $value) {
//         echo $key;
//     }
//     if (enviado() && isset($_REQUEST[$name]) && current($_REQUEST[$name]) == $value) {
//         echo 'checked';
//     } else if (isset($_REQUEST['borrar']))
//         echo '';
// }
function recuerdaradio($name, $value)
{
    // echo $_REQUEST['opcion'];
    // $opcion = current($_REQUEST['opcion']);
    if (enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name][0] == $value) {
        echo 'checked';
    } else if (isset($_REQUEST['borrar']))
        echo '';
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
