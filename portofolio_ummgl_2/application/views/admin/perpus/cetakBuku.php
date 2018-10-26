<?php

		$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',14);
        // HEADER
        $pdf->Cell(190,7,'PORTOFOLIO',0,1,'C');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(190,7,'UNIVERSITAS MUHAMMADIYAH MAGELANG',0,1,'C');
        
        $pdf->Cell(190,2,'',0,1,'C');
        $pdf->SetX(62/2);
        $pdf->Cell(150,0,'','T');
         // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Ln();
       
        // TITLE
        $pdf->Cell(190,8,'',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DATA STATISTIK BUKU PERPUSTAKAAN',0,1,'C');
        $tgl=date('d-m-Y');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(190,7,'Tanggal: '.$tgl,0,1,'C');
        $pdf->Cell(190,2,'',0,1,'C');

        //DATA TABEL
        $pdf->SetX((80)/2);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,8,'No.',1,0,'C');
        $pdf->Cell(85,8,'Kategori Buku',1,0,'C');
        $pdf->Cell(27,8,'Jumlah',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->SetFillColor(224,235,255);
        $fill = false;
        $no = 1;
        foreach ($Buku as $row){
            if ($row->jenis_buku != 'Video' AND $row->jenis_buku != 'Image' AND $row->jenis_buku != 'Sirkulasi') {
                $pdf->SetX(80/2);
                $pdf->Cell(20,7,$no++,1,0,'C',$fill);
                $pdf->Cell(85,7,$row->jenis_buku,1,0,'L',$fill);
                $pdf->Cell(27,7,$row->jml_buku,1,1,'C',$fill);
                $fill = !$fill;
            }
        }
        $pdf->Output();

?>