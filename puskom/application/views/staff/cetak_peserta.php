<?php 
    // $pdf = new FPDF('l','mm','A4');
$pdf = new FPDF();
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    //header
        // Logo
        $pdf->Image('http://localhost/puskom/assets/img/logo-ummgl.png',10,8,30);
        
        // Arial bold 12
        $pdf->SetFont('Arial','B',18);
        
        // Judul
        $pdf->Cell(190,7,'Jadwal Ujian Puskom',0,1,'C');
        $pdf->Cell(190,7,'Universitas Muhammdiyah Magelang',0,1,'C');
        $pdf->Cell(190,7,'',0,1);
        $pdf->Cell(190,7,'',0,1);
        
        // Garis Bawah Double
        $pdf->Cell(190,1,'','B',1,'C');
        $pdf->Cell(190,1,'','B',0,'C');
        
        // Line break 5mm
        $pdf->Ln(5);
    //header
        $jadwal = $Peserta->row_array();
        $jd_tanggal = $jadwal['jd_tanggal'];
        $jd_waktu = $jadwal['jd_waktu'];
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(190,7,'Waktu Pelaksanaan Ujian '.$jd_tanggal.' dan Pukul '.$jd_waktu,0,1,'C');
    $pdf->Cell(190,7,'',0,1);
    $pdf->Cell(25);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10,7,'No',1,0,'C');
    $pdf->Cell(30,7,'NPM',1,0,'C');
    $pdf->Cell(50,7,'Nama Mahasiswa',1,0,'C');
    $pdf->Cell(30,7,'Jenis Kelas',1,0,'C');
    $pdf->Cell(30,7,'Prodi',1,1,'C');
    $pdf->SetFont('Arial','',10);
    // $Jadwal = $this->db->get('jadwal')->result();
    $no=1;
    foreach ($Peserta->result() as $row){
        $pdf->Cell(25);
        $pdf->Cell(10,6,$no++,1,0,'C');        
        $pdf->Cell(30,6,$row->mhs_nim,1,0); 
        $pdf->Cell(50,6,$row->mhs_nama,1,0); 
        $pdf->Cell(30,6,$row->jk_nama,1,0); 
        $pdf->Cell(30,6,$row->pst_nama,1,1);
    }

    $pdf->SetY(-15);
    
    // Arial italic 8
    $pdf->SetFont('Arial','I',8);
    
    $pdf->Output();
 ?>