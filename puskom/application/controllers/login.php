<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller {
	
	function __construct(){
		parent:: __construct();
			$this->load->model('masterData');
        }
		
	public function index($cek=''){
		if(empty($cek)){
			$data['login']='true';
			$this->load->view('login',$data);
		}else{
			$data['login']='false';
			$this->load->view('login',$data);
		}
	}
	
	public function auth(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$where = array(
		   'stf_nik' => $username,
		   'stf_password' => $password
		   );
		  $login = $this->masterData->cekLogin("staff",$where);
		  $cek = $login->num_rows();
		
		 if($cek > 0){
		  		$data=$login->row_array();
		  		$stf_id = $data['stf_id'];
		  		$sst_id = $data['sst_id'];

		  		if($sst_id == 1 || $sst_id == 2){
		  			$data_session = array(
				    'id_user' => $stf_id,
				    'nama' => $data['stf_nama'],
				    'user' => $username,
				    'pass' => $password,
				    'status' => "loginAdmin"
				    );

				   	$this->session->set_userdata($data_session);

				   	redirect(base_url("admin"));
				   	
		  		// } elseif($sst_id == 2){
		  		// 	$data_session = array(
				  //   'id_user' => $log_id,
				  //   'user' => $username,
				  //   'pass' => $password,
				  //   'nama' => $data['stf_nama'],
				  //   'status' => "loginKepala"
				  //   );

				  //  	$this->session->set_userdata($data_session);

				  //  	redirect(base_url("kepala"));
		  		} else {
					$data_session = array(
				    'id_user' => $stf_id,
				    'user' => $username,
				    'pass' => $password,
				    'nama' => $data['stf_nama'],
				    'status' => "loginStaff"
				    );

				   	$this->session->set_userdata($data_session);
				   	redirect(base_url("staff"));
				}
		} else {
			$cek = 'false';
			redirect(base_url("login/index/".$cek));
		}

	}

	function logout(){
	  $this->session->sess_destroy();
	  redirect(base_url('login'));
	}
	
}