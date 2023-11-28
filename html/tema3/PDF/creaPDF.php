<?

require('../fpdf186/fpdf.php');
require('./HeaderC.php');

$pdf = new HeaderC;         //LLama a la cabecera que hemos creado en otro archivo

$pdf->AddPage();                //Añade una pagina
$pdf->SetFont('Courier', 'B', 20); 
$pdf->Write(5,"Hola Mundo");         //5 es la altura



$pdf->AddPage();
$pdf->Image("./logo.jpg", 70,20, 125, 100);

$pdf->AddPage();
$pdf-> Cell(80,10, 'Prueba', 1, 0,'C',false);  //el 0 q no haya salto de linea
$pdf-> Cell(80,10, 'Prueba', 1, 1,'C',false);

$pdf-> Cell(80,10, 'Prueba', 1, 0,'C',false);  //el 0 q no haya salto de linea
$pdf-> Cell(80,10, 'Prueba', 1, 0,'C',false);

$pdf-> Cell(80,10, 'Prueba', 1, 2,'C',false);  //el 2 La pone debajo
$pdf-> Cell(80,10, 'Prueba', 1, 1,'C',false);

$array = array(
    array('pc1', 'lenovo','1TB', '4GBRAM'),
    array('pc2', 'dell','4TB', '8GBRAM'),
    array('pc3', 'hp','3TB', '16GBRAM'),
    array('pc4', 'mac','2TB', '32GBRAM'),


);

$pdf->AddPage();  
createTabla($array, $pdf);

$pdf->Output();

function createTabla ($array, $pdf){

    $pdf-> SetFillColor(0,100,255);     //Color de fonfo
    $pdf-> Cell(45,10, 'PC', 1, 0,'C',true);     //True rellena de color de fondo
    $pdf-> Cell(45,10, 'Marca', 1, 0,'C',true);
    $pdf-> Cell(45,10, 'Disco Duro', 1, 0,'C',true);
    $pdf-> Cell(45,10, 'RAM', 1, 0,'C',true);
    $pdf->Ln();

    foreach ($array as $row) {
        foreach ($row as $dato) {
            $pdf-> Cell(45,10, $dato, 1, 0,'C',false);
        }
        $pdf->Ln();
    }




}