<?php

function enviado()
{
    if (isset($_REQUEST['Enviar'])) {
        return true;
    }
    return false;
}
function textVacio($name)
{
    if (empty($_REQUEST[$name])) {
        return true;
    }
    return false;
}
function errores($errores, $name)
{
    if (isset($errores[$name])) {
        echo $errores[$name];
    }
}

function recuerda($name)
{
    if (enviado() && !empty($_REQUEST[$name])) {
        echo $_REQUEST[$name];
    } else if (isset($_REQUEST['borrar']))
        echo '';
}
function radiovacio($name)
{
    if (!isset($_REQUEST[$name])) {
        return true;
    }
    return false;
}
function recuerdaradio($name, $value)
{
    if (enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name] == $value) {
        echo 'checked';
    } else if (isset($_REQUEST['borrar']))
        echo '';
}
function recuerdaradio1($name, $value)
{
    if (enviado() && isset($_REQUEST[$name]) && in_array($value, $_REQUEST[$name])) {
        echo 'checked';
    } else if (isset($_REQUEST['borrar']))
        echo '';
}
function selectvacio($name)
{
    if (isset($_REQUEST[$name]) && $_REQUEST[$name] != 0) {
        return false;
    }
    return true;
}
function recuerdaselect($name, $value)
{
    if (enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name] == $value) {
        echo 'selected';
    } else if (isset($_REQUEST['borrar']))
        echo '';
}
function validarformu(&$errores)
{
    if (textVacio('nombre')) {
        $errores['nombre'] =   "nombre vacio;";
    }
    if (textVacio('apellido')) {
        $errores['apellido'] =   "apellido vacio;";
    }
    if (radiovacio('genero')) {
        $errores['genero'] = "debe seleccionar sexo";
    }
    if (radiovacio('aficion')) {
        $errores['aficion'] = "debe seleccionar aficion";
    }
    if (textVacio('fecha_n')) {
        $errores['fecha_n'] =   "fecha no completada;";
    }
    if (selectvacio('equipo')) {
        $errores['equipo'] =   "ningun equipo seleccionado";
    }
    if (textVacio('fichero')) {
        $errores['fichero'] =   "fichero no seleccionado;";
    }
    if (count($errores) == 0) {
        return true;
    }
    return false;
    # code...

}
