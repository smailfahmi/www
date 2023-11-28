<?php

function enviado (){
    if(!empty ($_REQUEST ['Enviar'])) return true;
    return false;
}
function textoVacio ($campodetexto){
    if (empty ($_REQUEST [$campodetexto])) return true;
    return false;
}

function printerror($errores, $valor){
  if (isset ($errores[$valor]))
    echo "<p class = error>".$errores[$valor]."</p>";

}

function recuerda($campo){
    if (enviado() && !empty ($_REQUEST[$campo])) {
    echo "'$_REQUEST[$campo]'";
}else if (isset ($_REQUEST['Borrar']))
echo '';
}

function validarNombre ($nombre) {
$exp = '/^[a-zA-Z]{3}/';
if (preg_match ($exp, $nombre)) return true;
return false;

}

function validarApellidos ($apellidos) {
   $exp = '/^[a-zA-Z]{3,}\s[a-zA-Z]{3,}$/';
    if (preg_match ($exp, $apellidos)) return true;
    return false;
    
    }

function contraseñaValida ($contraseña){
    $exp = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+/';
    if (preg_match ($exp, $contraseña)) return true;
    return false;

}
function repetirContraseña ($pass, $repitepass){
    if ($_REQUEST['pass']===$_REQUEST['repitepass'] ) return true;
    return false;

}

function validaFecha ($fecha){
    $exp = '/^[\d]{2}\/[\d]{2}\/[\d]{4}$/';
    if (preg_match ($exp, $fecha)) return true;
    return false;

}

function mayorEdad(){
    $nacimiento = strtotime($_REQUEST['fecha']);
    $hoy = strtotime('now');
    $edad= floor(($hoy - $nacimiento) / (60 * 60 * 24 * 365));
    if ($edad < 18) return false;
    return true;
  }

  function validaDNI ($dni){

    $exp = '/^[\d]{8}[a-zA-Z]{1}$/';
    if (preg_match ($exp, $dni)) {
        $numeros = substr($dni,0,8);
        $letra= strtoupper(substr($dni,8,1));
        $resto = $numeros%23;
        $posibles = "TRWAGMYFPDXBNJZSQVHLCKE";
        if ($letra ==  substr ($posibles,$resto,1))return true;
        else return false;

  }else return false;
}


function validaEmail ($email){
    $exp = '/^\D+@\D+\.\D{2,}/';
    if (preg_match ($exp, $email)) return true;
    return false;

}

function formatoImagen ($formato){
    $exp = '/\.(bmp|jpg|png)$/i';
    if (preg_match ($exp, $formato)) return true;
    return false;

}

function validaFormulario (&$errores){
if (textoVacio ('nombre')) $errores ['nombre'] = 'El nombre no puede estar vacío.';
if (!textoVacio ('nombre') && !validarNombre ($_REQUEST['nombre'])) $errores ['validarNombre'] = 'Mínimo 3 caracteres.';
if (textoVacio ('apellidos')) $errores ['apellidos'] = 'El apellidos no puede estar vacío.';
if (!textoVacio ('apellidos') && !validarApellidos ($_REQUEST['apellidos'])) $errores ['validarApellidos'] = 'Mínimo 3 caracteres para cada apellido.';
if (textoVacio ('pass')) $errores ['pass'] = 'Contraseña requerida.';
if (!textoVacio ('pass') && !contraseñaValida ($_REQUEST['pass'])) $errores ['contraseñaValida'] = 'Mínimo una minúscula, una mayúscula y un número.';
if (textoVacio ('repitepass')) $errores ['repitepass'] = 'Repetir contraseña requerido.';
if (!textoVacio ('repitepass') && !repetirContraseña ($_REQUEST['pass'], $_REQUEST['repitepass'])) $errores ['repetirContraseña'] = 'Las contraseñas no coinciden.';
if (textoVacio ('fecha')) $errores ['fecha'] = 'Debe seleccionar una fecha.';
if (!textoVacio ('fecha') && !validaFecha ($_REQUEST['fecha'])) $errores ['formatoFecha'] = 'Introduzca una fecha con el formato espcificado. Ejemplo 07/12/2021.';
if (!textoVacio ('fecha') && validaFecha ($_REQUEST['fecha']) && !mayorEdad ()) $errores ['mayorEdad'] = 'Es necesario tener más de 18 años.';
if (textoVacio ('DNI')) $errores ['DNI'] = 'El DNI no puede estar vacío.';
if (!textoVacio ('DNI') && !validaDNI ($_REQUEST['DNI']) ) $errores ['DNIMAL'] = 'Introduzca un DNI correcto';
if (textoVacio ('email')) $errores ['email'] = 'Indique su email.';
if (!textoVacio ('email')&& !validaEmail($_REQUEST['email'])) $errores ['validaemail'] = 'Introduzca un email correcto';
if (empty($_FILES['archivo']['name'])) $errores ['archivo'] = 'Seleccione una imagen.';
if (!empty($_FILES['archivo']['name'])&& !formatoImagen($_FILES['archivo']['name'])) $errores ['formatoarchivo'] = 'Formatos admitidos: bmp, jpg y png.';

if (count($errores)==0) return true;
return false;

}
