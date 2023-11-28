<?php include("./tareasubir.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../../../css/styles.css">
      <link rel="stylesheet" href="./estilosformulario.css">
      <title>Formulario Tarea 09</title>
</head>

<body>

      <?php

      $errores = array();

      //Si ha ido todo bienb
      if (enviado() && validaFormulario($errores)) {
      } else {

      ?>



            <main>
                  <!-- FORMULARIO -->

                  <form action="" method="post" enctype="multipart/form-data">

                        <label for="nombre">Nombre <input type="text" name="nombre" id="nombre" value=<?php recuerda('nombre') ?>></label> <br>
                        <?php printerror($errores, 'nombre');
                        printerror($errores, 'validarNombre');   ?>
                        <label for="apellidos">Apellidos <input type="text" name="apellidos" id="apellidos" value=<?php recuerda('apellidos') ?>></label> <br>
                        <?php printerror($errores, 'apellidos');
                        printerror($errores, 'validarApellidos'); ?>
                        <label for="pass">Contraseña<input type="password" name="pass" id="pass" value=<?php recuerda('pass') ?>></label> <br>
                        <?php printerror($errores, 'pass');
                        printerror($errores, 'contraseñaValida'); ?>
                        <label for="repitepass">Repite contraseña<input type="password" name="repitepass" id="repitepass" value=<?php recuerda('repitepass') ?>></label> <br>
                        <?php printerror($errores, 'repitepass');
                        printerror($errores, 'repetirContraseña'); ?>
                        <label for="fecha">Fecha <input type="text" name="fecha" id="fecha" placeholder="DD/MM/AAAA" value=<?php recuerda('fecha') ?>></label> <br>
                        <?php printerror($errores, 'fecha');
                        printerror($errores, 'formatoFecha');
                        printerror($errores, 'mayorEdad'); ?>
                        <label for="DNI">DNI <input type="text" name="DNI" id="DNI" value=<?php recuerda('DNI') ?>></label> <br>
                        <?php printerror($errores, 'DNI');
                        printerror($errores, 'DNIMAL'); ?>
                        <label for="email">Email<input type="text" name="email" id="email" value=<?php recuerda('email') ?>></label> <br>
                        <?php printerror($errores, 'email');
                        printerror($errores, 'validaemail'); ?>

                        <!-- ARCHIVO -->
                        <label for="archivo">Subir Imagen<input type="file" name="archivo"></label> <br>
                        <?php printerror($errores, 'archivo');
                        printerror($errores, 'formatoarchivo'); ?>

                        <input type="submit" value="Enviar" name="Enviar">
                        <input type="submit" value="Borrar" name="Borrar">


                  </form>

            <?php
      } //Cerramos el else
            ?>
            </main>

</body>

</html>