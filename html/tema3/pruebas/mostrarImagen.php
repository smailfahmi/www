<!DOCTYPE html>
<html>
<head>
    <title>Subir imagen</title>
</head>
<body>
    <form action="procesar_imagen.php" method="post" enctype="multipart/form-data">
        <label for="imagen">Selecciona una imagen:</label>
        <input type="file" name="imagen" id="imagen" accept="image/*">
        <input type="submit" value="Subir Imagen">
    </form>
</body>
</html>