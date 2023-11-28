<?
$fechaNueva = "";
session_start(); // Inicia la sesión al comienzo del archivo

function guardaImagen()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == UPLOAD_ERR_OK) {
            $nombre_temporal = $_FILES["imagen"]["tmp_name"];
            $nombre_archivo = $_FILES["imagen"]["name"];
            $directorio_destino = "imagenes_subidas/";
            crearCarpeta($directorio_destino);

            move_uploaded_file($nombre_temporal, $directorio_destino . $nombre_archivo);

            // Guarda la ruta del archivo en una variable de sesión
            $_SESSION["ruta_imagen"] = $directorio_destino . $nombre_archivo;
        }
    }
}
function crearCarpeta($directorio_destino){
     // Nombre de la carpeta que deseas crear

if (!is_dir( $directorio_destino)) {
    // Verificar si la carpeta no existe
    if (mkdir($directorio_destino)) {
        echo "La carpeta '$directorio_destino' ha sido creada.";
    } else {
        echo "No se pudo crear la carpeta '$directorio_destino'.";
    }
} else {
    echo "La carpeta '$directorio_destino' ya existe.";
}
}
function enviado()
{
    if (!isset($_REQUEST['Enviar'])) {
        return false;
    }
    return true;
}
function validacion(&$errores)
{
    comNombre($errores);
    comApellido($errores);
    comContraseña($errores);
    comFecha($errores);
    comdni($errores);
    comCorreo($errores);
    comFichero($errores);
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
function valiNombre()
{
    if ($_REQUEST['nombre']) {
    }
}
function corrige($coincide)
{
    if ($coincide[1] < 10 && strlen($coincide[1]) != 2) {
        $coincide[1] = '0' . $coincide[1];
    }
    if ($coincide[3] < 10 && strlen($coincide[3]) != 2) {
        $coincide[3] = '0' . $coincide[3];
    }
    if ($coincide[5] <= 23) {
        $coincide[5] = '20' . $coincide[5];
    } elseif ($coincide[5] > 23 && $coincide[5] < 100) {
        $coincide[5] = '19' . $coincide[5];
    }

    return $coincide[1] . $coincide[2] . $coincide[3] . $coincide[4] . $coincide[5];
}
function escribirFecha()
{

    if (enviado() && !empty($_REQUEST['fecha'])) {
        global $fechaNueva;
        echo $fechaNueva;
    } else if (isset($_REQUEST['borrar']))
        echo '';
}
function calcularLetraDNI($dninumero)
{
    $letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
    $resto = $dninumero % 23;
    return $letras[$resto];
}
function comNombre(&$errores)
{
    if (textoVacio('nombre')) {
        $errores['nombre'] = "este campo esta vacio";
    } elseif (!preg_match('/^[a-zA-Z]{3,}$/', $_REQUEST['nombre'])) {
        $errores['nombre'] = "combinacion incorrecta";
    }
}
function comApellido(&$errores)
{
    if (!preg_match('/^.+$/', $_REQUEST['apellido'])) {
        $errores['apellido'] = "este campo esta vacio";
    } elseif (!preg_match('/^\w{3,}\s+\w{3,}$/', $_REQUEST['apellido'])) {
        $errores['apellido'] = "combinacion incorrecta";
    }
}
function comContraseña(&$errores)
{
    if (!preg_match('/^.+$/', $_REQUEST['contraseña']) && !preg_match('/^.+$/', $_REQUEST['repcontraseña'])) {
        $errores['contraseña'] = "este campo esta vacio";
        $errores['repcontraseña'] = "este campo esta vacio";
    } elseif (!preg_match('/^.+$/', $_REQUEST['contraseña']) && preg_match('/^.+$/', $_REQUEST['repcontraseña'])) {
        $errores['contraseña'] = "este campo esta vacio";
    } elseif (preg_match('/^.+$/', $_REQUEST['contraseña']) && !preg_match('/^.+$/', $_REQUEST['repcontraseña'])) {
        $errores['repcontraseña'] = "este campo esta vacio";
    } elseif (preg_match('/^.+$/', $_REQUEST['contraseña']) && preg_match('/^.+$/', $_REQUEST['repcontraseña'])) {
        if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $_REQUEST['contraseña'])) {
            if ($_REQUEST['contraseña'] != $_REQUEST['repcontraseña']) {
                $errores['contraseña'] = "no coinciden";
                $errores['repcontraseña'] = "no coinciden";
            }
        }
    }
}
function comFecha(&$errores)
{
    if (textoVacio('fecha')) {
        $errores['fecha'] = "este campo esta vacio";
    } elseif (preg_match('/^(\d{1,2})(\/)(\d{1,2})(\/)(\d{2}|\d{4})$/', $_REQUEST['fecha'])) {
        global $fechaNueva;
        $fechaNueva = preg_replace_callback('/(\d{1,2})(\/)(\d{1,2})(\/)(\d{2,4})/', 'corrige', $_REQUEST['fecha']);
        $fechaActual = date('d-m-Y');
        $fechaNacimientoObj = new DateTime($fechaNueva);
        $fechaActualObj = new DateTime($fechaActual);
        $diferencia = $fechaNacimientoObj->diff($fechaActualObj);
        $edad = $diferencia->y;
        if ($edad <= 18) {
            $errores['fecha'] =  "La persona no es mayor de edad.";
        }
    } else {
        $errores['fecha'] =  "formato incorrecto.";
    }
}
function comdni(&$errores)
{

    if (textoVacio('dni')) {
        $errores['dni'] = "este campo esta vacio";
    } elseif (!preg_match('/^(\d{8}[A-Za-z])$/', $_REQUEST['dni'])) {
        $errores['dni'] = "combinacion incorrecta";
    } else {
        $dninumero = substr($_REQUEST['dni'], 0, 8);
        $dniletra = substr($_REQUEST['dni'], 8, 9);
        $letra = calcularLetraDNI($dninumero);
        if ($letra != strtoupper($dniletra)) {
            $errores['dni'] = "la letra no corresponde";
        }
    }
}
function comCorreo(&$errores)
{
    if (textoVacio('correo')) {
        $errores['correo'] = "este campo esta vacio";
    } elseif (!preg_match('/^.+@.+\..{2,}$/', $_REQUEST['correo'])) {
        $errores['correo'] = "combinacion incorrecta";
    }
}
function comFichero(&$errores)
{
    if (empty($_FILES["imagen"]["name"])) {
        $errores['imagen'] = "este campo esta vacio";
    } elseif (!preg_match('/^.+\.(jpg|png|bmp)$/',$_FILES["imagen"]["name"])) {
        $errores['imagen'] = "formato invalido";
    } else {
        guardaImagen();
    }
}
function escribirNombre($name)
{
    if (enviado() && !empty($_REQUEST[$name])) {
        echo $_REQUEST[$name];
    } else if (isset($_REQUEST['borrar']))
        echo '';
}
