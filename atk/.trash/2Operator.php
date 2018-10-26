<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('masterData');
		if ($this->session->userdata('level')!= "Operator") {
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
    }

	public function index(){
		$select = array(
			'master_permintaan.kode_permintaan as kode_permintaan',
		    'ais_unitkerjaaset.ukerja_name as ukerja_name',
		);
		$table = array(
			'master_permintaan',
    		'ais_unitkerjaaset'
		);
		$where = "
			master_permintaan.ukerja_kode = ais_unitkerjaaset.ukerja_kode AND
			date(tgl_permintaan) = curdate()
		";

		$data ['ListRequest'] = $this->masterData->getWhereData($select,$table,$where);
		$data ['Request'] = $this->masterData->getWhereData($select,$table,$where)->num_rows();
		###########################################################################################
		$select = array(
			'detail_permintaan.kode_barang',
			'ais_barangmtang.brgmtang_name',
			'sum(detail_permintaan.jumlah_barang) AS jumlah_barang'
		);
		$table = array(
			'detail_permintaan',
		    'master_permintaan',
		    'ais_barangmtang'
		);
		$where = "
				detail_permintaan.kode_permintaan = master_permintaan.kode_permintaan AND
			    detail_permintaan.kode_barang = ais_barangmtang.brgmtang_kode AND
			    date(tgl_permintaan) = curdate()
			    GROUP BY detail_permintaan.kode_barang
		";
		$data ['ListGoods'] = $this->masterData->getWhereData($select,$table,$where);
		$data ['Goods'] = $this->masterData->getWhereData($select,$table,$where)->num_rows();
		##########################################################################################
		$select = array(
			'master_permintaan.kode_permintaan',
		    'ais_unitkerjaaset.ukerja_name',
		    'detail_permintaan.kode_barang',
		    'ais_barangmtang.brgmtang_name',
		    'detail_permintaan.jml_brgsetuju'
		);
		$table = array(
			'master_permintaan',
		    'ais_unitkerjaaset',
		    'detail_permintaan',
		    'ais_barangmtang'
		);
		$where = "
			master_permintaan.kode_permintaan = detail_permintaan.kode_permintaan AND
		    detail_permintaan.kode_barang = ais_barangmtang.brgmtang_kode AND
		    ais_unitkerjaaset.ukerja_kode = master_permintaan.ukerja_kode AND
		    detail_permintaan.status_barang = 'Dikirim' AND
		    date(tgl_permintaan) = curdate()
		";

		$data ['ListSent'] = $this->masterData->getWhereData($select,$table,$where);
		$data ['Sent'] = $this->masterData->getWhereData($select,$table,$where)->num_rows();
		##########################################################################################
		$select = array(
			'master_permintaan.kode_permintaan',
		    'ais_unitkerjaaset.ukerja_name',
		    'detail_permintaan.kode_barang',
		    'ais_barangmtang.brgmtang_name',
		    'detail_permintaan.jumlah_barang'
		);
		$table = array(
			'master_permintaan',
		    'ais_unitkerjaaset',
		    'detail_permintaan',
		    'ais_barangmtang'
		);
		$where = "
			master_permintaan.kode_permintaan = detail_permintaan.kode_permintaan AND
		    detail_permintaan.kode_barang = ais_barangmtang.brgmtang_kode AND
		    ais_unitkerjaaset.ukerja_kode = master_permintaan.ukerja_kode AND
		    detail_permintaan.status_barang = 'Diterima' AND
		    date(master_permintaan.tgl_perubahan_notif) = curdate()
		";
		$data ['ListAccept'] = $this->masterData->getWhereData($select,$table,$where);
		$data ['Accept'] = $this->masterData->getWhereData($select,$table,$where)->num_rows();


		$data['id_nav'] = 1;
		$data['id_nav_sub'] = 0;
		$this->load->view('operator/header');
		$this->load->view('operator/navigation',$data);
		$this->load->view('operator/dashboard', $data);
		$this->load->view('operator/footer');
	}

	// Ambil Data Barang
	public function getDataBarang(){
		$select = array('brg.brgmtang_id id_barang','brg.brgmtang_kode kode_barang', 'brg.brgmtang_name nama_barang', 'brg.brgmtang_satuanbrg_fk sat_id', 'sat.stabrg_name satuan_barang');
		$table = array('ais_barangmtang brg', 'ais_satuanbrg sat');
		$where = 'brg.brgmtang_satuanbrg_fk=sat.satbrg_id';
		$by = 'brg.brgmtang_id';
		$order = 'DESC';
		$barang = $this->masterData->getWhereDataOrder($select,$table,$where,$by,$order)->result();
		echo json_encode($barang);
	}

	// Kode Barang Otomatis
	public function kodeBarangOtomatis(){
		$select2 = array('max(brgmtang_kode) brg_kode');
		$barang = $this->masterData->getSelectData($select2,'ais_barangmtang');
		$jml_brg = $barang->num_rows();
		$brg = $barang->row_array();
		// var_dump($brg);
		if ($jml_brg>0) {
		   $kode = substr($brg['brg_kode'], 1);
		   // menjadikan $nilaikode ( int )
		   $kdBrg = (int) $kode;
		   // setiap $kode di tambah 1
		   $kdBrg++;
		   $kdBrgOto = "B".str_pad($kdBrg, 5, "0", STR_PAD_LEFT);
	    } else {
	   		$kdBrgOto = "B00001";
	    }
	    // $kodeBrgOto = array ('kode_barang'=>$kdBrgOto);
	    // echo json_encode($kodeBrgOto);
	    echo $kdBrgOto;
	}

	// Tampil View Data Barang
	public function barang(){
		$data['id_nav'] = 2;
		$data['id_nav_sub'] = 0;
		$data['tampil'] = 'barang';
		$select = array('satbrg_id sat_id', 'stabrg_name sat_nama');
		$data['satuan'] = $this->masterData->getSelectData($select,'ais_satuanbrg')->result();

		// $select2 = array('brg.brgmtang_id id_barang','brg.brgmtang_kode kode_barang', 'brg.brgmtang_name nama_barang', 'brg.brgmtang_satuanbrg_fk sat_barang');
		// $table = 'ais_barangmtang brg';
		// $by = 'brg.brgmtang_id';
		// $order = 'ASC';
		// $data['barang'] = $this->masterData->getSelectDataOrder($select2,$table,$by,$order)->result();

		$this->load->view('operator/header');
		$this->load->view('operator/navigation',$data);
		$this->load->view('operator/barang',$data);
		$this->load->view('operator/footer');
	}

	// Tambah Data Barang
	public function addBarang(){
		$kobar = $this->input->POST('kobar');
		$nabar = $this->input->POST('nabar');
		$sabar = $this->input->POST('sabar');

		$select = 'brgmtang_kode';
		$table = 'ais_barangmtang';
		$where = array('brgmtang_name'=>$nabar, 'brgmtang_satuanbrg_fk'=>$sabar);
		$brg = $this->masterData->getWhereData($select,$table,$where);
		$cek = $brg->num_rows();

		if ($cek>0) {
			echo "Tersedia";
		}else{
			$data = array(
				'brgmtang_kode' => $kobar,
				'brgmtang_name' => $nabar,
				'brgmtang_satuanbrg_fk' => $sabar
			);
			$input = $this->masterData->inputData($data,'ais_barangmtang');
			if ($input) {
				echo "Success";
			}else{
				echo "Gagal";
			}
		}
	}

	// Update Data Barang
	public function updateBarang(){
		$kobar = $this->input->POST('kobar');
		$nabar = $this->input->POST('nabar');
		$sabar = $this->input->POST('sabar');

		$select = 'brgmtang_kode';
		$table = 'ais_barangmtang';
		$where = array('brgmtang_name'=>$nabar, 'brgmtang_satuanbrg_fk'=>$sabar);
		$brg = $this->masterData->getWhereData($select,$table,$where);
		$cek = $brg->num_rows();

		if ($cek>0) {
			echo "Tersedia";
		}else{
			$data = array(
				'brgmtang_name' => $nabar,
				'brgmtang_satuanbrg_fk' => $sabar
			);
			$where2 = array('brgmtang_kode'=>$kobar);
			$update = $this->masterData->editData($where2,$data,'ais_barangmtang');
			if ($update) {
				echo "Success";
			}else{
				echo "Gagal";
			}
		}
	}

	// Satuan Barang
	public function getSatuanBrg(){
		// Satuan Barang
		$select = array('satbrg_id sat_id', 'stabrg_name sat_nama');
		$data = $this->masterData->getSelectData($select,'ais_satuanbrg')->result();
		echo json_encode($data);
	}

	// Data Barang Update
	public function getUpdateDataBrg(){
		$id = $this->input->GET('id');
		$where = 'brg.brgmtang_satuanbrg_fk=sat.satbrg_id AND brg.brgmtang_id='.$id;
		$select = array('brg.brgmtang_id id_barang', 'brg.brgmtang_kode kode_barang', 'brg.brgmtang_name nama_barang', 'brg.brgmtang_satuanbrg_fk sat_id', 'sat.stabrg_name sat_barang');
		$table = array('ais_barangmtang brg', 'ais_satuanbrg sat');
		$data = $this->masterData->getWhereData($select,$table,$where)->result();
		echo json_encode($data);
	}

	// Hapus Data Barang
	public function deleteBarang(){
		$id = $this->input->POST('id');

		$where = array('brgmtang_id'=>$id);
		$delete = $this->masterData->deleteData($where,'ais_barangmtang');
		if ($delete) {
			echo "Success";
		}else{
			echo "Gagal";
		}
	}

	// Tampil View Data permintaan
	public function permintaan(){
		$data['id_nav'] = 3;
		$data['id_nav_sub'] = 0;
		$data['tampil'] = 'permintaan';
		// SELECT COUNT(status_barang) jml, status_barang, kode_permintaan FROM `detail_permintaan` GROUP BY status_barang, kode_permintaan ORDER BY kode_permintaan ASC
		$select = array('COUNT(status_barang) jml', 'status_barang', 'kode_permintaan');
		$group = array('status_barang','kode_permintaan');
		$by = 'kode_permintaan';
		$order = 'ASC';
		$data['status'] = $this->masterData->getDataGroupOrder($select,'detail_permintaan',$group,$by,$order)->result();

		$this->load->view('operator/header');
		$this->load->view('operator/navigation',$data);
		$this->load->view('operator/permintaan',$data);
		$this->load->view('operator/footer');
	}

	public function cobaArray(){
		$coba = array(
			'Motor'=>array('Honda','Suzuki','Yamaha'),
			'Mobil'=>array('Honda','Suzuki','Datsun','Daihatsu'),
			'Kendaraan roda 3'=>'Bajjaj'
		);
		// array_push_assoc($coba, 'Kendaraan Roda 4','dfdf');
		$coba['Kendaraan Roda 4']='Xenia';
		$tes = array($coba);
		
		echo json_encode($tes);
	}

	// Ambil Data permintaan
	public function getDataPermintaan(){
		// SELECT mp.id_permintaan id, mp.kode_permintaan kode, date(mp.tgl_permintaan) tgl, time(mp.tgl_permintaan) waktu, uk.ukerja_name unit FROM `master_permintaan` mp, ais_unitkerjaaset uk WHERE mp.ukerja_kode=uk.ukerja_kode ORDER BY mp.id_permintaan DESC
		$select1 = array('COUNT(status_barang) jml', 'status_barang', 'kode_permintaan');
		$group1 = array('status_barang','kode_permintaan');
		$by1 = 'kode_permintaan';
		$order1 = 'ASC';
		$status = $this->masterData->getDataGroupOrder($select1,'detail_permintaan',$group1,$by1,$order1)->result();

		$select = array('mp.id_permintaan id_pmt', 'mp.kode_permintaan kode','date(mp.tgl_permintaan) tgl','time(mp.tgl_permintaan) waktu', 'uk.ukerja_name unit');
		$table = array('master_permintaan mp', 'ais_unitkerjaaset uk');
		$where = 'mp.ukerja_kode=uk.ukerja_kode';
		$by = 'mp.id_permintaan';
		$order = 'DESC';
		$permintaan = $this->masterData->getWhereDataOrder($select,$table,$where,$by,$order)->result();

		$data = array();

		foreach ($permintaan as $key) {
			$pmt = array(
				'id_pmt'=>$key->id_pmt,
				'kode'=>$key->kode,
				'tgl'=>$key->tgl,
				'waktu'=>$key->waktu,
				'unit'=>$key->unit,
				'status'=>array(),
				'jml_status'=>array()
			);
			foreach ($status as $val) {
				if ($key->kode==$val->kode_permintaan) {
					// $value = $val->status_barang.' '.$val->jml;
					array_push($pmt['status'],$val->status_barang);
					array_push($pmt['jml_status'],$val->jml);
				}
			}

			array_push($data, $pmt);
		}

		echo json_encode($data);
	}

	public function kirimBarang(){
		$id = $this->input->get('id');

		$select = "kode_permintaan";
		$wheres = "id_permintaan=".$id;
		$data_pmt = $this->masterData->getWhereData($select,'master_permintaan',$wheres);
		$pmt = $data_pmt->row_array();
		$kode_pmt = $pmt['kode_permintaan'];
		// echo var_dump($kode_pmt);
		// UPDATE `detail_permintaan` SET status_barang='Dikirim' WHERE kode_permintaan='040918000302' AND status_barang='Diproses'
		$data = array('status_barang'=>'Dikirim');
		$where = array(
			'kode_permintaan'=>$kode_pmt,
			'status_barang'=>'Diproses'
		);
		$kirim = $this->masterData->editData($where,$data,'detail_permintaan');

		$tgl = date('Y-m-d H:i:s');
		$data2 = array(
			'status_notif_user'=> 0,
			'tgl_perubahan_notif'=> $tgl
		);
		$where2 = "kode_permintaan='$kode_pmt'";
		$master_pmt = $this->masterData->editData($where2,$data2,'master_permintaan');
		if ($kirim) {
			echo "Success";
		}else{
			echo "Gagal";
		}
	}

	public function getDetailPermintaan(){
        $id=$this->input->get('id');
        // var_dump($id);
        $select = array(
        	'dtl_pmt.id_permintaan id_pmt',
        	'dtl_pmt.status_barang status',
        	'dtl_pmt.kode_permintaan kode_pmt',
        	'unit.ukerja_name ukerja',
			'brg.brgmtang_kode kode',
			'brg.brgmtang_name nama',
			'dtl_pmt.jumlah_barang jml',
			'dtl_pmt.jml_brgsetuju jml_setuju'
		);
		$where = "mst_pmt.ukerja_kode=unit.ukerja_kode AND mst_pmt.kode_permintaan=dtl_pmt.kode_permintaan AND dtl_pmt.kode_barang = brg.brgmtang_kode AND dtl_pmt.kode_permintaan = mst_pmt.kode_permintaan AND mst_pmt.id_permintaan='$id'";
		$table = array(
			'ais_barangmtang brg',
			'master_permintaan mst_pmt',
			'ais_unitkerjaaset unit',
			'detail_permintaan dtl_pmt'
		);
        $data=$this->masterData->getWhereData($select, $table, $where)->result();
        echo json_encode($data);
    }	

    public function changeStatusNotif(){
    	$id = $this->input->POST('id');
    	$data = array('status_notif'=>'2');
    	$where = 'kode_permintaan='.$id;
    	$update = $this->masterData->editData($where,$data,'master_permintaan');
    	if ($update) {
    		echo "Success";
    	}else{
    		echo "Gagal";
    	}
    }

	public function konfirmasiPermintaan(){
		$kode_pmt = $this->input->POST('kode_pmt');
		$kode_brg = $this->input->POST('kode_brg');
		$jml = $this->input->POST('qty');

		// var_dump($kode_pmt,$kode_brg,$jml);

		$i=0;
		foreach ($kode_brg as $row){
		// if( ! empty($row)){
			if ($jml[$i]>0) {
				$status_barang = 'Diproses';
			}else{
				$status_barang = 'Ditolak';
			}
			$data = array(
				'status_barang' => $status_barang,
				'jml_brgsetuju' => $jml[$i]
			);
			$where = array(
				'kode_permintaan' => $kode_pmt,
				'kode_barang' => $row
			);
			$detail_pmt = $this->masterData->editData($where,$data,'detail_permintaan');

		$i++;
		}

		$tgl = date('Y-m-d H:i:s');
		$data2 = array(
			'status_notif' => 2,
			'status_notif_user'=> 0,
			'tgl_perubahan_notif'=> $tgl
		);
		$where2 = "kode_permintaan='$kode_pmt'";
		$master_pmt = $this->masterData->editData($where2,$data2,'master_permintaan');

		if ($detail_pmt) {
			echo "Success";
		}else{
			echo "Gagal";
		}
	}

	public function countNotif(){
		$select = array (
			'COUNT(*) jml_notif'
		);
		$table = array('master_permintaan');
		$where = 'status_notif=0';
		$data = $this->masterData->getWhereData($select,$table,$where)->result();
		echo json_encode($data);
	}

	public function clearCount(){
		$data = array(
			'status_notif' => 1
		);
		$where = 'status_notif=0';
		$table = 'master_permintaan';
		$update = $this->masterData->editData($where,$data,$table);
		if ($update) {
			echo "Success";
		}else{
			echo "Gagal";
		}
	}

	public function notification(){
		$select = array (
			'pmt.id_permintaan id_pmt',
			'pmt.kode_permintaan',
			'date(pmt.tgl_permintaan) tgl',
			'time(pmt.tgl_permintaan) jam',
			'unit.ukerja_name',
			'pmt.status_notif'
		);
		$table = array('master_permintaan pmt','ais_unitkerjaaset unit');
		$where = 'pmt.ukerja_kode=unit.ukerja_kode';
		$limit = 10;
		$by = 'pmt.id_permintaan';
		$order = 'DESC';
		$data = $this->masterData->getWhereDataLimitOrder($select,$table,$where,$limit,$by,$order)->result();
		echo json_encode($data);
	}

	// =========================================================== HALAMAN Laporan ===============================================================
	public function laporanBarang(){
		$data['id_nav'] = 4;
		$data['id_nav_sub'] = 5;
		$data['tampil'] = 'lap_brg';
		$this->load->view('operator/header');
		$this->load->view('operator/navigation',$data);
		$this->load->view('operator/laporanBarang');
		$this->load->view('operator/footer');
	}

	public function showLaporanBarang(){
		$select = array(
			'detail_permintaan.kode_barang',
			'ais_barangmtang.brgmtang_name',
			'sum(detail_permintaan.jumlah_barang) AS jumlah_barang'
		);
		$table = array(
			'detail_permintaan',
		    'master_permintaan',
		    'ais_barangmtang'
		);
		$where = "
				detail_permintaan.kode_permintaan = master_permintaan.kode_permintaan AND
			    detail_permintaan.kode_barang = ais_barangmtang.brgmtang_kode
			    GROUP BY detail_permintaan.kode_barang
		";
		$data = $this->masterData->getWhereData($select,$table,$where)->result();
		echo json_encode($data);
	}

	public function getLaporanBarang(){
		$dateRange=$this->input->get('id');
		$string = explode('/',$dateRange);

		$first = $string[0];
		$last = $string[1];

		$select = array(
			'detail_permintaan.kode_barang',
			'ais_barangmtang.brgmtang_name',
			'sum(detail_permintaan.jumlah_barang) AS jumlah_barang'
		);
		$table = array(
			'detail_permintaan',
		    'master_permintaan',
		    'ais_barangmtang'
		);
		$where = "
				detail_permintaan.kode_permintaan = master_permintaan.kode_permintaan AND
			    detail_permintaan.kode_barang = ais_barangmtang.brgmtang_kode AND
			    date(master_permintaan.tgl_permintaan) BETWEEN '$first' AND '$last'
			    GROUP BY detail_permintaan.kode_barang
		";
		$data = $this->masterData->getWhereData($select,$table,$where)->result();
		echo json_encode($data);
	}

	public function showGrafikBar(){
		$kode_barang=$this->input->get('id');
		$select = array(
			'ais_unitkerjaaset.ukerja_name',
    		'SUM(detail_permintaan.jumlah_barang) AS jumlah_barang'
		);
		$table = array(
			'ais_unitkerjaaset',
		    'detail_permintaan',
		    'ais_barangmtang',
		    'master_permintaan'
		);
		$where = "
			detail_permintaan.kode_permintaan = master_permintaan.kode_permintaan AND
		    detail_permintaan.kode_barang = ais_barangmtang.brgmtang_kode AND
		    master_permintaan.ukerja_kode = ais_unitkerjaaset.ukerja_kode AND
		    ais_barangmtang.brgmtang_kode = '$kode_barang'
			GROUP BY ais_unitkerjaaset.ukerja_name
		";
		// date(master_permintaan.tgl_permintaan) BETWEEN '2018-09-12' AND '2018-09-14'
		$data = $this->masterData->getWhereData($select,$table,$where);

		// $query = $this->db->query("SELECT merk,SUM(stok) AS stok FROM barang GROUP BY merk");
          
        $array = array();
        if($data->num_rows() > 0){
            foreach($data->result() as $key){
                $ukerja_name = $key->ukerja_name;
                $jumlah_barang = $key->jumlah_barang;
                $hasil = array(
            	'ukerja_name' => $ukerja_name,
            	'jumlah_barang' => $jumlah_barang,
            );
                array_push($array, $hasil);
            }
        }

		echo json_encode($array);
	}

	public function printLaporanBarang(){
		$dateRange=$this->input->post('reservation-brg');
		$string = explode('/',$dateRange);

		$first = $string[0];
		$last = $string[1];		

		$select = array(
			'detail_permintaan.kode_barang',
			'ais_barangmtang.brgmtang_name',
			'sum(detail_permintaan.jumlah_barang) AS diajukan',
    		'sum(detail_permintaan.jml_brgsetuju) AS disetujui'
		);
		$table = array(
			'detail_permintaan',
		    'master_permintaan',
		    'ais_barangmtang'
		);
		$where = "
				detail_permintaan.kode_permintaan = master_permintaan.kode_permintaan AND
			    detail_permintaan.kode_barang = ais_barangmtang.brgmtang_kode AND
			    date(master_permintaan.tgl_permintaan) BETWEEN '$first' AND '$last'
			    GROUP BY detail_permintaan.kode_barang
		";
		$data ["LaporanBarang"] = $this->masterData->getWhereData($select,$table,$where);

		$data ["awal"] = $first;
		$data ["akhir"] = $last;

		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		$this->load->view('operator/printBarangPhpExcel', $data);
	}

	public function laporanUnit(){
		$data['id_nav'] = 4;
		$data['id_nav_sub'] = 6;
		$data['tampil'] = 'lap_unit';
		$this->load->view('operator/header');
		$this->load->view('operator/navigation',$data);
		$this->load->view('operator/laporanUnit');
		$this->load->view('operator/footer');
	}	

	public function showLaporanUnit(){
		$select = array(
			'master_permintaan.kode_permintaan as kode_permintaan',
		    'ais_unitkerjaaset.ukerja_name as ukerja_name',
		    'ais_unitkerjaaset.ukerja_kode as ukerja_kode',
		    'date(master_permintaan.tgl_permintaan) as tgl_permintaan'
		);
		$table = array(
			'master_permintaan',
    		'ais_unitkerjaaset'
		);
		$where = "
			master_permintaan.ukerja_kode = ais_unitkerjaaset.ukerja_kode
		";
		$by = "master_permintaan.tgl_permintaan";
		$order = "DESC";
		$data = $this->masterData->getWhereDataOrder($select,$table,$where,$by,$order)->result();
		echo json_encode($data);
	}

	public function getLaporanUnit(){
		$dateRange=$this->input->get('id');
		$string = explode('/',$dateRange);

		$first = $string[0];
		$last = $string[1];

		$select = array(
			'master_permintaan.kode_permintaan as kode_permintaan',
		    'ais_unitkerjaaset.ukerja_name as ukerja_name',
		    'ais_unitkerjaaset.ukerja_kode as ukerja_kode',
		    'date(master_permintaan.tgl_permintaan) as tgl_permintaan'
		);
		$table = array(
			'master_permintaan',
    		'ais_unitkerjaaset'
		);
		$where = "
			master_permintaan.ukerja_kode = ais_unitkerjaaset.ukerja_kode AND
    		date(master_permintaan.tgl_permintaan) BETWEEN '$first' and '$last'
		";
		$by = "master_permintaan.tgl_permintaan";
		$order = "DESC";
		$data = $this->masterData->getWhereDataOrder($select,$table,$where,$by,$order)->result();
		echo json_encode($data);
	}

	public function getDetailLaporanUnit(){
		$detail_permintaan=$this->input->get('id');
		$select = array(
			'ais_barangmtang.brgmtang_kode',
		    'ais_barangmtang.brgmtang_name',
		    'detail_permintaan.jumlah_barang',
		    'detail_permintaan.jml_brgsetuju'
		);
		$table = array(
			'detail_permintaan',
		    'ais_barangmtang'
		);
		$where = "
			    ais_barangmtang.brgmtang_kode = detail_permintaan.kode_barang AND
    			detail_permintaan.kode_permintaan = '$detail_permintaan'
		";
		$data = $this->masterData->getWhereData($select,$table,$where)->result();
		echo json_encode($data);
	}

	public function printLaporanUnit(){
		$dateRange=$this->input->post('reservation-unit');
		$string = explode('/',$dateRange);

		$first = $string[0];
		$last = $string[1];		

		$select = array(
			'master_permintaan.ukerja_kode',
    		'ais_unitkerjaaset.ukerja_name'
		);
		$table = array(
			'master_permintaan',
    		'ais_unitkerjaaset'
		);
		$where = "
			master_permintaan.ukerja_kode = ais_unitkerjaaset.ukerja_kode
		    GROUP BY ais_unitkerjaaset.ukerja_kode
		    ORDER BY master_permintaan.ukerja_kode ASC
		";
		$data ["PerUnit"] = $this->masterData->getWhereData($select,$table,$where);

		$select = array(
			'master_permintaan.ukerja_kode',
			'master_permintaan.kode_permintaan',
			'detail_permintaan.kode_barang',
		    'ais_barangmtang.brgmtang_name',
		    'detail_permintaan.jumlah_barang',
		    'detail_permintaan.jml_brgsetuju',
		    'date(master_permintaan.tgl_permintaan) as tgl_permintaan',
		    'ais_unitkerjaaset.ukerja_name'
		);
		$table = array(
			'master_permintaan',
		    'detail_permintaan',
		    'ais_barangmtang',
		    'ais_unitkerjaaset'
		);
		$where = "
				master_permintaan.ukerja_kode = ais_unitkerjaaset.ukerja_kode AND
				detail_permintaan.kode_permintaan = master_permintaan.kode_permintaan AND
				detail_permintaan.kode_barang = ais_barangmtang.brgmtang_kode
				GROUP BY master_permintaan.kode_permintaan
			    ORDER BY master_permintaan.kode_permintaan, master_permintaan.ukerja_kode ASC
		";
		$data ["Unit"] = $this->masterData->getWhereData($select,$table,$where);

		$select = array(
			'master_permintaan.kode_permintaan',
			'detail_permintaan.kode_barang',
		    'ais_barangmtang.brgmtang_name',
		    'detail_permintaan.jumlah_barang',
		    'detail_permintaan.jml_brgsetuju',
		    'master_permintaan.tgl_permintaan',
		    'ais_unitkerjaaset.ukerja_name'
		);
		$table = array(
			'master_permintaan',
		    'detail_permintaan',
		    'ais_barangmtang',
		    'ais_unitkerjaaset'
		);
		$where = "
				master_permintaan.ukerja_kode = ais_unitkerjaaset.ukerja_kode AND
				detail_permintaan.kode_permintaan = master_permintaan.kode_permintaan AND
				detail_permintaan.kode_barang = ais_barangmtang.brgmtang_kode
			    ORDER BY master_permintaan.kode_permintaan, master_permintaan.ukerja_kode ASC
		";
		$data ["LaporanBarang"] = $this->masterData->getWhereData($select,$table,$where);

		// Fungsi header dengan mengirimkan raw data excel
		header("Content-type: application/vnd-ms-excel");
		// Mendefinisikan nama file ekspor "hasil-export.xls"
		header("Content-Disposition: attachment; filename= Laporan ".$first." sampai ".$last.".xls");
		$this->load->view('operator/printLaporanUnit', $data);	
	}
// ========================================================= End HALAMAN Laporan =============================================================

// ============================================
// CHANGE PASSWORD
// ============================================
	public function changePassword(){
		$id = $this->input->POST('id');
		$pass = md5($this->input->POST('newPass'));
		// var_dump($pass, $id);

		$data = array('password'=>$pass);
		$where = "id_user='$id'";
		$edit = $this->masterData->editData($where,$data,'users');
		if ($edit) {
			echo "Success";
		}else{
			echo "Gagal";
		}
	}

	public function validPassword(){
		$id = $this->input->POST('id');
		$pass = md5($this->input->POST('pass'));

		$select = 'password';
		$where = "id_user='$id' AND password='$pass'";
		$data = $this->masterData->getWhereData($select,'users',$where);
		$count = $data->num_rows();
		if ($count>0) {
			echo "Valid";
		}else{
			echo "No Valid";
		}
	}

// =========================================================== HALAMAN Logout ================================================================
	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('login');
	}
// ========================================================= End HALAMAN Logout ==============================================================
}
