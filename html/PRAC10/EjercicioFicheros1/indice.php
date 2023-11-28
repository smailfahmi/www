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
    if (isset($_POST['Leer'])) {
        $nombreArchivo = $_POST['nombre'] ;
        if (existe($nombreArchivo)) {
            header("Location: leer.php?clave=$nombreArchivo");
        } else {
            echo "NO EXISTE";
        }

        exit;
    } elseif (isset($_POST['Escribir'])) {

        $nombreArchivo = $_POST['nombre'] ;
        if (existe($nombreArchivo)) {
            header("Location: escribir.php?clave=$nombreArchivo");
        } else {
            echo "NO EXISTE";
        }
    } else {
    ?>
        <form action="" method="post" enctype="multipart/form-data">
            <p>
                <label for="nombre">Nombre : </label>
                <input type="text" name="nombre" id="nombre">
            </p>
            <p>
                <label for="Leer">
                    <input type="submit" value="Leer" name="Leer">
                </label>
                <label for="Escribir">
                    <input type="submit" value="Escribir" name="Escribir">
                </label>
            </p>
        </form>
    <?php } ?>
</body>

</html>