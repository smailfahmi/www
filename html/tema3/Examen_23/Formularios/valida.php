<?php
session_start(); // Inicia la sesión al comienzo del archivo

function guardaImagen()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES["fichero"]) && $_FILES["fichero"]["error"] == UPLOAD_ERR_OK) {
            $nombre_temporal = $_FILES["fichero"]["tmp_name"];
            $nombre_archivo = $_FILES["fichero"]["name"];
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
    if (isset($_REQUEST['enviar'])) {
        return true;
    } else
        return false;
}
function compruebador(&$errores)
{
    comNombre($errores);
    comApellido($errores);
    comEdad($errores);
    comContraseña($errores);
    comdni($errores);
    comFichero($errores);
    if (count($errores) == 0) {
        return true;
    }
    return false;
}
function vacio($texto)
{
    if (empty($_REQUEST[$texto])) {
        return true;
    } else
        return false;
}
function escribirerrores($errores, $propiedad)
{
    if (isset($errores[$propiedad])) {
        echo $errores[$propiedad];
    }
}
function comNombre(&$errores)
{
    if (vacio('nombre')) {
        $errores['nombre'] = "CAMPO VACIO";
    } else {
        if (!preg_match('/^[A-Z][a-z]{2,}$/', $_REQUEST['nombre'])) {
            $errores['nombre'] = "NO CUMPLE REQUISITOS";
        }
    }
}

function comApellido(&$errores)
{
    if (vacio('apellidos')) {
        $errores['apellidos'] = "CAMPO VACIO";
    } else {
        if (!preg_match('/^[A-Z][a-z]{2,}\s\w{3,}$/', $_REQUEST['apellidos'])) {
            $errores['apellidos'] = "NO CUMPLE REQUISITOS";
        }
    }
}

function comEdad(&$errores)
{
    if (vacio('edad')) {
        $errores['edad'] = "CAMPO VACIO";
    } else {
        if (preg_match('/^[1-6][0-9]$/', $_REQUEST['edad'])) {
            $edad = $_REQUEST['edad'];
            if ($edad < 18 || $edad > 65) {
                $errores['edad'] =  "NO CUMPLE REQUISITOS";
            }
        } else
            $errores['edad'] = "NO CUMPLE REQUISITOS";
    }
}
function mantenerTexto($texto)
{
    if (enviado() && !empty($_REQUEST[$texto])) {
        echo $_REQUEST[$texto];
    }
}
function comContraseña(&$errores)
{
    if (vacio('contraseña')) {
        $errores['contraseña'] = "CAMPO VACIO";
    } else {
        if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/', $_REQUEST['contraseña'])) {

            if ($_REQUEST['contraseña'] != $_REQUEST['repcontraseña']) {
                $errores['repcontraseña'] = "NO COINCIDE";
            }
        } else
            $errores['contraseña'] = "NO CUMPLE REQUISITOS";
    }
}
function comdni(&$errores)
{
    if (vacio('DNI')) {
        $errores['DNI'] = "CAMPO VACIO";
    } else {
        if (preg_match('/^\d{8}[aA-zZ]$/', $_REQUEST['DNI'])) {
            $numdni = substr($_REQUEST['DNI'], 0, 8);
            $dni = $_REQUEST['DNI'];
            $letradni = $dni[8];
            $letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
            $resto = $numdni % 23;
            if ($letras[$resto] != strtoupper($letradni)) {
                $errores['DNI'] = "DNI NO VALIDO";
            }
        } else
            $errores['DNI'] = "NO CUMPLE REQUISITOS";
    }
}
function comFichero(&$errores)
{
    if (empty($_FILES["fichero"]["name"])) {
        $errores['fichero'] = "este campo esta vacio";
    } elseif (!preg_match('/^.+\.(jpg|png|bmp)$/',$_FILES["fichero"]["name"])) {
        $errores['fichero'] = "formato invalido";
    } else {
        guardaImagen();
    }
}
