
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == UPLOAD_ERR_OK) {
        $nombre_temporal = $_FILES["imagen"]["tmp_name"];
        $nombre_archivo = $_FILES["imagen"]["name"];
        $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);

        // Verificar si es una imagen (puedes agregar más validaciones si es necesario)
        if (getimagesize($nombre_temporal)) {
            // Mover la imagen a un directorio de tu elección
            $directorio_destino = "imagenes_subidas/";
            move_uploaded_file($nombre_temporal, $directorio_destino . $nombre_archivo);

            // Mostrar la imagen en la página
            echo "Imagen subida con éxito:<br>";
            echo '<img src="' . $directorio_destino . $nombre_archivo . '" alt="Imagen subida">';
        } else {
            echo "El archivo seleccionado no es una imagen válida.";
        }
    } else {
        echo "No se ha seleccionado ninguna imagen o se ha producido un error al subirla.";
    }
}
?>
<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == UPLOAD_ERR_OK) {
//         $nombre_temporal = $_FILES["imagen"]["tmp_name"];
//         $nombre_archivo = $_FILES["imagen"]["name"];
//         $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);

//         // Verificar si es una imagen (puedes agregar más validaciones si es necesario)
//         if (getimagesize($nombre_temporal)) {
//             // Mover la imagen a un directorio de tu elección
//             $directorio_destino = "imagenes_subidas/";
//             move_uploaded_file($nombre_temporal, $directorio_destino . $nombre_archivo);

//             // Redirigir a la imagen en una nueva pestaña
//             echo "Imagen subida con éxito. <a href='ver_imagen.php?imagen=" . urlencode($directorio_destino . $nombre_archivo) . "' target='_blank'>Ver imagen</a>";
//         } else {
//             echo "El archivo seleccionado no es una imagen válida.";
//         }
//     } else {
//         echo "No se ha seleccionado ninguna imagen o se ha producido un error al subirla.";
//     }
// }
?>
