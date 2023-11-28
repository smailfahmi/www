<style>
    td {
        border: solid 1px black;
        text-align: center;
    }
</style>
<?
function cambiardis()
{
}
function editar($oculto)
{
    echo $oculto;
?>
    <form action="" method="GET">
        <input type="hidden" name="oculto1" value="<? echo $oculto ?>">
        <p><label for="opcion1">SI<input type="radio" name="opcion[]" id="ch1" value="si"></label>
            <label for="opcion2">NO<input type="radio" name="opcion[]" id="ch2" value="no"></label>
        </p>
        <input type="submit" value="Editar" name="EditarF">
    </form>

<? }
if (isset($_REQUEST['Editar'])) {
    print_r($_REQUEST);
    editar($_REQUEST['oculto']);
} elseif (isset($_REQUEST['EditarF'])) {
    print_r($_REQUEST);
    // Cargar el archivo XML
    $xml = new DOMDocument();
    $xml->load('juegos.xml');
    // Obtener todos los elementos 'juego'
    $juegos = $xml->getElementsByTagName('juego');
    // Supongamos que deseas cambiar la disponibilidad del juego con ID 3 a "no"
    $targetId = $_REQUEST['oculto1'];
    $newDisponibilidad = $_REQUEST['opcion'][0];
    foreach ($juegos as $juego) {
        // Obtener el atributo 'id' de cada juego
        $id = $juego->getAttribute('id');
        // Verificar si el ID coincide con el juego que queremos modificar
        if ($id == $targetId) {
            // Actualizar el atributo 'disponible' del juego
            $juego->setAttribute('disponible', $newDisponibilidad);
            break; // Salir del bucle una vez que se ha actualizado el juego deseado
        }
    }
    // Guardar los cambios en el archivo XML
    $xml->save('juegos.xml');
    // echo 'Disponibilidad modificada correctamente para el juego con ID ' . $targetId;
    echo 'Disponibilidad modificada correctamente para el juego con ID ' . $targetId;

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
} elseif (isset($_REQUEST['Cambiar'])) {

    // Cargar el archivo XML
    $xml = new DOMDocument();
    $xml->load('juegos.xml');

    // Obtener todos los elementos 'juego'
    $juegos = $xml->getElementsByTagName('juego');

    // Supongamos que deseas cambiar el nombre del juego con ID 3 a "Nuevo Nombre"
    $targetId = $_REQUEST['oculto'];
    $newName = "pokemon";

    foreach ($juegos as $juego) {
        // Obtener el atributo 'id' de cada juego
        $id = $juego->getAttribute('id');

        // Verificar si el ID coincide con el juego que queremos modificar
        if ($id == $targetId) {
            // Obtener el elemento 'nombre' del juego
            $nombreElement = $juego->getElementsByTagName('nombre')->item(0);

            // Actualizar el contenido del elemento 'nombre'
            $nombreElement->nodeValue = $newName;
            break; // Salir del bucle una vez que se ha actualizado el nombre del juego deseado
        }
    }

    // Guardar los cambios en el archivo XML
    $xml->save('juegos.xml');

    echo 'Nombre del juego con ID ' . $targetId . ' cambiado a ' . $newName;
} elseif (isset($_REQUEST['Eliminar'])) {
    // Cargar el archivo XML
    $xml = new DOMDocument();
    $xml->load('juegos.xml');

    // Obtener todos los elementos 'juego'
    $juegos = $xml->getElementsByTagName('juego');

    // Supongamos que deseas eliminar el juego con ID 2
    $targetId = $_REQUEST['oculto'];

    foreach ($juegos as $juego) {
        // Obtener el atributo 'id' de cada juego
        $id = $juego->getAttribute('id');

        // Verificar si el ID coincide con el juego que queremos eliminar
        if ($id == $targetId) {
            // Obtener el nodo padre del juego (en este caso, el nodo 'juegos')
            $parent = $juego->parentNode;

            // Eliminar el juego del XML
            $parent->removeChild($juego);
            break; // Salir del bucle una vez que se ha eliminado el juego deseado
        }
    }

    // Guardar los cambios en el archivo XML
    $xml->save('juegos.xml');

    echo 'Juego eliminado correctamente con el ID ' . $targetId;
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
} else {

    $dom = new DOMDocument();
    $dom->load('juegos.xml');
    echo '<table> <tr>';

    for ($i = 0; $i < 5; $i++) { //cabecera 
        switch ($i) {
            case 0:
                echo '<td> nombre </td>';
                break;
            case 1:
                echo '<td> disponibilidad </td>';
                break;
            case 2:
                echo '<td> id </td>';
                break;
            case 3:
                echo '<td> dispositivos </td>';
                break;
            default:
                echo '<td> botones </td>';
                break;
        }
    }
    echo '</tr>';
    echo '<pre>';
    //cuerpo de la tabla 
    foreach ($dom->getElementsByTagName('juego') as $juego) {
        echo '<pre>';
        // print_r($alumno->getElementsByTagName('nombre')->item(0));
        $nombre = $juego->getElementsByTagName('nombre')->item(0)->textContent;
        $atributoId = $juego->attributes->item(0)->textContent;
        $atributoDispo = $juego->attributes->item(1)->textContent;
        $dispositivos = $juego->getElementsByTagName('dispositivos')->item(0)->childNodes;
        $compatibles = '';
        foreach ($dispositivos as $dispositivo) {
            if ($dispositivo->nodeType == 1) {
                $compatibles .= '<div>' . $dispositivo->textContent . '</div>';
            }
        }

        // $nota2 = $alumno->getElementsByTagName('nota2')->item(0)->nodeValue;
        // $nota3 = $alumno->getElementsByTagName('nota3')->item(0)->nodeValue;
        echo '<tr> <td>' . $nombre . '</td> <td>' . $atributoDispo . '</td> <td>' . $atributoId . '</td> <td>' . $compatibles . '</td> <td><form action="" method="GET"><label for=""><input type="hidden" value=' . $atributoId . ' name="oculto"></label><label for=""><input type="submit" value="Editar" name="Editar"></label><label for=""><input type="submit" value="Eliminar" name="Eliminar"></label><label for=""><input type="submit" value="Cambiar" name="Cambiar"></label></form></td> </tr>';
    }
    echo '</table>';
}
