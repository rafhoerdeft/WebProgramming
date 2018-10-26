<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('MasterData');
		$this->load->library('session');
		$this->load->helper('cookie');
		date_default_timezone_set("ASIA/JAKARTA");
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

		$hasil = $this->MasterData->getWhereDataAll('users',$where);
		if ($hasil->num_rows() == 1) {
			// $cookie = array(
			//    'name'   => 'token_user',
			//    'value'  => $token,
			//    'expire' => strtotime('10 minute'),
			//    'path'   => '/',
			//    'secure' => TRUE
			// );
			// $this->input->set_cookie($cookie);
			// $this->input->set_cookie('cek', 'coba cookies enak', strtotime('10 minute'),'/');
			// setcookie('cek', 'coba cookies enak3', strtotime('10 minute'),'/');
			// $this->input->set_cookie($cookie);
			// echo $this->input->cookie('cek');

			$data_users = $hasil->row_array();
			$id_usr = $data_users['id_user'];

			$where_usr = array(
				'id_user'=>$id_usr
			);
			$user_log = $this->MasterData->getWhereDataAll('log_user',$where_usr);

			if ($user_log->num_rows() == 1) {
				$log = $user_log->row_array();

				$ip=$_SERVER['REMOTE_ADDR'];
				$useragent = $_SERVER['HTTP_USER_AGENT'];
				$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
				// Kode Token
				$tgl_log = date("Y-m-d");
				$token = sha1($ip.$useragent.$hostname."random_token_user".$tgl_log);
				//Tanggal Login
				$tgl_log = date("Y-m-d H:i:s");
				// Waktu Expired Session
				$time_exp = date("Y-m-d H:i:s", strtotime('+5 minute 10 second'));

				if ($log['token']=="") {
					setcookie('token_user', $token, strtotime('60 minute'),'/');

					$data_log = array(
						'tgl_log' => $tgl_log,
						'waktu_exp' => $time_exp,
						'token' => $token
					);	
					$where_log = array(
						'id_user' => $id_usr
					);
					$update_log = $this->MasterData->editData($where_log,$data_log,'log_user');
					if ($update_log) {
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
				}else{
					$token_user = $this->input->cookie('token_user');
					if ($log['token']==$token_user) {
						// $this->session->sess_destroy();
						setcookie('token_user', $token, strtotime('60 minute'),'/');

						$data_log = array(
							'tgl_log' => $tgl_log,
							'waktu_exp' => $time_exp,
							'token' => $token
						);
						$where_log = array(
							'id_user'=>$id_usr
						);
						$update_log = $this->MasterData->editData($where_log,$data_log,'log_user');
						if ($update_log) {
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
						}
					}else{
						$time_now = date("Y-m-d H:i:s");
						if ($time_now>$log['waktu_exp']) {
							// $this->session->sess_destroy();
							setcookie('token_user', $token, strtotime('60 minute'),'/');

							$data_log = array(
								'tgl_log' => $tgl_log,
								'waktu_exp' => $time_exp,
								'token' => $token
							);	
							$where_log = array(
								'id_user' => $id_usr
							);
							$update_log = $this->MasterData->editData($where_log,$data_log,'log_user');
							if ($update_log) {
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
							}
						}else{
							echo "Digunakan";
						}
					}
				}
			}else{
				$ip=$_SERVER['REMOTE_ADDR'];
				$useragent = $_SERVER['HTTP_USER_AGENT'];
				$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
				// Kode Token
				$tgl_log = date("Y-m-d");
				$token = sha1($ip.$useragent.$hostname."random_token_user".$tgl_log);
				//Tanggal Login
				$tgl_log = date("Y-m-d H:i:s");
				// Waktu Expired Session
				$time_exp = date("Y-m-d H:i:s", strtotime('+5 minute 10 second'));

				setcookie('token_user', $token, strtotime('60 minute'),'/');

				$data_log = array(
					'id_user' => $id_usr,
					'tgl_log' => $tgl_log,
					'waktu_exp' => $time_exp,
					'token' => $token
				);	
				
				$input_log = $this->MasterData->inputData($data_log,'log_user');
				if ($input_log) {
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
			}
		}
		else {
			echo "Gagal";
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