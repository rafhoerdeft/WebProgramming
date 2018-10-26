<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Admin extends CI_Controller {
	
	function __construct(){
		parent:: __construct();
		$this->load->model('masterData');
		//hanya bisa masuk ke halaman admin apabila sudah login
		if($this->session->userdata('status') != "loginAdm"){
			redirect(base_url("login"));
		}
	}

	public function index(){	
		$select = 'nama_user';
		$id = $this->session->userdata('id_log');
		$where = array(
			'id_log' => $id
		);
		$data['user'] = $this->masterData->getWhereData($select,'user',$where);
		$data['id_nav'] = 1;	
		$this->load->view('admin/head');
		$this->load->view('admin/top-menu',$data);
		$this->load->view('admin/navigation',$data);
		$this->load->view('admin/dashboard');
		$this->load->view('admin/foot');
	}

	public function cetakAnggotaAll(){
		$this->load->library('pdf');
		$data['Anggota'] = $this->masterData->getData('anggota_perpus_porto')->result();
        $this->load->view('admin/perpus/cetakAnggotaAll',$data);
    }

	public function cetakAnggota(){
		$this->load->library('pdf');

		$fk_kode = $this->input->POST('fakultas');

		if ($fk_kode=='') {
			$select = array(
				'SUM(jml_aktif) aktif', 
				'SUM(jml_pasif) pasif', 
				'(SELECT fk.fk_name FROM ais_fakultas fk WHERE fk.fk_kode=CONCAT(".",ag.kd_fakultas) GROUP BY fk.fk_kode) nama'
			);
			$table = 'anggota_perpus_mhs_porto as ag'; 
			$where = 'CONCAT(".",ag.kd_fakultas) IN (SELECT fk_kode FROM ais_fakultas)';
			$group = 'kd_fakultas';
			$data['Anggota'] = $this->masterData->getDataGroup($select,$table,$where,$group)->result();
			$data['prodi'] = 'false';
		}else{
			$where = array(
				'fk_kode'=>'.'.$fk_kode
			);
			$data['Fak'] = $this->masterData->getWhereData('fk_name','ais_fakultas',$where);

			$select = array(
			'jml_aktif as aktif', 
			'jml_pasif as pasif', 
			'nama_prodi as nama'
			);
			$table = 'anggota_perpus_mhs_porto'; 
			$where = array(
				'kd_fakultas' => $fk_kode
			);
			$data['Anggota'] = $this->masterData->getWhereData($select,$table,$where)->result();
			$data['prodi'] = 'true';
		}
        $this->load->view('admin/perpus/cetakAnggota',$data);
    }

    public function cetakBuku(){
		$this->load->library('pdf');
		$data['Buku'] = $this->masterData->getData('buku_perpus_porto')->result();
        $this->load->view('admin/perpus/cetakBuku',$data);
    }

	public function getDataAnggotaAll(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://103.215.25.50:88/api_perpus_ummgl/anggotaPerJenis",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  //CURLOPT_POSTFIELDS => "id=93",
		  CURLOPT_HTTPHEADER => array(
		    "cache-control: no-cache",
		    "content-type: application/x-www-form-urlencoded",
		    "key: 2a59c326d271d97d876e0c377bfa812b",
		    //"postman-token: f2074302-8870-0667-cf7c-c39687d94204"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  $this->session->set_flashdata('hasil','<strong>Sinkron Failed!!</strong>, cURL Error #:'. $err);
		  $this->session->set_flashdata('alert','alert-danger');
		} else {
			if ($response == 'Illegal Access') {
				$this->session->set_flashdata('hasil','Sinkron Failed, <b>Illegal Access!!</b>');
				$this->session->set_flashdata('alert','alert-warning');
				//redirect('staff/viewFakultas');
			}else{
				$this->session->set_flashdata('hasil','<strong>Sinkron Success</strong>');
				$this->session->set_flashdata('alert','alert-success');
				$dataAgt = json_decode($response);
				$no=1;
				foreach ($dataAgt as $key) {	
					  	$data = array(
					  		'id_anggota' => $no++,
							'jenis_anggota' => $key->jenis_anggota,
							'jumlah' => $key->jml
						);
						$this->masterData->replaceData($data,'anggota_perpus_porto');
				}
			}
		}
		$data_anggota = $this->masterData->getData('anggota_perpus_porto')->result();
		echo json_encode($data_anggota);
	}

	public function getDataAnggotaMhs(){

		$kode = $this->input->POST('kd_fak');

		if ($kode=='') {
			$select = array(
				'SUM(jml_aktif) aktif', 
				'SUM(jml_pasif) pasif', 
				'(SELECT fk.fk_name FROM ais_fakultas fk WHERE fk.fk_kode=CONCAT(".",ag.kd_fakultas) GROUP BY fk.fk_kode) fakultas'
			);
			$table = 'anggota_perpus_mhs_porto as ag'; 
			$where = 'CONCAT(".",ag.kd_fakultas) IN (SELECT fk_kode FROM ais_fakultas)';
			$group = 'kd_fakultas';
			$data_anggota = $this->masterData->getDataGroup($select,$table,$where,$group)->result();
			echo json_encode($data_anggota);
		}else{
			$select = array(
			'jml_aktif as aktif', 
			'jml_pasif as pasif', 
			'nama_prodi as prodi'
			);
			$table = 'anggota_perpus_mhs_porto'; 
			$where = array(
				'kd_fakultas' => $kode
			);
			$data_anggota = $this->masterData->getWhereData($select,$table,$where)->result();
			echo json_encode($data_anggota);
		}	
	}

	public function perpusAnggotaAll(){
		$select2 = 'nama_user';
		$id = $this->session->userdata('id_log');
		$where = array(
			'id_log' => $id
		);
		$data['user'] = $this->masterData->getWhereData($select2,'user',$where);
		$data['id_nav'] = 2;	
		$data['tampil'] = 'anggotaAll';
		$this->load->view('admin/head');
		$this->load->view('admin/top-menu',$data);
		$this->load->view('admin/navigation',$data);
		$this->load->view('admin/perpus/dataAnggotaAll',$data);
		$this->load->view('admin/perpus/foot',$data);
	}	

	public function perpusAnggotaMhs(){

		// Mahasiswa Aktif
		// function mhsAktif(){
			$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "http://103.215.25.50:88/api_perpus_ummgl/anggotaPerProdiAktif",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "GET",
				  //CURLOPT_POSTFIELDS => "id=93",
				  CURLOPT_HTTPHEADER => array(
				    "cache-control: no-cache",
				    "content-type: application/x-www-form-urlencoded",
				    "key: 2a59c326d271d97d876e0c377bfa812b",
				    //"postman-token: f2074302-8870-0667-cf7c-c39687d94204"
				  ),
				));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				  $this->session->set_flashdata('hasil','<strong>Sinkron Failed!!</strong>, cURL Error #:'. $err);
				  $this->session->set_flashdata('alert','alert-danger');
			} else {
				if ($response == 'Illegal Access') {
					$this->session->set_flashdata('hasil','Sinkron Failed, <b>Illegal Access!!</b>');
					$this->session->set_flashdata('alert','alert-warning');
				}else{
					$this->session->set_flashdata('hasil','<strong>Sinkron Success</strong>');
					$this->session->set_flashdata('alert','alert-success');
					$dataAgt = json_decode($response);
					$no=1;
					foreach ($dataAgt as $key) {	
						  	$data = array(
						  		'id_agt_mhs' => $no++,
								'nama_prodi' => $key->nama,
								'kd_fakultas' => $key->kd_fakultas,
								'jml_aktif' => $key->jml
							);
						$this->masterData->replaceData($data,'anggota_perpus_mhs_porto');
					}
				}
			}
		// }

		// Mahasiswa Pasif
		// function mhsPasif(){
			$curl2 = curl_init();
				curl_setopt_array($curl2, array(
				  CURLOPT_URL => "http://103.215.25.50:88/api_perpus_ummgl/anggotaPerProdiPasif",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "GET",
				  //CURLOPT_POSTFIELDS => "id=93",
				  CURLOPT_HTTPHEADER => array(
				    "cache-control: no-cache",
				    "content-type: application/x-www-form-urlencoded",
				    "key: 2a59c326d271d97d876e0c377bfa812b",
				    //"postman-token: f2074302-8870-0667-cf7c-c39687d94204"
				  ),
				));

			$response = curl_exec($curl2);
			$err = curl_error($curl2);

			curl_close($curl2);

			if ($err) {
				  $this->session->set_flashdata('hasil','<strong>Sinkron Failed!!</strong>, cURL Error #:'. $err);
				  $this->session->set_flashdata('alert','alert-danger');
			} else {
				if ($response == 'Illegal Access') {
					$this->session->set_flashdata('hasil','Sinkron Failed, <b>Illegal Access!!</b>');
					$this->session->set_flashdata('alert','alert-warning');
				}else{
					$this->session->set_flashdata('hasil','<strong>Sinkron Success</strong>');
					$this->session->set_flashdata('alert','alert-success');
					$dataAgt = json_decode($response);
					$no=1;
					foreach ($dataAgt as $key) {	
						  	$data = array(
								'jml_pasif' => $key->jml
							);
							// $where = "nama_prodi='".$key->nama."' AND kd_fakultas='".$key->kd_fakultas."'";
							$where = array(
								'nama_prodi'=>$key->nama,
								'kd_fakultas'=>$key->kd_fakultas
							);
						$this->masterData->editData($where,$data,'anggota_perpus_mhs_porto');
					}
				}
			}
		// }

		$select = array(
			'fk_kode',
			'fk_name'
		);
		$data['fakultas'] = $this->masterData->getSelectData($select,'ais_fakultas');
		$select2 = 'nama_user';
		$id = $this->session->userdata('id_log');
		$where = array(
			'id_log' => $id
		);
		$data['user'] = $this->masterData->getWhereData($select2,'user',$where);
		$data['id_nav'] = 2;	
		$data['tampil'] = 'anggotaMhs';
		$this->load->view('admin/head');
		$this->load->view('admin/top-menu',$data);
		$this->load->view('admin/navigation',$data);
		$this->load->view('admin/perpus/dataAnggotaMhs',$data);
		$this->load->view('admin/perpus/foot',$data);
	}

	public function getDataBuku(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://103.215.25.50:88/api_perpus_ummgl/Buku",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  //CURLOPT_POSTFIELDS => "id=93",
		  CURLOPT_HTTPHEADER => array(
		    "cache-control: no-cache",
		    "content-type: application/x-www-form-urlencoded",
		    "key: 2a59c326d271d97d876e0c377bfa812b",
		    //"postman-token: f2074302-8870-0667-cf7c-c39687d94204"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			  $this->session->set_flashdata('hasil','<strong>Sinkron Failed!!</strong>, cURL Error #:'. $err);
			  $this->session->set_flashdata('alert','alert-danger');
		} else {
			if ($response == 'Illegal Access') {
				$this->session->set_flashdata('hasil','Sinkron Failed, <b>Illegal Access!!</b>');
				$this->session->set_flashdata('alert','alert-warning');
				//redirect('staff/viewFakultas');
			}else{
				$this->session->set_flashdata('hasil','<strong>Sinkron Success</strong>');
				$this->session->set_flashdata('alert','alert-success');
				$dataAgt = json_decode($response);
				$no=1;
				foreach ($dataAgt as $key) {	
					  	$data = array(
					  		'id_buku' => $no++,
							'jenis_buku' => $key->jenis_buku,
							'jml_buku' => $key->jml
						);
						$this->masterData->replaceData($data,'buku_perpus_porto');
				}
			}
		}
		$data_buku = $this->masterData->getData('buku_perpus_porto')->result();
		echo json_encode($data_buku);
	}

	public function perpusBuku(){
		$select = 'nama_user';
		$id = $this->session->userdata('id_log');
		$where = array(
			'id_log' => $id
		);
		$data['user'] = $this->masterData->getWhereData($select,'user',$where);
		$data['id_nav'] = 2;	
		$data['tampil'] = 'buku';
		$this->load->view('admin/head');
		$this->load->view('admin/top-menu',$data);
		$this->load->view('admin/navigation',$data);
		$this->load->view('admin/perpus/dataBuku',$data);
		$this->load->view('admin/perpus/foot',$data);
	}
 
}