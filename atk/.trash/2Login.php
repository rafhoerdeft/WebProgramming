<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('MasterData');
		$this->load->library('session');
    }

	public function index(){
		$this->session->sess_destroy();
		$this->load->view('login');
	}

	public function cek_login() {
		$where = array(
					'username' => $this->input->post('username', TRUE),
					'password' => md5($this->input->post('password', TRUE))
				);
		// $this->load->model('model_users'); // load model_user
		$hasil = $this->MasterData->getWhereDataAll('users',$where);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$where1 = array(
					'ukerja_kode'=>$sess->ukerja_id
				);
				$data_unit = $this->MasterData->getWhereData('ukerja_name','ais_unitkerjaaset',$where1);
				$unit = $data_unit->row_array();
				$nama_unit = $unit['ukerja_name'];

				$sess_data['id_user'] = $sess->id_user;
				$sess_data['ukerja_id'] = $sess->ukerja_id;
				$sess_data['nama_unit'] = $nama_unit;
				$sess_data['username'] = $sess->username;
				$sess_data['password'] = $sess->password;
				$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('level')=='Admin') {
				// redirect('admin');
				echo "Admin";
			}
			elseif ($this->session->userdata('level')=='Operator') {
				// redirect('Operator');
				echo "Operator";
			}
			elseif ($this->session->userdata('level')=='User') {
				// redirect('User');
				echo "User";
			}
			// echo "Success";
		}
		else {
			echo "Gagal";
			// echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
			// echo "
			// 	<script>
		 //            history.go(-1);
		 //            swal({
		 //                title: 'Gagal!',
		 //                text: 'Gagal login: Cek username, password!',
		 //                type: 'error',
		 //                timer: 1000,
		 //                showConfirmButton: false
		 //            });
			// 	</script>
			// ";
		}
	}

	public function logout(){
		// Hapus semua data pada session
		$this->session->sess_destroy();

		// redirect ke halaman login	
		redirect('Login/index');
	}

}