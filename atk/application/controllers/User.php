<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('MasterData');
		$this->load->library('session');
		$this->load->helper('cookie');
		date_default_timezone_set('Asia/Jakarta');

		$id_usr = $this->session->userdata('id_user');
		
		$where_usr = array(
			'id_user'=>$id_usr
		);
		$user_log = $this->MasterData->getWhereDataAll('log_user',$where_usr);
		$log = $user_log->row_array();
		$waktu_exp = $log['waktu_exp'];
		$token_usr = $log['token'];
		$time_now = date("Y-m-d H:i:s");
		$token_user = $this->input->cookie('token_user');

		if ($this->session->userdata('level')!="User" OR $time_now > $waktu_exp OR $token_user!=$token_usr) {				redirect('login');
		}
    }

	public function index(){
		$ukerja_kode = $this->session->userdata('ukerja_id');

		// Submitted
		###################################################################################################
		$select = array(
			'ais_barangmtang.brgmtang_kode',
			'ais_barangmtang.brgmtang_name',
			'SUM(detail_permintaan.jumlah_barang) AS jumlah_barang'
		);
		$table = array(
			'detail_permintaan',
			'master_permintaan',
			'ais_barangmtang'
		);
		$where = "
			detail_permintaan.kode_permintaan = master_permintaan.kode_permintaan AND
		    detail_permintaan.kode_barang = ais_barangmtang.brgmtang_kode AND
		    master_permintaan.ukerja_kode = '$ukerja_kode' AND
		    date_format(date(master_permintaan.tgl_permintaan), '%m') = date_format(curdate(), '%m') AND
		    detail_permintaan.status_barang = 'Diajukan'
		    GROUP BY ais_barangmtang.brgmtang_kode
		";
		$data ["ListSubmitted"] =$this->MasterData->getWhereData($select,$table,$where);
		$data ['Submitted'] = $this->MasterData->getWhereData($select,$table,$where)->num_rows();
		###################################################################################################

		// Rejected
		###################################################################################################
		$select = array(
			'ais_barangmtang.brgmtang_kode',
			'ais_barangmtang.brgmtang_name',
			'SUM(detail_permintaan.jumlah_barang) AS jumlah_barang'
		);
		$table = array(
			'detail_permintaan',
			'master_permintaan',
			'ais_barangmtang'
		);
		$where = "
			detail_permintaan.kode_permintaan = master_permintaan.kode_permintaan AND
		    detail_permintaan.kode_barang = ais_barangmtang.brgmtang_kode AND
		    master_permintaan.ukerja_kode = '$ukerja_kode' AND
		    date_format(date(master_permintaan.tgl_permintaan), '%m') = date_format(curdate(), '%m') AND
		    detail_permintaan.status_barang = 'Ditolak'
		    GROUP BY ais_barangmtang.brgmtang_kode
		";
		$data ["ListRejected"] =$this->MasterData->getWhereData($select,$table,$where);
		$data ['Rejected'] = $this->MasterData->getWhereData($select,$table,$where)->num_rows();
		###################################################################################################

		// Processed
		###################################################################################################
		$select = array(
			'ais_barangmtang.brgmtang_kode',
			'ais_barangmtang.brgmtang_name',
			'SUM(detail_permintaan.jumlah_barang) AS jumlah_barang'
		);
		$table = array(
			'detail_permintaan',
			'master_permintaan',
			'ais_barangmtang'
		);
		$where = "
			detail_permintaan.kode_permintaan = master_permintaan.kode_permintaan AND
		    detail_permintaan.kode_barang = ais_barangmtang.brgmtang_kode AND
		    master_permintaan.ukerja_kode = '$ukerja_kode' AND
		    date_format(date(master_permintaan.tgl_permintaan), '%m') = date_format(curdate(), '%m') AND
		    detail_permintaan.status_barang = 'Diproses'
		    GROUP BY ais_barangmtang.brgmtang_kode
		";
		$data ["ListProcessed"] =$this->MasterData->getWhereData($select,$table,$where);
		$data ['Processed'] = $this->MasterData->getWhereData($select,$table,$where)->num_rows();
		###################################################################################################

		// Sent
		###################################################################################################
		$select = array(
			'detail_permintaan.kode_permintaan',
			'ais_barangmtang.brgmtang_kode',
			'ais_barangmtang.brgmtang_name',
			'SUM(detail_permintaan.jumlah_barang) AS jumlah_barang'
		);
		$table = array(
			'detail_permintaan',
			'master_permintaan',
			'ais_barangmtang'
		);
		$where = "
			detail_permintaan.kode_permintaan = master_permintaan.kode_permintaan AND
		    detail_permintaan.kode_barang = ais_barangmtang.brgmtang_kode AND
		    master_permintaan.ukerja_kode = '$ukerja_kode' AND
		    date_format(date(master_permintaan.tgl_permintaan), '%m') = date_format(curdate(), '%m') AND
		    detail_permintaan.status_barang = 'Dikirim'
		    GROUP BY ais_barangmtang.brgmtang_kode
		";
		$data ["ListSent"] =$this->MasterData->getWhereData($select,$table,$where);
		$data ['Sent'] = $this->MasterData->getWhereData($select,$table,$where)->num_rows();
		###################################################################################################

		$data['id_nav'] = 1;
		$this->load->view('user/header');
		$this->load->view('user/navigation', $data);
		$this->load->view('user/dashboard', $data);
		$this->load->view('user/footer');
	}

