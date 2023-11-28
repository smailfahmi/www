<!DOCTYPE html>
<html>
<head>
    <title>Ver Imagen</title>
</head>
<body>
    <?php
    if (isset($_GET["imagen"])) {
        $imagen_url = urldecode($_GET["imagen"]);
        echo '<img src="' . $imagen_url . '" alt="Imagen subida">';
    } else {
        echo "No se proporcionó una URL de imagen válida.";
    }
    ?>
</body>
</html>
