<?
include("./verificacion.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label {
            margin-right: 100px;
        }
    </style>
</head>

<body>
    <?php
    //  echo $_REQUEST['clave'];
    if (isset($_POST['Volver'])) {
        header("Location: indice.php");
        exit;
    } elseif (isset($_POST['Escribir'])) {

        $nombreArchivo = $_REQUEST['clave'];
        header("Location: escribir.php?clave=$nombreArchivo");
    } else {
    ?>
        <form action="" method="post">
            <p>
                <label for="comentario">Comentario:</label>
                <textarea id="comentario" name="comentario" rows="4" cols="50" readonly><?php

                                                                                        $contenido = file_get_contents($_REQUEST['clave']);
                                                                                        echo htmlspecialchars($contenido, ENT_QUOTES);
                                                                                        ?></textarea>
            </p>
            <p>
                <label for="Volver">
                    <input type="submit" value="Volver" name="Volver">
                </label>
                <label for="Escribir">
                    <input type="submit" value="Escribir" name="Escribir">
                </label>
            </p>
        </form>
    <?php } ?>
</body>

</html>