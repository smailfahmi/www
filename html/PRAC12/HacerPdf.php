<?
require('../tema3/fpdf186/fpdf.php');
require('./Header.php');

$arrayCliente = array(
    'Nombre' => 'Jose Luis Fernandez Romero',
    'DNI' => '11971618E',
    'Direccion' => 'C/Larga nº45',
    'Población' => 'Benavente',
    'Ciudad' => 'Zamora'
);
$arrayasociativopedido = array(
    'Laptop' => array(
        'cantidad' => 3,
        'precio' => 250,
        'iva' => 21
    ),
    'Teclado' => array(
        'cantidad' => 2,
        'precio' => 40,
        'iva' => 19
    ),
    'Mouse' => array(
        'cantidad' => 5,
        'precio' => 15,
        'iva' => 21
    ),
    'Monitor' => array(
        'cantidad' => 1,
        'precio' => 200,
        'iva' => 19
    ),
    'Impresora' => array(
        'cantidad' => 4,
        'precio' => 120,
        'iva' => 21
    ),
    'Disco Duro' => array(
        'cantidad' => 3,
        'precio' => 80,
        'iva' => 19
    )
);
$pdf = new HeaderC;         //LLama a la cabecera que hemos creado en otro archivo

$pdf->AddPage();                //Añade una pagina

$pdf->SetFont('helvetica', 'B', 20);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetY(150);
$pdf->SetX(10);
$pdf->SetFont('helvetica', 'B', 20);
$pdf->SetFontSize(12);
creaTabla($arrayasociativopedido, $pdf);

$pdf->Output();

function creaTabla($arrayasociativo, $pdf)
{

    $pdf->SetFillColor(200, 50, 50); //Color de fonfo
    $pdf->Cell(80, 10, 'Concepto', 0, 0, 'C', true);     //True rellena de color de fondo
    $pdf->Cell(27, 10, 'Cantidad', 0, 0, 'C', true);
    $pdf->Cell(27, 10, 'Precio', 0, 0, 'C', true);
    $pdf->Cell(27, 10, 'Suma', 0, 0, 'C', true);
    $pdf->Cell(27, 10, 'I.V.A.', 0, 0, 'C', true);
    $pdf->Ln();

    foreach ($arrayasociativo as $concepto => $resto) {
        $pdf->SetTextColor(200, 50, 50);
        $pdf->SetLineWidth(1.5);
        $pdf->SetDrawColor(200, 50, 50);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(80, 10, $concepto, 'B', 0, 'C', true);
        $contador = 1;
        $cantidad = 0;
        $totalproducto = 0;
        foreach ($resto as $texto => $value) {
            if ($contador == 1) {
                $cantidad = $value;
                $pdf->Cell(27, 10, $value, 'B', 0, 'C', true);
            }
            if ($contador == 2) {
                $totalproducto = $cantidad * $value;
                $pdf->Cell(27, 10, $value . " eu", 'B', 0, 'C', true);
                $pdf->Cell(27, 10, $totalproducto . " eu", 'B', 0, 'C', true);
            }
            if ($contador == 3) {
                $iva = ($totalproducto * $value) / 100;
                $desglose = $value . "% (" . $iva . " eu)";
                $pdf->Cell(27, 10, utf8_decode($desglose), 'B', 0, 'C', true);
            }

            $contador++;
        }
        $pdf->Ln();
    }

    $pdf->Cell(27, 10, "Total Base Imponible", 'B', 0, 'C', true);
}
