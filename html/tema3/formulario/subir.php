<?php



if (count($_FILES) != 0) {
    print_r($_FILES);
    echo "<br>";
    $ruta = "/var/www/html/tema4/";
    $ruta .= basename($_FILES['fichero']['name']);
    if (move_uploaded_file($_FILES['fichero']['tmp_name'], $ruta))
        echo "Archivo subido";
    else
        echo "La subida ha fallado";
}
