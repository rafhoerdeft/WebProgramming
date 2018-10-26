  <?php 
    $pdf = new FPDF('l','mm','A5');
    // membuat halaman baru
    $pdf->AddPage();
        // Logo
        $pdf->Image('http://localhost/lpse/assets/img/SertifPuskom.png',5,2,200);

    // Memberikan No index
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(330,13,'No. 15040056',0,1,'C');

    $pdf->Cell(280,32,'',0,1,'C');
	$pdf->Ln(2);

	// Memberikan Nama dan NPM
	// $pdf->SetFont('Arial','BIU',12);
	// $pdf->AddFont('Monotype','','Monotype.php');
	$pdf->SetFont('Arial','BIU',12);
    $pdf->Cell(190,1,'Nanang Setya Budi',0,1,'C');
    $pdf->Cell(280,4,'',0,1,'C');
    $pdf->SetFont('Arial','BI',10);
    $pdf->Cell(190,1,'14.0504.0066',0,1,'C');

    // Tanggal Pelaksanaan
	$pdf->Cell(280,10,'',0,1,'C');
	$pdf->Ln(1.5);
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(100,1,'03 s/d 24 Maret 2015',0,1,'C');

    // Memberikan Nilai
    $pdf->Cell(280,21,'',0,1,'C');
	$pdf->Ln(1.5);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(223,1,'B',0,1,'C');

    // Memberikan tanggal
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(305,8.5,'4 April 2015',0,1,'C');
	// $pdf->Ln(0.5);
    
    $pdf->Output();
?>