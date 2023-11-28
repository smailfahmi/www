<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            text-align: center;
            border: solid;
            background: yellow;
        }

        table {
            background-color: black;
        }
    </style>
</head>

<body>
    <?php
    $boton = 0;

    ?>
    <table>
        <tr>
            <td>nota</td>
            <td>nota 1</td>
            <td>nota 2</td>
            <td>nota 3</td>
        </tr>
        <?php
        include('../PRAC7/funciutiles.php');
        echo 'TABLA IMPRESA DESDE UN ARRAY';
        br();
        br();
        $array = []; // Array para almacenar los datos del CSV
        if (($gestor = fopen("notas.csv", "r")) !== FALSE) {
            while (($datos = fgetcsv($gestor, 1000, ";")) !== FALSE) {
                $numero = count($datos);
                echo "<tr>";

                $arrays = []; // Array para almacenar los datos de cada fila

                for ($c = 0; $c < $numero; $c++) {
                    $arrays[$c] = $datos[$c];
                    echo "<td>";
                    echo $datos[$c];
                    echo "</td>";
                }

                $array[] = $arrays; // Agregar el array de la fila al array principal
                echo "</tr>";
            }
            fclose($gestor);
        }
        //creando un fichero xml a partir de un array 
        echo '</table>';
        $dom = new DOMDocument("1.0", "utf-8");
        $raiz = $dom->appendChild($dom->createElement('alumnos'));
        echo '<pre>';
        // print_r($array);
        foreach ($array as $key => $value) {
            $alumno = $dom->createElement('alumno');
            $raiz->appendChild($alumno);
            $contador = 0;
            foreach ($value as $elemento) {
                switch ($contador) {
                    case 0:
                        $valor = $dom->createElement('nombre', $elemento);
                        break;
                    case 1:
                        $valor = $dom->createElement('nota1', $elemento);
                        break;
                    case 2:
                        $valor = $dom->createElement('nota2', $elemento);
                        break;

                    default:
                        $valor = $dom->createElement('nota3', $elemento);
                        break;
                }
                $alumno->appendChild($valor);
                $contador++;
            }
        }
        $dom->formatOutput = true;
        $dom->save('notas.xml');
        $dom->load('notas.xml');
        echo 'TABLA IMPRESA DESDE UN XML CONOCIENDO SU ESTRUCTURA';
        br();
        br();
        // sabiendo lo que hay dentro del xml y que todos los elementos son iguales
        echo '<table> <tr>';

        for ($i = 0; $i < 4; $i++) { //cabecera 
            switch ($i) {
                case 0:
                    echo '<td> nombre </td>';
                    break;
                case 1:
                    echo '<td> nota1 </td>';
                    break;
                case 2:
                    echo '<td> nota2 </td>';
                    break;

                default:
                    echo '<td> nota3 </td>';
                    break;
            }
        }
        echo '</tr>';
        echo '<pre>';
        //cuerpo de la tabla 
        foreach ($dom->getElementsByTagName('alumno') as $alumno) {
            // print_r($alumno->getElementsByTagName('nombre')->item(0));
            $nombre = $alumno->getElementsByTagName('nombre')->item(0)->textContent;
            $nota1 = $alumno->getElementsByTagName('nota1')->item(0)->nodeValue;
            $nota2 = $alumno->getElementsByTagName('nota2')->item(0)->nodeValue;
            $nota3 = $alumno->getElementsByTagName('nota3')->item(0)->nodeValue;
            echo "<tr> <td>$nombre</td> <td>$nota1</td> <td>$nota2</td> <td>$nota3</td> </tr>";
        }
        echo '</table>';
        //accediendo a dentro del xml con if anidados 

        //sin saber lo que hay dentro 
        // print_r($dom);
        // if (isset($dom->childElementCount)) { //eso quiere decir que el xml tiene hijos 
        //     foreach ($dom->childNodes as $hijos) {
        //         // print_r($hijos->childNodes->item(0));
        //         if (isset($hijos->childElementCount)) { // esto quiere decir que el hijo tiene hijos 
        //             // print_r($hijos);
        //             foreach ($hijos->childNodes as $nietos) {
        //                 if (isset($nietos->childElementCount)) {   // esto quiere decir que el hijo tiene hijos
        //                     foreach ($nietos->childNodes as $bisnietos) {
        //                         if (isset($bisnietos->childElementCount)) {
        //                             foreach ($bisnietos->childNodes as $bisnietos1) {
        //                                 if (isset($bisnietos1->childElementCount)) {
        //                                     print_r($bisnietos1);
        //                                 } else {
        //                                     print_r($bisnietos1->textContent);
        //                                 }
        //                             }
        //                         }
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }

        function comprobarhijos($hijos)
        {
            if ($hijos->hasChildNodes() && $hijos->childElementCount != 0) {
                foreach ($hijos->childNodes as $key) {
                    if (isset($key->tagName)) {
                        if ($key->tagName == 'alumno') {
                            echo "<tr>";
                        }

                        if ($key->attributes->length > 0) {

                            echo "<tr>";
                            foreach ($key->attributes as $value) {
                                echo '<td>';
                                echo $value->textContent;
                                echo '<br>';
                                echo '</td>';
                            }
                        }
                    }

                    comprobarhijos($key);
                }
            } else {
                if ($hijos->nodeType == 1) {
                    echo '<td>';
                    echo $hijos->textContent . "\n";
                    echo '</td>';
                }
            }
        }
        br();
        echo 'TABLA IMPRESA DESDE UN xml CON FUNCION RECURSIVA';
        br();
        br();
        echo '<pre>';
        echo '<table> <tr>';

        for ($i = 0; $i < 4; $i++) {
            switch ($i) {
                case 0:
                    echo '<td> nombre </td>';
                    break;
                case 1:
                    echo '<td> nota 1 </td>';
                    break;
                case 2:
                    echo '<td> nota 2 </td>';
                    break;

                default:
                    echo '<td> nota 3 </td>';
                    break;
            }
        }
        echo '</tr>';
        $xml = new DOMDocument();
        $xml->load('notas.xml');
        comprobarhijos($xml);
        echo '</table>';

        ?>
</body>

</html>