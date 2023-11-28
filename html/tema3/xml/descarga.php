<?
$fileName = "instrumentos.xml";
header('Content-type: text/xml'); // Corrected the content type
header("Content-Disposition: attachment; filename=$fileName");
readfile($fileName);//ESTA LINEA SOBRA 