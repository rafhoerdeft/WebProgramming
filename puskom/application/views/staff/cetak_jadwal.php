  <?php 
    $pdf = new FPDF('l','mm','A4');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    //header
        // Logo
        $pdf->Image('http://localhost/puskom/assets/img/logo-ummgl.png',10,8,30);
        
        // Arial bold 12
        $pdf->SetFont('Arial','B',12);
        
        // Judul
        $pdf->Cell(280,7,'Jadwal Ujian Puskom',0,1,'C');
        $pdf->Cell(280,7,'Universitas Muhammdiyah Magelang',0,1,'C');
        $pdf->Cell(280,7,'',0,1);
        $pdf->Cell(280,7,'',0,1);
        
        // Garis Bawah Double
        $pdf->Cell(280,1,'','B',1,'C');
        $pdf->Cell(280,1,'','B',0,'C');
        
        // Line break 5mm
        $pdf->Ln(5);
        $pdf->Cell(280,7,'',0,1);
    //header
    $pdf->Cell(25);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10,7,'No',1,0,'C');
    $pdf->Cell(30,7,'Hari',1,0,'C');
    $pdf->Cell(30,7,'Tanggal',1,0,'C');
    $pdf->Cell(30,7,'Waktu',1,0,'C');
    $pdf->Cell(30,7,'Ruang',1,0,'C');
    $pdf->Cell(30,7,'Keterangan',1,0,'C');
    $pdf->Cell(30,7,'Penguji 1',1,0,'C');
    $pdf->Cell(30,7,'Penguji 2',1,1,'C');
    $pdf->SetFont('Arial','',10);
    // $Jadwal = $this->db->get('jadwal')->result();
    foreach ($Penyelesaian->result() as $row){
        $pdf->Cell(25);
        $pdf->Cell(10,6,$row->jd_id,1,0,'C');
        $pdf->Cell(30,6,$row->jd_nama,1,0);
        $pdf->Cell(30,6,$row->jd_tanggal,1,0);
        $pdf->Cell(30,6,$row->jd_waktu,1,0); 
        $pdf->Cell(30,6,$row->jd_ruang,1,0); 
        $pdf->Cell(30,6,$row->jd_keterangan,1,0); 
        $pdf->Cell(30,6,$row->penguji_1,1,0); 
        $pdf->Cell(30,6,$row->penguji_2,1,1);
    }

    $pdf->SetY(-15);
    
    // Arial italic 8
    $pdf->SetFont('Arial','I',8);
    
    $pdf->Output();
?>