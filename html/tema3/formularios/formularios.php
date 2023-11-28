<?php
include("./validacion.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    $errores = array();
    if (enviado() && validarformu($errores)) {
        validarformu($errores);
        echo "<pre>";
        print_r(
            $_REQUEST
        );
   

        // echo"</pre>";
    } else {
        # code...




    ?>

        <!-- 
    // enviar datos del usuario /cliente al servidor
    // action => donde se quieren enviar los datos. si no se le da un fichero llama al actuals
    // method => como se envian get:en la url/post:oculto en la cabezera
    // name => no es obligario par php pero si para js
    // enctype => poder enviar ficheros 
-->
        <!-- post -->

        <form action="" method="get" name="formulario1" enctype="multipart/form-data">
            <!-- si queremes ue solo sea uno hay que ponerle el mismo nombre
    value=> valor que queremos que se mande -->
            <label for="nombre">Nombre:<input type="text" name="nombre" id="nombre" placeholder="nombre" value=<?php
                                                                                                                recuerda('nombre'); ?>></label>
            <br>
            <p class="error">
                <?php
                errores($errores, 'nombre');
                ?>
            </p>
            <label for="apellido">Apellido:<input type="text" name="apellido" id="apellido"></label>
            <p class="error">
                <?php
                errores($errores, 'apellido');
                ?>
            </p>
            <br>
            <label for="hombre"> Hombre:<input <?
             recuerdaradio('genero', 'hombre')

                                                ?> type="radio" name="genero" id="hombre" value="hombre"></label>
            <label for="mujer"> Mujer:<input <? recuerdaradio('genero', 'mujer')

                                                ?> type="radio" name="genero" id="muher" value="mujer"></label>
            <p class="error">
                <?php
                errores($errores, 'genero');
                ?>
            </p>
            <br>
            <p>
                aficiones(selecciona al menos una )
            </p>
            <label for="ch1">Montar a caballo<input <?php
                                                    recuerdaradio1('aficion', 'jinete');
                                                    ?> type="checkbox" name="aficion[]" id="ch1" value="jinete"></label>
            <label for="ch2">Bicicleta<input <?php
                                                recuerdaradio1('aficion', 'ciclista');
                                                ?> type="checkbox" name="aficion[]" id="ch2" value="ciclista"></label>
            <label for="ch3">Nadar<input <?php
                                            recuerdaradio1('aficion', 'natacion');
                                            ?> type="checkbox" name="aficion[]" id="ch3" value="natacion"></label>
            <p class="error">
                <?php
                errores($errores, 'aficion');
                ?>

            </p>

            <br>
            <label for="fecha_N">Fecha Nacimiento

                <input value='<?
                                recuerda('fecha_n');
                                ?>' type="datetime-local" name="fecha_n" id="fehca_n">

            </label>
            <p class="error">
                <?php
                errores($errores, 'fecha_n');
                ?>

            </p>
            <br>
            <p>Equipos de Baloncesto</p>
            <select name="equipo" id="">
                <option value="0">seleccione una</option>
                <option value="lakers" <?
                                        recuerdaselect('equipo', 'lakers');
                                        ?>>lakers</option>
                <option value="celtics" <?
                                        recuerdaselect('equipo', 'celtics');
                                        ?>>celtics</option>
                <option value="bulls" <?
                                        recuerdaselect('equipo', 'bulls');
                                        ?>>bulls</option>
            </select>
            <p class="error">
                <?php
                errores($errores, 'equipo');
                ?>

            </p>
            <br>
            <input type="file" name="fichero" id="">
            <p class="error">
                <?php
                errores($errores, 'fichero');
                ?>
            </p>
            <br>
            <!-- el usuario no la ve porque no se manda poor url -->
            <input type="hidden" name="usuarioVIP" value="123456">
            <br>
            <!-- el nombre es para verificar que se ha dado al boton -->
            <input type="submit" value="Enviar" name="Enviar">
            <input type="submit" value="Borrar" name="borrar">
        </form>
    <? //abrir php 
    } // cerrar el else

    // cerrar php
    ?>
</body>

</html>
<?php

?>