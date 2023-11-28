<?php
include("./Valida09.php")
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
    if (enviado() && validacion($errores)) {
        echo "<pre>";
        echo 'enviado';
        print_r($_REQUEST);
        if (isset($_SESSION["ruta_imagen"])) {
            echo '<p>Imagen subida:</p>';
            echo '<img src="' . $_SESSION["ruta_imagen"] . '" alt="Imagen subida">';
        }
    } else {
    ?>
        <form action="" method="post" name="Prac09" enctype="multipart/form-data">
            <p><label for="">Nombre: <input type="text" name="nombre" id="nombre" value=<?php
                                                                                        escribirNombre('nombre');
                                                                                        ?>></label> <?php
                                                                                                    escribirErrores($errores, "nombre");
                                                                                                    ?></p>
            <p><label for="">Apellido: <input type="text" name="apellido" id="apellido" value="<?php
                                                                                                escribirNombre('apellido');
                                                                                                ?>"></label><?php
                                                                                                            escribirErrores($errores, "apellido");
                                                                                                            ?></p>
            <p><label for="">Contraseña: <input type="text" name="contraseña" id="contraseña" value=<?php
                                                                                                    escribirNombre('contraseña');
                                                                                                    ?>></label><?php
                                                                                                                escribirErrores($errores, "contraseña");
                                                                                                                ?></p>
            <p><label for="">Rep Contraseña: <input type="text" name="repcontraseña" id="repcontraseña" value=<?php
                                                                                                                escribirNombre('repcontraseña');
                                                                                                                ?>><?php
                                                                                                                    escribirErrores($errores, "repcontraseña");
                                                                                                                    ?></label></p>
            <p><label for="">Fecha: <input type="text" name="fecha" id="fecha" placeholder="dia/mes/año" value=<?php
                                                                                                                escribirFecha();
                                                                                                                ?>></label><?php
                                                                                                                            escribirErrores($errores, "fecha");
                                                                                                                            ?></p>
            <p><label for="">DNI: <input type="text" name="dni" id="dni" value=<?php
                                                                                escribirNombre('dni');
                                                                                ?>></label><?php
                                                                                            escribirErrores($errores, "dni");
                                                                                            ?></p>
            <p><label for="">Correo: <input type="text" name="correo" id="correo" value=<?php
                                                                                        escribirNombre('correo');
                                                                                        ?>></label><?php
                                                                                                    escribirErrores($errores, "correo");
                                                                                                    ?></p>

            <p><label for="">Archivo: <input type="file" name="imagen" id="imagen" accept="image/*"></label> <?php
                                                                                                                escribirErrores($errores, "imagen");
                                                                                                                ?></p>
            <p><input type="submit" value="Enviar" name="Enviar"></p>



        </form>
    <? } ?>
</body>

</html>