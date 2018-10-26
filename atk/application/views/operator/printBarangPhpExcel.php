<?php 

	// Panggil class PHPExcel nya
	$excel = new PHPExcel();

	// Settingan awal fil excel
	$excel->getProperties()->setCreator('beelzebondz')
							->setLastModifiedBy('beelze')
							->setTitle("Cetak Laporan Data Barang")
							->setSubject("Std 5")
							->setDescription("Laporan Data Barang")
							->setKeywords("Data Barang");

	// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
	$style_col = array(
		'font' => array('bold' => true),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		),
		'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		),
		'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '5E79FF')
        )
	);

	// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
	$style_row = array(
		'font' => array(
			'bold' => true,
			'size' => (10)
		), // Set font nya jadi bold
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		),
		'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		)
	);

	$style_row_barang = array(
		'font' => array(
			'bold' => true,
			'size' => (10)
		), // Set font nya jadi bold
		'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		)
	);

	$objDrawing = new PHPExcel_Worksheet_Drawing();
	$objDrawing->setName('ATK');
	$objDrawing->setDescription('ATK');
	$objDrawing->setPath('assets/images/print logo.png');
	$excel->getActiveSheet()->mergeCells('A1:B3');
	$objDrawing->setCoordinates('A1');                      
	//setOffsetX works properly
	$objDrawing->setOffsetX(12.5); 
	// $objDrawing->setOffsetY(5);                
	//set width, height
	$objDrawing->setWidth(70); 
	$objDrawing->setHeight(70); 
	$objDrawing->setWorksheet($excel->getActiveSheet());
	
	$excel->getActiveSheet()->mergeCells('C1:E2');
	$excel->setActiveSheetIndex(0)->setCellValue('C1', "UNIVERSITAS MUHAMMADIYAH MAGELANG");
	$excel->getActiveSheet()->getStyle('C1')->getFont()->setBold(TRUE);
	$excel->getActiveSheet()->getStyle('C1')->getFont()->setSize(18);
	$excel->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$excel->setActiveSheetIndex(0)->getStyle('C1')->getAlignment()->setWrapText(true);

	$excel->getActiveSheet()->mergeCells('C3:E3');
	$excel->setActiveSheetIndex(0)->setCellValue('C3', "Jl. Mayjend. Bambang Soegeng, Mertoyudan, Magelang 56172");
	// $excel->getActiveSheet()->getStyle('C1')->getFont()->setBold(TRUE);
	$excel->getActiveSheet()->getStyle('C3')->getFont()->setSize(12);
	$excel->getActiveSheet()->getStyle('C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$excel->setActiveSheetIndex(0)->getStyle('C3')->getAlignment()->setWrapText(true);

	$excel->getActiveSheet()->mergeCells('A5:E5');
	$excel->setActiveSheetIndex(0)->setCellValue('A5', "DAFTAR PERMINTAAN BARANG");
	$excel->getActiveSheet()->getStyle('A5')->getFont()->setBold(TRUE);
	$excel->getActiveSheet()->getStyle('A5')->getFont()->setSize(14);
	$excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$excel->setActiveSheetIndex(0)->getStyle('A5')->getAlignment()->setWrapText(true);

	$excel->getActiveSheet()->mergeCells('A6:E6');
	$excel->setActiveSheetIndex(0)->setCellValue('A6', "$awal - $akhir");
	$excel->getActiveSheet()->getStyle('A6')->getFont()->setSize(12);
	$excel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$excel->setActiveSheetIndex(0)->getStyle('A6')->getAlignment()->setWrapText(true);

	// Buat header tabel nya pada baris ke 7
	$excel->setActiveSheetIndex(0)->mergeCells('A7:A8');
	$excel->setActiveSheetIndex(0)->setCellValue('A7', "No");

	$excel->setActiveSheetIndex(0)->mergeCells('B7:B8');
	$excel->setActiveSheetIndex(0)->setCellValue('B7', "Kode Barang");
	$excel->setActiveSheetIndex(0)->getStyle('B7')->getAlignment()->setWrapText(true);

	$excel->setActiveSheetIndex(0)->mergeCells('C7:C8');
	$excel->setActiveSheetIndex(0)->setCellValue('C7', "Nama Barang");
	$excel->setActiveSheetIndex(0)->getStyle('C7')->getAlignment()->setWrapText(true);

	$excel->setActiveSheetIndex(0)->mergeCells('D7:D8');
	$excel->setActiveSheetIndex(0)->setCellValue('D7', "Jumlah Barang Diminta");
	$excel->setActiveSheetIndex(0)->getStyle('D7')->getAlignment()->setWrapText(true);

	$excel->setActiveSheetIndex(0)->mergeCells('E7:E8');
	$excel->setActiveSheetIndex(0)->setCellValue('E7', "Jumlah Barang Disetujui");
	$excel->setActiveSheetIndex(0)->getStyle('E7')->getAlignment()->setWrapText(true);

	// Apply style header yang telah kita buat tadi ke masing-masing kolom header
	$excel->getActiveSheet()->getStyle('A7:A8')->applyFromArray($style_col);
	$excel->getActiveSheet()->getStyle('B7:B8')->applyFromArray($style_col);
	$excel->getActiveSheet()->getStyle('C7:C8')->applyFromArray($style_col);
	$excel->getActiveSheet()->getStyle('D7:D8')->applyFromArray($style_col);
	$excel->getActiveSheet()->getStyle('E7:E8')->applyFromArray($style_col);

	$no = 1; // Untuk penomoran tabel, di awal set dengan 1
	$numrow = 9; // Set baris pertama untuk isi tabel adalah baris ke 6
	$excel->getActiveSheet()->getStyle('9')->getAlignment()->setWrapText(true);
	foreach($LaporanBarang->result() as $data){ // Lakukan looping dari database
		$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->kode_barang);
		$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->brgmtang_name);
		$excel->setActiveSheetIndex(0)->getStyle('C')->getAlignment()->setWrapText(true);
		$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->diajukan);
		$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->disetujui);

	// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	// $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row_barang);
	$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);

	$no++; // Tambah 1 setiap kali looping
	$numrow++; // Tambah 1 setiap kali looping
	}
	// Set width kolom
	$excel->getActiveSheet()->getColumnDimension('A')->setWidth(3.14);
	$excel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
	$excel->getActiveSheet()->getColumnDimension('C')->setWidth(52.5);
	$excel->getActiveSheet()->getColumnDimension('D')->setWidth(12.5);
	$excel->getActiveSheet()->getColumnDimension('E')->setWidth(12.5);

	// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
	// Set orientasi kertas jadi LANDSCAPE
	$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
	// Set judul file excel nya
	$excel->getActiveSheet(0)->setTitle("Cetak Laporan Data Barang");
	$excel->setActiveSheetIndex(0);
	// Proses file excel
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment; filename="Cetak Laporan Data Barang.xlsx"'); // Set nama file excel nya
	header('Cache-Control: max-age=0');
	$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	$write->save('php://output');

 ?>