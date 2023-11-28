<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET['añadir'])) {
        // Open the CSV file for writing
        $ft = fopen('notas.csv', 'a'); // 'a' stands for append

        // Get the values from the form
        $nombre = $_GET['nombre'];
        $no1 = $_GET['no1'];
        $no2 = $_GET['no2'];
        $no3 = $_GET['no3'];

        // Create an array with the values
        $leido = array($nombre, $no1, $no2, $no3);

        // Write the values to the CSV file
        fputcsv($ft, $leido, ";");

        // Close the file handle
        fclose($ft);
    }
    if (isset($_GET['volver'])) {
        header("Location: notas.php");
    }
    ?>

    <form action="" method="get">
        <p><label for="">nombre: <input type="text" name="nombre" value="" name="nombre"></label></p>
        <p><label for="">nota 1: <input type="number" name="no1" value="" name="nota1"></label></p>
        <p><label for="">nota 2: <input type="number" name="no2" value="" name="nota2"></label></p>
        <p><label for="">nota 3: <input type="number" name="no3" value="" name="nota3"></label></p>
        <p>
            <label for="Leer">
                <input type="submit" value="volver" name="volver">
            </label>
            <label for="Escribir">
                <input type="submit" value="añadir" name="añadir">
            </label>
        </p>
    </form>
</body>

</html>