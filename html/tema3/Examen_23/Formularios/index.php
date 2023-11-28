<?
include('./valida.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?
    $errores = [];
    if (enviado() && compruebador($errores)) {
        echo "<pre>";
        echo 'enviado';
        print_r($_REQUEST);
        if (isset($_SESSION["ruta_imagen"])) {
            echo '<p>Imagen subida:</p>';
            echo '<img src="' . $_SESSION["ruta_imagen"] . '" alt="Imagen subida">';
        }
    } else {
    ?>

        <form action="" method="post" name="examen" enctype="multipart/form-data">
            <p><label for="">Nombre <input type="text" name="nombre" value=<? mantenerTexto('nombre'); ?>></label><?php
                                                                                                                    escribirErrores($errores, 'nombre');
                                                                                                                    ?></p>
            <p><label for="">Apellido <input type="text" name="apellidos" value="<? mantenerTexto('apellidos'); ?>"></label><?php
                                                                                                                            escribirErrores($errores, 'apellidos');
                                                                                                                            ?>
            </p>
            <p><label for="">Edad <input type="text" name="edad" value=<? mantenerTexto('edad'); ?>></label><?php
                                                                                                            escribirErrores($errores, 'edad');
                                                                                                            ?></p>
            <p><label for="">Contraseña <input type="text" name="contraseña" value=<? mantenerTexto('contraseña'); ?>></label> <?php
                                                                                                                                escribirErrores($errores, 'contraseña');
                                                                                                                                ?></p>
            <p><label for="">Rep contraseñ <input type="text" name="repcontraseña" value=<? mantenerTexto('repcontraseña'); ?>></label><?php
                                                                                                                                        escribirErrores($errores, 'repcontraseña');
                                                                                                                                        ?></p>
            <p><label for="">Dni <input type="text" name="DNI" value=<? mantenerTexto('DNI'); ?>></label><?php
                                                                                                            escribirErrores($errores, 'DNI');
                                                                                                            ?></p>
            <p><label for="">Tlfn <input type="text" name="numero" value=<? mantenerTexto('numero'); ?>></label></p>
            <p><label for="">Imagen <input type="file" name="fichero" id=""></label><?php
                                                                                    escribirErrores($errores, 'fichero');
                                                                                    ?></p>
            <p><label for=""><input type="submit" name="enviar" value="enviar" id=""></label></p>

        </form>
    <?
    } ?>
</body>

</html>