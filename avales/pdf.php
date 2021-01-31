<?php
require('fpdf.php');



class PDF extends FPDF
{
// Cargar los datos
function LoadData($file)
{
    // Leer las líneas del fichero
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

	
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->MultiCell(0,3,'Pagina '.$this->PageNo()." -- El codigo de firma digital ha sido enviado al delegado/a a su telefono movil como confirmacion y una copia de este figura en los registros electronicos de la empresa 360NRS que colabora con FeSP-UGT en el envio de SMS certificados y registro electronico -- Este PDF se genera automaticamente con datos registrados de la votacion de avales");
}

// Tabla coloreada
function FancyTable($header, $data)
{
    // Colores, ancho de línea y fuente en negrita
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('Arial','B',8);
    // Cabecera
    $w = array(20, 60, 60, 50);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauración de colores y fuentes
    $this->SetFillColor(219,217,219);
    $this->SetTextColor(0);
    $this->SetFont('Arial','B',8);
    // Datos
    $fill = false;
    foreach($data as $row)
    {
		$this->SetFont('Arial','B',8);
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
		$this->SetFont('Arial','B',5);
        $this->Cell($w[3],6,$row[3],'LR',0,'L',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
// Títulos de las columnas
$header = array('DNI', 'Nombre', 'Apellidos', 'Codigo Firma Digital');
// Carga de datos
$data = $pdf->LoadData('a.txt');
$pdf->SetFont('Arial','',8);
$pdf->AddPage();
$pdf->Cell(40,10,'Avales a la candidatura presentada por Carmen Campoy Herrera a la Comision Ejecutiva Regional');
$pdf->Ln(10);
$pdf->FancyTable($header,$data);
// Siguiente tabla
$header = array('DNI', 'Nombre', 'Apellidos', 'Codigo Firma Digital');
// Carga de datos
$data = $pdf->LoadData('b.txt');
$pdf->SetFont('Arial','',8);
$pdf->AddPage();
$pdf->Cell(40,10,'Avales a los representantes de los sectores al Comite Regional presentada por Carmen Campoy Herrera');
$pdf->Ln(10);
$pdf->FancyTable($header,$data);
// Siguiente tabla
$header = array('DNI', 'Nombre', 'Apellidos', 'Codigo Firma Digital');
// Carga de datos
$data = $pdf->LoadData('c.txt');
$pdf->SetFont('Arial','',8);
$pdf->AddPage();
$pdf->Cell(40,10,'Avales a la candidatura al Comite Regional de UGT presentada por Carmen Campoy Herrera');
$pdf->Ln(10);
$pdf->FancyTable($header,$data);
// Siguiente tabla
$header = array('DNI', 'Nombre', 'Apellidos', 'Codigo Firma Digital');
// Carga de datos
$data = $pdf->LoadData('d.txt');
$pdf->SetFont('Arial','',8);
$pdf->AddPage();
$pdf->Cell(40,10,'Avales a la candidatura al Congreso Federal presentada por Carmen Campoy Herrera');
$pdf->Ln(10);
$pdf->FancyTable($header,$data);
// Siguiente tabla
$header = array('DNI', 'Nombre', 'Apellidos', 'Codigo Firma Digital');
// Carga de datos
$data = $pdf->LoadData('e.txt');
$pdf->SetFont('Arial','',8);
$pdf->AddPage();
$pdf->Cell(40,10,'Avales a la candidatura al Comite Federal presentada por Carmen Campoy Herrera');
$pdf->Ln(10);
$pdf->FancyTable($header,$data);
$pdf->Output();
?>