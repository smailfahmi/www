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
    if (isset($_POST['Volver'])) {
        header("Location: indice.php");
        exit;
    } elseif (isset($_POST['Guardar'])) {
        $nombreArchivo = $_REQUEST['clave'] ;
        guardar($nombreArchivo);
        header("Location: leer.php?clave=$nombreArchivo");
    } else {
    ?>
        <form action="" method="post">
            <p>
                <label for="comentario">Comentario:</label>
                <textarea id="comentario" name="comentario" rows="4" cols="50"><?php

                                                                                $contenido = file_get_contents($_REQUEST['clave']);
                                                                                echo htmlspecialchars($contenido, ENT_QUOTES);
                                                                                ?></textarea>
            </p>
            <p>
                <label for="Leer">
                    <input type="submit" value="Volver" name="Volver">
                </label>
                <label for="Volver">
                    <input type="submit" value="Guardar" name="Guardar">
                </label>
            </p>
        </form>
    <?php } ?>
</body>

</html>