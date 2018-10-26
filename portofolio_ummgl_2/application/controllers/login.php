<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller {
	
	function __construct(){
		parent:: __construct();
		$this->load->model('masterData');	
	}

	public function index(){		
		$data['judul'] = "Halaman Utama";
		$this->load->view('login/head');
		$this->load->view('login/form-login');
		$this->load->view('login/end');
		$this->session->sess_destroy();
	}
	function prosesLogin(){
		  $username = $this->input->post('user');
		  $password = $this->input->post('pass');
		  $where = array(
		   'log_user' => $username,
		   'log_pass' => md5(sha1($password)).sha1($password)
		   );
		  $login = $this->masterData->getWhereData('*',"login",$where);
		  $cek = $login->num_rows();
		  //$data['user'] = $this->dataLogin->cekLogin("login",$where);
		  if($cek > 0){

		  		$data=$login->row_array();
		  		$log_id = $data['log_id'];

		  		
		  			$data_session = array(
					    'id_log' => $log_id,
					    'user' => $username,
					    'pass' => $password,
					    'status' => "loginAdm"
				    );

				   	$this->session->set_userdata($data_session);

				   	redirect(base_url("admin")); 

		  }else{
			   echo "<script type='text/javascript'>
			               alert ('Maaf Username Dan Password Anda Salah !');
			               history.back(-1);
			      </script>";
		  }
 	}

	function logout(){
	  $this->session->sess_destroy();
	  redirect(base_url('login'));
	}
 
}