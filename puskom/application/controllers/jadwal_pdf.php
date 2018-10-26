<?php
require('./application/third_party/fpdf/fpdf.php');
// require('./fpdf17/fpdf.php'); 

class PDF extends FPDF{
    // Page header
    function Header(){
        // Logo
        $this->Image('http://localhost/puskom/assets/img/logo-ummgl.png',10,8,30);
        
        // Arial bold 12
        $this->SetFont('Arial','B',12);
        
        // Judul
        $this->Cell(280,7,'Jadwal Ujian Puskom',0,1,'C');
        $this->Cell(280,7,'Universitas Muhammdiyah Magelang',0,1,'C');
        $this->Cell(280,7,'',0,1);
        $this->Cell(280,7,'',0,1);
        
        // Garis Bawah Double
        $this->Cell(280,1,'','B',1,'C');
        $this->Cell(280,1,'','B',0,'C');
        
        // Line break 5mm
        $this->Ln(5);
    }

    // Page footer
    function Footer(){
        // Posisi 15 cm dari bawah
        $this->SetY(-15);
        
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

//Membuat file PDF
$pdf = new PDF('l','mm','A4');
$d= $this->db->get('jadwal')->result();
//Alias total halaman dengan default {nb} (berhubungan dengan PageNo())
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
// Geser Ke Kanan 35mm
    $pdf->Cell(25);
//Mencetak kalimat dengan perulangan
    $pdf->Cell(10,7,'No',1,0,'C');
    $pdf->Cell(30,7,'Hari',1,0,'C');
    $pdf->Cell(30,7,'Tanggal',1,0,'C');
    $pdf->Cell(30,7,'Waktu',1,0,'C');
    $pdf->Cell(30,7,'Ruang',1,0,'C');
    $pdf->Cell(30,7,'Keterangan',1,0,'C');
    $pdf->Cell(30,7,'Penguji 1',1,0,'C');
    $pdf->Cell(30,7,'Penguji 2',1,1,'C');
    $pdf->SetFont('Arial','',10);
   // $Jadwal = $d;
    foreach ($Jadwal as $row){
         $pdf->Cell(10,6,$row->jd_id,1,0,'C');
         $pdf->Cell(30,6,$row->jd_nama,1,0);
         $pdf->Cell(30,6,$row->jd_tanggal,1,0);
         $pdf->Cell(30,6,$row->jd_waktu,1,0); 
    //     $pdf->Cell(30,6,$row->jd_ruang,1,0); 
    //     $pdf->Cell(30,6,$row->jd_keterangan,1,0); 
    //     $pdf->Cell(30,6,$row->penguji_1,1,0); 
    //     $pdf->Cell(30,6,$row->penguji_2,1,1);
    }
    $pdf->Output();
//Menutup dokumen dan dikirim ke browser
$pdf->Output();
?>