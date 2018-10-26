<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('MasterData');
		$this->load->library('session');
		if ($this->session->userdata('level')!= "Admin") {
			redirect('login');
		}
		date_default_timezone_set('Asia/Jakarta');
    }

	public function index(){
		$data['id_nav'] = 1;
		$this->load->view('admin/header');
		$this->load->view('admin/navigation', $data);
		$this->load->view('admin/dashboard');
		$this->load->view('admin/footer');
	}

	public function showUnit(){
		$select = array(
			'ais_unitkerjaaset.ukerja_id',
			'ais_unitkerjaaset.ukerja_kode',
			'ais_unitkerjaaset.ukerja_name',
			'ais_unitkerjaaset.ukerja_note',
			'users.id_user',
			'users.username',
			'users.password',
			'users.level'
		);
		$table = array(
			'users',
			'ais_unitkerjaaset'
		);
		$where = "
			users.ukerja_id = ais_unitkerjaaset.ukerja_kode
		";
		$data = $this->MasterData->getWhereData($select,$table,$where)->result();
		echo json_encode($data);
	}

	public function viewUnit(){
		$ukerja_kode = $this->input->get('id');

		$select = array(
			'ais_unitkerjaaset.ukerja_kode',
			'ais_unitkerjaaset.ukerja_name',
			'ais_unitkerjaaset.ukerja_note',
			'ais_unitkerjaaset.uskerja_staff_fk',
			'users.username',
			'users.password',
			'users.level'
		);
		$table = array(
			'users',
			'ais_unitkerjaaset'
		);
		$where = "
			users.ukerja_id = ais_unitkerjaaset.ukerja_kode AND
			ais_unitkerjaaset.ukerja_kode = '$ukerja_kode'
		";
		$data = $this->MasterData->getWhereData($select,$table,$where)->result();
		echo json_encode($data);
	}

	public function getdataUnit(){
		$id = $this->input->GET('id');
		$select = array(
			'ais_unitkerjaaset.ukerja_kode',
			'ais_unitkerjaaset.ukerja_name',
			'ais_unitkerjaaset.ukerja_note',
			'ais_unitkerjaaset.uskerja_staff_fk',
			'users.username',
			'users.password',
			'users.level'
		);
		$table = array(
			'users',
			'ais_unitkerjaaset'
		);
		$where = "
			users.ukerja_id = ais_unitkerjaaset.ukerja_kode AND
			ais_unitkerjaaset.ukerja_kode = '$id'
		";
		$data = $this->MasterData->getWhereData($select,$table,$where)->result();
		echo json_encode($data);
	}

	public function getUnitSelected(){
		$select = array(
			'ukerja_kode',
			'ukerja_name'
		);
		$data = $this->MasterData->getSelectData($select,'ais_unitkerjaaset')->result();
		echo json_encode($data);
	}

	public function codeUnit(){
		$unitCode = $this->input->post('unitCode');
		$select = array(
			'ukerja_id',
		);
		$table = array(
			'users'
		);
		$where = "ukerja_id = '$unitCode' ";
		$kodeUnit = $this->MasterData->getWhereData($select,$table,$where);
		$count = $kodeUnit->num_rows();
		// var_dump($count);
		if ($count > 0) {
			echo "Valid";
		} else {
			echo "No Valid";
		}
	}

	public function saveUnit(){
		$kode_unit = $this->input->post('kode_unit');
		$nama_unit = $this->input->post('nama_unit');
		$jumlah_staff = $this->input->post('jumlah_staff');
		$note = $this->input->post('note');
		$username = $this->input->post('username');
		$level = $this->input->post('level');
		$password = $this->input->post('password');

		// $tes = var_dump($kode_unit, $nama_unit, $jumlah_staff, $note, $username, $level, $password);
		// echo $tes;

		$dataais = array(
			'ukerja_kode' => $kode_unit, 
			'ukerja_name' => $nama_unit, 
			'uskerja_staff_fk' => $jumlah_staff, 
			'ukerja_note' => $note
		);
		$unitkerja = $this->MasterData->inputData($dataais,'ais_unitkerjaaset');

		$datauser = array(
			'ukerja_id' => $kode_unit,
			'username' => $username, 
			'password' => md5($password),
			'level' => $level
		);
		$users = $this->MasterData->inputData($datauser,'users');

		if ($unitkerja && $users) {
			echo "Success";
		} else {
			echo "Success";
		}
	}

	public function updateUnit(){
		$kode_unit_edit = $this->input->post('kode_unit_edit');
		$nama_unit_edit = $this->input->post('nama_unit_edit');
		$jumlah_staff_edit = $this->input->post('jumlah_staff_edit');
		$note_edit = $this->input->post('note_edit');
		$username_edit = $this->input->post('username_edit');
		$level_edit = $this->input->post('level_edit');
		// $password_edit = $this->input->post('password_edit');

		$dataais = array(
			'ukerja_name' => $nama_unit_edit, 
			'uskerja_staff_fk' => $jumlah_staff_edit, 
			'ukerja_note' => $note_edit
		);
		$where = "
			ukerja_kode = '$kode_unit_edit'
		";
		$unitkerja = $this->MasterData->editData($where,$dataais,'ais_unitkerjaaset');

		$datauser = array(
			'username' => $username_edit, 
			'level' => $level_edit
		);
		$where = "
			ukerja_id = '$kode_unit_edit'
		";
		$users = $this->MasterData->editData($where,$datauser,'users');

		if ($unitkerja && $users) {
			echo "Success";
		} else {
			echo "Gagal";
		}
	}

	// Hapus Data Unit
	public function deleteUnit(){
		$id = $this->input->get('id');

		// Ambil ukerja_kode dari Table Users
		$select = array(
			'ukerja_id',
			'username'
		);
		$where = "id_user = '$id'";
		$kode = $this->MasterData->getWhereData($select,'users',$where);
		$codeUnit = $kode->row_array();
		$kodeunit = $codeUnit['ukerja_id']; 

		// Delete record dari Tabel ais_unitkerjaaset
		$whereais = "ukerja_kode = '$kodeunit'";
		$unitkerja = $this->MasterData->deleteData($whereais,'ais_unitkerjaaset');

		// Delete record dari Tabel users
		$whereuser = "id_user = '$id'";
		$users = $this->MasterData->deleteData($whereuser,'users');

		if ($unitkerja && $users) {
			echo "Success";
		}else{
			echo "Gagal";
		}
	}
}