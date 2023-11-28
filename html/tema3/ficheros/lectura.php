<?
//lectura de todo el archivo
$file_content = file_get_contents('nombre_archivo.txt');
//lectura linea por linea
$filename = 'nombre_archivo.txt';
$file = fopen($filename, 'r');

if ($file) {
    while (($line = fgets($file)) !== false) {
        // Procesa cada línea, por ejemplo:
        echo $line;
    }
    fclose($file);
}
//Lectura de todo el archivo en un array por líneas
$lines = file('nombre_archivo.txt');
foreach ($lines as $line_num => $line) {
    echo "Línea #{$line_num}: " . htmlspecialchars($line) . "<br>";
}
//Lectura binaria (ideal para imágenes, archivos binarios, etc.)

$filename = 'imagen.png';
$handle = fopen($filename, 'rb');

if ($handle) {
    $contents = fread($handle, filesize($filename));
    fclose($handle);
}