// Status Log
	public function updateStatusLog(){
		$id_usr = $this->session->userdata('id_user');
		$token_usr = $this->input->cookie('token_user');
		$time_exp = date("Y-m-d H:i:s", strtotime('+5 minute 10 second'));

		$data_log = array(
			'waktu_exp' => $time_exp
		);	
		$where_log = array(
			'id_user' => $id_usr,
			'token' => $token_usr
		);
		$update_log = $this->MasterData->editData($where_log,$data_log,'log_user');
		if ($update_log) {
			echo "Success";
		}else{
			echo "Gagal";
		}
	}

	public function Diterima(){
		$kode_permintaan = $this->input->post('kode_permintaan');
		$kode_barang = $this->input->post('kode_barang');
		$i = 0;
		foreach ($kode_permintaan as $key) {
			$data = array('status_barang' => 'Diterima');
			$where = array(
				'kode_permintaan' => $key,
				'kode_barang' => $kode_barang[$i]
			);
			$table = "detail_permintaan";
			$this->MasterData->editData($where ,$data, $table);

			$dateNow = date('Y-m-d H:i:s');
			$data1 = array('tgl_perubahan_notif' => $dateNow);
			$where1 = array(
				'kode_permintaan' => $key,
			);
			$table1 = "master_permintaan";
			$this->MasterData->editData($where1 ,$data1, $table1);
			$i++;
		}
		redirect('User/index');
	}

	public function permintaan(){
		$data['id_nav'] = 2;
		$data['Permintaan'] = 'true';
		$this->load->view('user/header');
		$this->load->view('user/navigation', $data);
		$this->load->view('user/permintaan');
		$this->load->view('user/footer', $data);
	}

	public function dataBarang(){
		$select = array(
			'brg.brgmtang_id',
			'brg.brgmtang_kode',
			'brg.brgmtang_name',
			'sat.stabrg_name satuan'
		);
		$table = array('ais_barangmtang brg','ais_satuanbrg sat');
		$where = 'sat.satbrg_id=brg.brgmtang_satuanbrg_fk';
		$by = 'brg.brgmtang_id';
		$order = 'ASC';
		$data=$this->MasterData->getWhereDataOrder($select,$table,$where,$by,$order)->result();
		echo json_encode($data);
	}

	public function simpanPermintaan(){
		// Kode Otomati
		$tgl = date('dmy'); // Ambil data dari system
		$kode_unit = $this->session->userdata('ukerja_id');
		$select = array('kode_permintaan as nota'); // Select kode permintaan terakhir
		$by = "id_permintaan";
		$order = "DESC";
		$limit = "1";
		$detail = $this->MasterData->getSelectDataOrder($select, 'detail_permintaan', $by, $order, $limit);
		$nota = $detail->row_array();

		if ($detail->num_rows() > 0) { // Check data
			$cektgl = substr($nota['nota'], 0, 6); // Mengambil string beberapa digit hasilnya tgl
			// $cekunit = substr($nota['nota'], 6, 4); // Mengambil string beberapa digit hasilnya kode unit
			if ($cektgl == $tgl) { // Membandingkan hasil cek dengan tgl sistem
				$kode = substr($nota['nota'], 10); // Mengambil string beberapa digit
				$code = (int) $kode; // Mengubah String jadi Integer
				$code++;
				$kodeOtomatis = $tgl.$kode_unit.str_pad($code, 2, "0", STR_PAD_LEFT); // Kerangka Kode Otomatis = tgl + 3 digit
			} else {
				$kodeOtomatis = $tgl.$kode_unit.'01';
			}
		} else {
			$kodeOtomatis = $tgl.$kode_unit.'01';
		}
		// End Kode Otomati

		// Input data Array
		$kode_barang = $this->input->post('code');
		$qty = $this->input->post('qty');
		$status_barang = 'Diajukan';

		$i	= 0;
		foreach($kode_barang as $k){
			if( ! empty($k)){
				$data = array(
					'kode_permintaan' => $kodeOtomatis,
					'kode_barang' => $k,
					'jumlah_barang' => $qty[$i],
					'status_barang' => $status_barang
					);
				$permintaan = $this->MasterData->inputData($data,'detail_permintaan');
			}
			$i++;
		}
		// End Input data Array

		// Input Data master
		$tgl_permintaan = date('Y-m-d H:i:s');
		$data = array(
			'kode_permintaan' => $kodeOtomatis, 
			'tgl_permintaan' => $tgl_permintaan, 
			'tgl_perubahan_notif' => $tgl_permintaan, 
			'ukerja_kode' => $kode_unit
		);
		$master = $this->MasterData->inputData($data,'master_permintaan');

		if ($master) {
			echo "Success";
		} else {
			echo "Gagal";
		}
		// End Input Data master
	}

	public function laporan(){
		$data['id_nav'] = 3;
		$data['Laporan'] = 'true';
		$this->load->view('user/header');
		$this->load->view('user/navigation', $data);
		$this->load->view('user/laporan');
		$this->load->view('user/footer',$data);
	}

	public function showLaporan(){
		$ukerja_kode = $this->session->userdata('ukerja_id');
		$select1 = array('COUNT(status_barang) jml', 'status_barang', 'kode_permintaan');
		$group1 = array('status_barang','kode_permintaan');
		$by1 = 'kode_permintaan';
		$order1 = 'ASC';
		$status = $this->MasterData->getDataGroupOrder($select1,'detail_permintaan',$group1,$by1,$order1)->result();

		$select = array(
			'id_permintaan id_pmt',
			'kode_permintaan kode',
			'date(tgl_permintaan) tgl',
			'time(tgl_permintaan) waktu'
		);
		$where = array(
			'ukerja_kode' => $ukerja_kode
		);
		$by = 'tgl_perubahan_notif';
		$order = 'DESC';
		// $data_pmt = $this->MasterData->getWhereData($select,'master_permintaan',$where)->result();
		$data_pmt = $this->MasterData->getWhereDataOrder($select,'master_permintaan',$where,$by,$order)->result();

		$data = array();

		foreach ($data_pmt as $key) {
			$pmt = array(
				'id_pmt'=>$key->id_pmt,
				'kode'=>$key->kode,
				'tgl'=>$key->tgl,
				'waktu'=>$key->waktu,
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

	public function getLaporan(){
		$dateRange=$this->input->get('id');
		$string = explode('/',$dateRange);

		$first = $string[0];
		$last = $string[1];		

		// $kode_unit = $this->session->userdata('ukerja_id');
		// $select = array(
		// 	'id_permintaan',
		// 	'kode_permintaan',
		// 	'date(tgl_permintaan) AS tgl_permintaan',
		// 	'time(tgl_permintaan) AS time_tgl_permintaan',
		// 	'ukerja_kode'
		// );
		// $where = "
		// 	ukerja_kode = '$kode_unit' AND
		// 	date(master_permintaan.tgl_permintaan) BETWEEN '$first' AND '$last'
		// 	ORDER BY kode_permintaan DESC
		// ";
		// $data = $this->MasterData->getWhereData($select,'master_permintaan',$where)->result();
		// echo json_encode($data);

		$ukerja_kode = $this->session->userdata('ukerja_id');
		$select1 = array('COUNT(status_barang) jml', 'status_barang', 'kode_permintaan');
		$group1 = array('status_barang','kode_permintaan');
		$by1 = 'kode_permintaan';
		$order1 = 'ASC';
		$status = $this->MasterData->getDataGroupOrder($select1,'detail_permintaan',$group1,$by1,$order1)->result();

		$select = array(
			'id_permintaan id_pmt',
			'kode_permintaan kode',
			'date(tgl_permintaan) tgl',
			'time(tgl_permintaan) waktu'
		);
		$where = "
			ukerja_kode = '$ukerja_kode' AND
			date(master_permintaan.tgl_permintaan) BETWEEN '$first' AND '$last'
			ORDER BY tgl_perubahan_notif DESC
		";
		$data_pmt = $this->MasterData->getWhereData($select,'master_permintaan',$where)->result();

		$data = array();

		foreach ($data_pmt as $key) {
			$pmt = array(
				'id_pmt'=>$key->id_pmt,
				'kode'=>$key->kode,
				'tgl'=>$key->tgl,
				'waktu'=>$key->waktu,
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

	public function getBarang(){
        $id=$this->input->get('id');
        $select = array(
			'brg.brgmtang_kode',
			'brg.brgmtang_name',
			'sat.stabrg_name satuan',
			'dp.jumlah_barang',
			'dp.jml_brgsetuju'
		);
		$where = "brg.brgmtang_satuanbrg_fk=sat.satbrg_id AND dp.kode_barang = brg.brgmtang_kode AND dp.kode_permintaan = mp.kode_permintaan AND mp.id_permintaan='$id'";
		$table = array(
			'ais_barangmtang brg',
			'ais_satuanbrg sat',
			'detail_permintaan dp',
			'master_permintaan mp'
		);
        $data=$this->MasterData->getWhereData($select, $table, $where)->result();
        echo json_encode($data);
    }

    public function notification(){
    	$kode = $this->session->userdata('ukerja_id');
    	// $kode = '0003';
  		$select = array('id_permintaan id_pmt', 'kode_permintaan kode_pmt', 'status_notif_user status', 'date(tgl_perubahan_notif) tgl_notif', 'time(tgl_perubahan_notif) time_notif');
  		$where = "ukerja_kode='$kode'";
  		$limit = 10;
		$by = 'tgl_perubahan_notif';
		$order = 'DESC';
  		$kp = $this->MasterData->getWhereDataLimitOrder($select,'master_permintaan',$where,$limit,$by,$order)->result();

		$select1 = array('COUNT(status_barang) jml', 'status_barang', 'kode_permintaan');
		$group1 = array('status_barang','kode_permintaan');
		$by1 = 'kode_permintaan';
		$order1 = 'ASC';
		$status = $this->MasterData->getDataGroupOrder($select1,'detail_permintaan',$group1,$by1,$order1)->result();

		$data = array();

		foreach ($kp as $key) {
			$pmt = array(
						'id_pmt'=>$key->id_pmt,
						'kode_pmt'=>$key->kode_pmt,
						'tgl_notif'=>$key->tgl_notif,
						'time_notif'=>$key->time_notif,
						'status_notif'=>$key->status,
						'status'=>array(),
						'jml'=>array()						
					);
			foreach ($status as $val) {
				if ($key->kode_pmt==$val->kode_permintaan) {
					array_push($pmt['status'], $val->status_barang);
					array_push($pmt['jml'], $val->jml);
				}
			}
			array_push($data, $pmt);
		}
		echo json_encode($data);
    }

    public function changeStatusNotif(){
    	$id = $this->input->POST('id');
    	$data = array('status_notif_user'=>'2');
    	$where = 'id_permintaan='.$id;
    	$update = $this->MasterData->editData($where,$data,'master_permintaan');
    	if ($update) {
    		echo "Success";
    	}else{
    		echo "Gagal";
    	}
    }

    public function countNotif(){
    	$kode = $this->session->userdata('ukerja_id');
		$select = array (
			'COUNT(*) jml_notif'
		);
		$table = array('master_permintaan mp');
		$where = "mp.status_notif_user=0 AND mp.ukerja_kode='$kode' AND mp.kode_permintaan NOT IN (select kode_permintaan from detail_permintaan where status_barang='Diajukan' GROUP BY kode_permintaan)";
		$data = $this->MasterData->getWhereData($select,$table,$where)->result();
		echo json_encode($data);
	}

	public function clearCount(){
		$kode = $this->session->userdata('ukerja_id');
		$data = array(
			'status_notif_user' => 1
		);
		$where = "status_notif_user=0 AND ukerja_kode='$kode'";
		$table = 'master_permintaan';
		$update = $this->MasterData->editData($where,$data,$table);
		if ($update) {
			echo "Success";
		}else{
			echo "Gagal";
		}
	}

	public function changePassword(){
		$id = $this->input->POST('id');
		$pass = md5($this->input->POST('newPass'));
		// var_dump($pass, $id);

		$data = array('password'=>$pass);
		$where = "id_user='$id'";
		$edit = $this->MasterData->editData($where,$data,'users');
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
		$data = $this->MasterData->getWhereData($select,'users',$where);
		$count = $data->num_rows();
		if ($count>0) {
			echo "Valid";
		}else{
			echo "No Valid";
		}
	}

	public function logout(){
		$id_usr = $this->session->userdata('id_user');
		$data_log = array(
			'waktu_exp' => '',
			'token' => ''
		);	
		$where_log = array(
			'id_user' => $id_usr
		);
		$update_log = $this->MasterData->editData($where_log,$data_log,'log_user');
		if ($update_log) {
			// Hapus semua data pada session
			$this->session->sess_destroy();
			// redirect ke halaman login	
			redirect('Login/index');
		}
	}
}