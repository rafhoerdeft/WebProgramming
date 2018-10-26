<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Staff extends CI_Controller {
	
	function __construct(){
		parent:: __construct();
		$this->load->model('masterData');
		if($this->session->userdata('status')!='loginStaff'){
			echo "<script type='text/javascript'>
			        alert ('Anda Tidak Punya Hak Akses Pada Halaman ini !!');
			        history.back(-1);
			      </script>";
		}
    }

    public function index(){	
		$data['today'] = $this->masterData->dataToday();
		$data['thismonth'] = $this->masterData->dataThisMonth();
		$this->load->view('header');
		$this->load->view('staff/v_navigation');
		$this->load->view('staff/v_dashboard',$data);
		$this->load->view('footer');
	}

	public function showProfile($success=''){
		if(empty($success)){
			$id = $this->session->userdata('id_user');
			$where = "stf_id =".$id;
			$data['profile'] = $this->masterData->getWhereData('staff',$where);
			$data['save'] = '';
			$this->load->view('header');
			$this->load->view('staff/v_navigation');
			$this->load->view('staff/v_profile',$data);
			$this->load->view('footer');			
		} elseif ($success == 'true'){
			$id = $this->session->userdata('id_user');
			$where = "stf_id =".$id;
			$data['profile'] = $this->masterData->getWhereData('staff',$where);
			$data['save'] = 'true';
			$this->load->view('header');
			$this->load->view('staff/v_navigation');
			$this->load->view('staff/v_profile',$data);
			$this->load->view('footer');			
		} else {
			$id = $this->session->userdata('id_user');
			$where = "stf_id =".$id;
			$data['profile'] = $this->masterData->getWhereData('staff',$where);
			$data['save'] = 'false';
			$this->load->view('header');
			$this->load->view('staff/v_navigation');
			$this->load->view('staff/v_profile',$data);
			$this->load->view('footer');			
		}
	}

	public function saveProfile(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$nik = $this->input->post('nik');
		$nidn = $this->input->post('nidn');
		$hp = $this->input->post('hp');
		$password = $this->input->post('password');

		$where = array(
			'stf_id' => $id, 
			'stf_password' => $password
		);

		$staff = $this->masterData->getWhereData('staff',$where);
		$cekStaff = $staff->num_rows();

		if($cekStaff > 0){
			$data = array (
				'stf_nama' => $nama,
				'stf_nik' => $nik,
				'stf_nidn' => $nidn,
				'stf_hp' => $hp
			);
			$where = 'stf_id ='.$id;
			$this->masterData->editData($where,$data,'staff');
			$success = 'true';
			redirect(base_url("staff/showProfile/".$success));
		} else {
			$success = 'false';
			redirect(base_url("staff/showProfile/".$success));
		}
	}

	public function showMahasiswa(){
		$tahun = $this->input->post('tahun_masuk');
		$pst = $this->input->post('program_studi');
		$kelas = $this->input->post('kelas');

		if($tahun==''){
			$data['show']='false';}
		else{
			$data['show']='true';
			$select = array('mahasiswa.mhs_nim','mahasiswa.mhs_nama','programstudi.pst_nama');
			$table = array('mahasiswa','programstudi','jeniskelas');
			$where = 'mahasiswa.pst_id=programstudi.pst_id and mahasiswa.jk_id=jeniskelas.jk_id and mahasiswa.mhs_tahunmasuk='.$tahun.' and mahasiswa.pst_id='.$pst.' and mahasiswa.jk_id='.$kelas;
			$data['peserta'] = $this->masterData->selectJoin($select,$table,$where);	
		}

		$data['tahun'] = $this->masterData->distinctMhstahunmasuk(); //select distinct tahun masuk mahasiswa yang sudah ada di database puskom
		$data['Programstudi'] = $this->masterData->getData('programstudi');
		$data['Jeniskelas'] = $this->masterData->getData('jeniskelas');
		$this->load->view('header');
		$this->load->view('staff/v_navigation');
		$this->load->view('staff/v_existedMhs',$data);
		$this->load->view('footer');
	}

    public function tampil_jadwal(){
    	$this->load->library('pdf');
		$select = array(
			'jd_id', 
			'jd_nama', 
			'jd_tanggal', 
			'jd_waktu', 
			'jd_ruang', 
			'jd_keterangan', 
			'(SELECT stf_nama from staff WHERE staff.stf_id=jadwal.penguji_1 ) penguji_1', 
			'(SELECT staff.stf_nama from staff WHERE staff.stf_id=jadwal.penguji_2 ) penguji_2'
		);

		$data ['Jadwal'] = $this->masterData->getSelectData($select, 'jadwal');
    	$this->load->view('staff/cetak_jadwal', $data);
    }

    public function cetak_sertifikat($pstr_id){
    	$this->load->library('pdf');
    	$select = 'pstr_id, mhs_nim, mhs_nama, pstr_nilai';
    	$table = 'peserta,mahasiswa';
    	$where = 'peserta.mhs_id=mahasiswa.mhs_id and pstr_id='.$pstr_id;
    	$data['peserta'] = $this->masterData->selectJoin($select,$table,$where);
    	$this->load->view('staff/v_cetak_sertifikat',$data);
    }

    public function cetak_sertifikat_all($jd_id){
    	$this->load->library('pdf');
	    $select = 'pstr_id, mhs_nim, mhs_nama, pstr_nilai';
    	$table = 'peserta,mahasiswa,jadwal';
    	$where = 'peserta.jd_id=jadwal.jd_id and peserta.mhs_id=mahasiswa.mhs_id and jadwal.jd_id='.$jd_id;
		$data['peserta'] = $this->masterData->selectJoin($select,$table,$where);
		$this->load->view('staff/v_cetak_sertifikat_all',$data);
	}

	public function selectjadwal(){
		$select = array(
			'jd_id', 
			'jd_nama', 
			'jd_tanggal', 
			'jd_waktu', 
			'jd_ruang', 
			'jd_keterangan', 
			'(SELECT stf_nama from staff WHERE staff.stf_id=jadwal.penguji_1 ) penguji_1', 
			'(SELECT staff.stf_nama from staff WHERE staff.stf_id=jadwal.penguji_2 ) penguji_2'
		);

		$data = $this->masterData->getSelectData($select, 'jadwal')->result();
		echo json_encode($data);
	}

	public function viewJadwal(){
		$tahun = $this->input->post('tahun');
		$bulan = $this->input->post('bulan');

		if(!isset($_POST['search'])){
			$select = array(
		 		'jd_id', 
		 		'jd_nama', 
		 		'jd_tanggal', 
		 		'jd_waktu', 
		 		'jd_ruang', 
		 		'jd_keterangan', 
		 		'(SELECT stf_nama from staff WHERE staff.stf_id=jadwal.penguji_1 ) penguji_1', 
		 		'(SELECT stf_nama from staff WHERE staff.stf_id=jadwal.penguji_2 ) penguji_2',
		 		'(SELECT COUNT(*) FROM peserta where jd_id=jadwal.jd_id) as total'
		 	);

			$data ['Jadwal'] = $this->masterData->getSelectData($select, 'jadwal');

		}else{

		 	$select = array(
		 		'jd_id', 
		 		'jd_nama', 
		 		'jd_tanggal', 
		 		'jd_waktu', 
		 		'jd_ruang', 
		 		'jd_keterangan', 
		 		'(SELECT stf_nama from staff WHERE staff.stf_id=jadwal.penguji_1 ) penguji_1', 
		 		'(SELECT stf_nama from staff WHERE staff.stf_id=jadwal.penguji_2 ) penguji_2',
		 		'(SELECT COUNT(*) FROM peserta where jd_id=jadwal.jd_id) as total'
		 	);

			$where = 'extract(YEAR from jd_tanggal) = '.$tahun.' and extract(MONTH from jd_tanggal) = '.$bulan;

			$data ['Jadwal'] = $this->masterData->getWhereDataJadwal($select, $where,'jadwal');
		}

	 	$data['tahun'] = $this->masterData->distinctjadwal();
	 	$this->load->view('header');
	 	$this->load->view('staff/v_navigation');
	 	$this->load->view('staff/v_jadwal', $data);
	 	$this->load->view('footer');
	}

	public function tambahJadwal(){
		$select = array(
			'jd_id', 
			'jd_nama', 
			'jd_tanggal', 
			'jd_waktu', 
			'jd_ruang', 
			'jd_keterangan', 
			'(SELECT stf_nama from staff WHERE staff.stf_id=jadwal.penguji_1 ) penguji_1', 
			'(SELECT staff.stf_nama from staff WHERE staff.stf_id=jadwal.penguji_2 ) penguji_2'
		);
		$data ['Jadwal'] = $this->masterData->getSelectData($select, 'jadwal');
		$data ['Staff'] = $this->masterData->getData('staff');

		$this->load->view('header');
		$this->load->view('staff/v_navigation');
		$this->load->view('staff/v_tambah_jadwal', $data);
		$this->load->view('footer');	
	}	

	public function insertJadwal(){
		$jd_nama = $this->input->post('jd_nama');
		$jd_tanggal = $this->input->post('jd_tanggal');
		$jd_waktu = $this->input->post('jd_waktu');
		$jd_ruang = $this->input->post('jd_ruang');
		$jd_keterangan = $this->input->post('keterangan');
		$penguji_1 = $this->input->post('penguji_1');
		$penguji_2 = $this->input->post('penguji_2');

		
		$data = array(
			'jd_nama' => $jd_nama,
			'jd_tanggal' => $jd_tanggal,
			'jd_waktu' => $jd_waktu,
			'jd_ruang' => $jd_ruang,
			'jd_keterangan' => $jd_keterangan,
			'penguji_1' => $penguji_1,
			'penguji_2' => $penguji_2,
			'stg_id' => 0
		);

		//var_dump($data);

		$this->masterData->inputData($data,'jadwal');
		redirect('staff/viewJadwal', $data);
	}

	public function editJadwal($jd_id){
		
			$where = array(
				'jd_id' => $jd_id
			);
			$data['Jadwal'] = $this->masterData->getWhereData('jadwal',$where);
			$data['Staff'] = $this->masterData->getData('staff');
				$this->load->view('header');
				$this->load->view('staff/v_navigation');
				$this->load->view('staff/v_edit_jadwal', $data);
				$this->load->view('footer');
	}

	public function editJadwalProses(){
		$jd_id  = $this->input->post('jd_id');
		$jd_nama  = $this->input->post('jd_nama');
		$jd_tanggal  = $this->input->post('jd_tanggal');
		$jd_ruang  = $this->input->post('jd_ruang');
		$jd_waktu  = $this->input->post('jd_waktu');
		$jd_keterangan  = $this->input->post('keterangan');
		$penguji_1  = $this->input->post('penguji_1');
		$penguji_2  = $this->input->post('penguji_2');
		
		$data = array(
			'jd_nama' => $jd_nama,
			'jd_tanggal' => $jd_tanggal,
			'jd_waktu' => $jd_waktu,
			'jd_ruang' => $jd_ruang,
			'jd_keterangan' => $jd_keterangan,
			'penguji_1' => $penguji_1,
			'penguji_2' => $penguji_2
		);
		
		$where = array(
			'jd_id' => $jd_id
		);
		$this->masterData->editData($where,$data,'jadwal');
		redirect('staff/viewJadwal', $data);
	}	

	public function deleteJadwal($jd_id){
		$jadwal = $this->masterData->getData('jadwal');
		$cekID = 0;
		foreach ($jadwal->result() as $key) {
			$jadwalID = md5(sha1($key->jd_id)).sha1($key->jd_id);//enkripsi id dari database
			if($jadwalID==$jd_id){ //membandingkan id yg asli dengan yang sudah di enkripsi
				$cekID += 1;
				$idJadwal = $key->jd_id;
				//$idFak = $key->fk_id;
			}
		}

		if($cekID >= 1){ //membandingkan id yg asli dengan yang sudah di enkripsi
			$where = array(
				'jd_id' => $idJadwal 
			);
			$this->masterData->deleteData($where,'jadwal');
			redirect('staff/viewJadwal', $data);
		}
		else{
			echo "<script type='text/javascript'>
			        alert ('Data Gagal Dihapus!!');
			        history.back(-1);
			      </script>";
		}
	}

	public function selectPeserta($jd_id){
		$table = array(
			'peserta',
			'mahasiswa',
			'programstudi',
			'jadwal'
		);

		$select = array(
			'peserta.pstr_id',
			'mahasiswa.mhs_nim',
			'mahasiswa.mhs_nama',
			'programstudi.pst_nama',
			'peserta.pstr_nilai'
		);

		$where = "jadwal.jd_id=peserta.jd_id and peserta.mhs_id=mahasiswa.mhs_id and mahasiswa.pst_id=programstudi.pst_id and jadwal.jd_id='$jd_id'";
		$data['peserta']=$this->masterData->selectJoin($select,$table,$where);

		$this->load->view('header');
		$this->load->view('staff/v_navigation');
		$this->load->view('staff/v_selectedPeserta', $data);
		$this->load->view('footer');
	}

	public function deletePesertafromjadwal($id){
		//var_dump($id);
		$where = array('pstr_id' => $id);
		$this->masterData->deleteData($where,'peserta');
		echo "
				<script>
					history.back(-1);
				</script>";
	}

	public function viewPeserta(){
		$select = array(
			'jd_id',
			'jd_tanggal',
			'jd_waktu'
		);
		$data['jadwal']= $this->masterData->getSelectData($select,'jadwal');

		$Jadwal = $this->input->post('jadwal');

		$select = array(
			'peserta.pstr_id',
			'jadwal.jd_id',
			'jadwal.jd_nama',
			'jadwal.jd_tanggal',
			'jadwal.jd_waktu',
			'mahasiswa.mhs_nama',
			'mahasiswa.mhs_nim',
			'jeniskelas.jk_nama',
			'programstudi.pst_nama'
		);

		$table = array(
			'peserta',
			'jadwal',
			'mahasiswa',
			'programstudi',
			'jeniskelas'
		);

		$where = "programstudi.pst_id=mahasiswa.pst_id and mahasiswa.jk_id=jeniskelas.jk_id and mahasiswa.mhs_id=peserta.mhs_id and peserta.jd_id=jadwal.jd_id and jadwal.jd_id='$Jadwal'";

		$data ['Peserta'] = $this->masterData->selectJoin($select, $table, $where);	

		$this->load->view('header');
		$this->load->view('staff/v_navigation');
		$this->load->view('staff/v_peserta', $data);
		$this->load->view('footer');
	}

	public function cetak_peserta($jd_id){
    	$this->load->library('pdf');
		$select = array(
			'peserta.pstr_id',
			'jadwal.jd_nama',
			'jadwal.jd_tanggal',
			'jadwal.jd_waktu',
			'mahasiswa.mhs_nama',
			'mahasiswa.mhs_nim',
			'jeniskelas.jk_nama',
			'programstudi.pst_nama'
		);

		$table = array(
			'peserta',
			'jadwal',
			'mahasiswa',
			'programstudi',
			'jeniskelas'
		);

		$where = "programstudi.pst_id=mahasiswa.pst_id and mahasiswa.jk_id=jeniskelas.jk_id and mahasiswa.mhs_id=peserta.mhs_id and peserta.jd_id=jadwal.jd_id and jadwal.jd_id='$jd_id'";

		$data ['Peserta'] = $this->masterData->selectJoin($select, $table, $where);	
    	$this->load->view('staff/cetak_peserta', $data);
    }

	public function inputPeserta(){

		$jd_id = $this->input->post('jd_id');
		$tahun = $this->input->post('tahun');
		$prodi = $this->input->post('prodi');
		$kelas = $this->input->post('kelas');

		if($tahun==''){
			$data['show']='false';}
		else{
			$data['show']='true';
			$where = 'mhs_id not in (select mhs_id from peserta) and mhs_tahunmasuk='.$tahun.' and pst_id='.$prodi.' and jk_id='.$kelas;
			$data['mahasiswa'] = $this->masterData->getWhereData('mahasiswa',$where);
		}

		$selectThn = 'mhs_tahunmasuk';
		$data['tahun']= $this->masterData->getDataGroup($selectThn,'mahasiswa',$selectThn);
		$data['prodi']= $this->masterData->getData('programstudi');
		$data['kelas']= $this->masterData->getData('jeniskelas');

		$wherejadwal = array(
			'jd_id' => $jd_id
		);

		$data['jadwal']= $this->masterData->getWhereData('jadwal',$wherejadwal);
		$this->load->view('header');
		$this->load->view('staff/v_navigation');
		$this->load->view('staff/v_inputPeserta',$data);
		$this->load->view('footer');
	}
	

	public function insertPeserta(){
		
		$jd_id = $this->input->post('jd_id');
		$mhs_id = $this->input->post('mhs_id');
		
		foreach($mhs_id as $mhs){
			$data = array(
				'jd_id' => $jd_id,
				'mhs_id' => $mhs
			);
			$this->masterData->inputData($data,'peserta'); // fungsi dari codeigniter untuk menyimpan multi array
		}
		redirect(base_url()."staff/selectPeserta/".$jd_id);
	}

	public function viewNilai(){
		$tahun = $this->input->post('tahun_masuk');
		$pst = $this->input->post('program_studi');
		$kelas = $this->input->post('kelas');

		if($tahun==''){
			$data['show']='false';}
		else{
			$data['show']='true';
			$select = array('mahasiswa.mhs_nim','mahasiswa.mhs_nama','programstudi.pst_nama','peserta.pstr_nilai');
			$table = array('peserta','mahasiswa','programstudi','jeniskelas');
			$where = 'peserta.mhs_id=mahasiswa.mhs_id and mahasiswa.pst_id=programstudi.pst_id and mahasiswa.jk_id=jeniskelas.jk_id and mahasiswa.mhs_tahunmasuk='.$tahun.' and programstudi.pst_id='.$pst.' and mahasiswa.jk_id='.$kelas;
			$data['peserta'] = $this->masterData->selectJoin($select,$table,$where);	
		}
		

		$data['tahun'] = $this->masterData->distinctMhstahunmasuk();
		//$data['Mahasiswa'] = $this->masterData->getData('mahasiswa');
		$data['Programstudi'] = $this->masterData->getData('programstudi');
		$data['Jeniskelas'] = $this->masterData->getData('jeniskelas');
		$this->load->view('header');
		$this->load->view('staff/v_navigation');
		$this->load->view('staff/v_nilai', $data);
		$this->load->view('footer');
	}

	public function inputNilai(){
		$select = array(
			'peserta.pstr_id',
			'peserta.jd_id',
			'mahasiswa.mhs_nim',
			'mahasiswa.mhs_nama'
		);

		$table = array(
			'peserta',
			'mahasiswa'
		);

		$where = 'peserta.mhs_id = mahasiswa.mhs_id and jd_id=1';

		$data['peserta'] = $this->masterData->selectJoin($select, $table, $where);
		$this->load->view('header');
		$this->load->view('staff/v_navigation');
		$this->load->view('staff/v_inputnilai',$data);
		$this->load->view('footer');
	}

	public function insertNilai(){
		$pstr_id = $this->input->post('pstr_id');
		$nilai = $this->input->post('nilai');

		foreach (array_combine($pstr_id, $nilai) as $id => $biji){
			$data = array(
				'pstr_nilai' => $biji
			);

			$where = array(
				'pstr_id' => $id
			);
			$this->masterData->editData($where,$data,'peserta');
			echo "
				<script>
					history.back(-1);
				</script>";
		}
	}

// ============================================= Sync ==================================================== //

	public function viewFakultas($success=''){
		if(empty($success)){
			$data['show'] = '';
			$data['Fakultas'] = $this->masterData->getData('fakultas');
			$this->load->view('header');
			$this->load->view('staff/v_navigation');
			$this->load->view('staff/v_fakultas',$data);
			$this->load->view('footer');
		} else if ($success == 'true'){
			$data['show'] = 'true';
			$data['Fakultas'] = $this->masterData->getData('fakultas');
			$this->load->view('header');
			$this->load->view('staff/v_navigation');
			$this->load->view('staff/v_fakultas',$data);
			$this->load->view('footer');
		} else if ($success == 'false'){
			$data['show'] = 'false';
			$data['Fakultas'] = $this->masterData->getData('fakultas');
			$this->load->view('header');
			$this->load->view('staff/v_navigation');
			$this->load->view('staff/v_fakultas',$data);
			$this->load->view('footer');
		}
	}

	public function sinkronFak(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://192.168.1.7/api_puskom/fakultas",
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
		    "key: fgdfg5454fdg5dfg45fg45w4r5e4t5h",
		    //"postman-token: 38c4409b-e253-a90e-82a0-9bb5b66a4dfd"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  $this->session->set_flashdata('hasil','Sinkron Failed, cURL Error #:'. $err);
		  $success = 'false';
		  redirect(base_url('staff/viewFakultas/'.$success));
		} else {
			if ($response == 'Illegal Access') {
				$this->session->set_flashdata('hasil','Sinkron Failed, <b>Illegal Access!!</b>');
				redirect('staff/viewFakultas');
			}else{
				
				$dataFak = json_decode($response);
				foreach ($dataFak as $key) {
					$save = 0;
					$fakultas = $this->masterData->getData('fakultas');
					//$fak = $fakultas->row_array();
					//$kodeFak = $fak['fk_kode'];
					foreach ($fakultas->result() as $rows) {
						if ($rows->fk_kode == $key->fk_kode) {
					  		$save += 1;
					  		$data = array(
					  			'fk_id' => $key->fk_id,
								'fk_kode' => $key->fk_kode,
								'fk_nama' => $key->fk_name,
								'fk_singkatan' => $key->fk_note
							);
							$where = array(
								'fk_id' => $key->fk_id
							);
							$this->masterData->editData($where,$data,'fakultas');
				  		}
				  		else{
				  			$save += 0;
				  		}
				  	}
				  	if ($save == 0) {
					  	$data = array(
					  		'fk_id' => $key->fk_id,
							'fk_kode' => $key->fk_kode,
							'fk_nama' => $key->fk_name,
							'fk_singkatan' => $key->fk_note
						);
						$this->masterData->replaceInto($data,'fakultas');
				  	}
				}
				$this->session->set_flashdata('hasil','Sinkron Success');
				$success = 'true';
				redirect(base_url('staff/viewFakultas/'.$success));
			}
		    //var_dump($dataFakultas);
		}
	}


	public function viewProdi($success=''){
		if(empty($success)){
			$data['show'] = '';
			$data['Prodi'] = $this->masterData->getData('programstudi');
			$this->load->view('header');
			$this->load->view('staff/v_navigation');
			$this->load->view('staff/v_prodi',$data);
			$this->load->view('footer');
		} else if ($success == 'true'){
			$data['show'] = 'true';
			$data['Prodi'] = $this->masterData->getData('programstudi');
			$this->load->view('header');
			$this->load->view('staff/v_navigation');
			$this->load->view('staff/v_prodi',$data);
			$this->load->view('footer');
		} else if ($success == 'false'){
			$data['show'] = 'false';
			$data['Prodi'] = $this->masterData->getData('programstudi');
			$this->load->view('header');
			$this->load->view('staff/v_navigation');
			$this->load->view('staff/v_prodi',$data);
			$this->load->view('footer');
		}
	}

	public function sinkronProdi(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://192.168.1.7/api_puskom/prodi",
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
		    "key: fgdfg5454fdg5dfg45fg45w4r5e4t5h",
		    //"postman-token: 38c4409b-e253-a90e-82a0-9bb5b66a4dfd"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  //echo "cURL Error #:" . $err;
		  $this->session->set_flashdata('hasil','Sinkron Failed, cURL Error #:'. $err);
		  $success = 'false';
		  redirect(base_url('staff/viewProdi/'.$success));
		} else {
			if ($response == 'Illegal Access') {
				$this->session->set_flashdata('hasil','Sinkron Failed, <b>Illegal Access!!</b>');
				
			}else{
				
				$dataProdi = json_decode($response);
				foreach ($dataProdi as $key) {
					$save = 0;
					$prodi = $this->masterData->getData('programstudi');
		
					foreach ($prodi->result() as $rows) {
						if ($rows->pst_id == $key->pst_id) {
					  		$save += 1;
					  		$data = array(
					  			'pst_id' => $key->pst_id,
					  			'pst_nama' => $key->pst_name,
					  			'pst_jenjangpendidikan' => $key->pst_jenjangpendidikan,
					  			'fk_id' => $key->ais_fakultas_fk_id
							);
							$where = array(
								'pst_id' => $key->pst_id,
							);
							$this->masterData->editData($where,$data,'programstudi');
				  		}
				  		else{
				  			$save += 0;
				  		}
				  	}
				  	if ($save == 0) {
					  	$data = array(
					  		'pst_id' => $key->pst_id,
					  			'pst_nama' => $key->pst_name,
					  			'pst_jenjangpendidikan' => $key->pst_jenjangpendidikan,
					  			'fk_id' => $key->ais_fakultas_fk_id
						);
						$this->masterData->replaceInto($data,'programstudi');
				  	}
				}
				$this->session->set_flashdata('hasil','Sinkron Success');
				$success = 'true';
				redirect(base_url('staff/viewProdi/'.$success));
			}
		    
		}
	}

	public function viewMahasiswa($success = ''){
		if(empty($success)){
			$data['show'] = '';
			$data['Prodi'] = $this->masterData->getData('programstudi');
			$this->load->view('header');
			$this->load->view('staff/v_navigation');
			$this->load->view('staff/v_mahasiswa',$data);
			$this->load->view('footer');
		} else if ($success == 'true'){
			$data['show'] = 'true';
			$data['Prodi'] = $this->masterData->getData('programstudi');
			$this->load->view('header');
			$this->load->view('staff/v_navigation');
			$this->load->view('staff/v_mahasiswa',$data);
			$this->load->view('footer');
		} else if ($success == 'false'){
			$data['show'] = 'false';
			$data['Prodi'] = $this->masterData->getData('programstudi');
			$this->load->view('header');
			$this->load->view('staff/v_navigation');
			$this->load->view('staff/v_mahasiswa',$data);
			$this->load->view('footer');
		}
	}

	public function sinkronMhs(){
		$thn = $this->input->post('tahunmasuk');
		$prodi = $this->input->post('prodi');

				$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => "http://192.168.1.11/api_puskom/mhs/$thn-$prodi",
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
				    "key: fgdfg5454fdg5dfg45fg45w4r5e4t5h",
				    //"postman-token: 38c4409b-e253-a90e-82a0-9bb5b66a4dfd"
				  ),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				if ($err) {
				  $this->session->unset_userdata("hasilSinkron");
				  $this->session->set_flashdata('hasil','Sinkron Failed, cURL Error #:'. $err);
				  $success = 'false';
				  redirect(base_url('staff/viewMahasiswa/'.$success));
				} else {
					if ($response == 'Illegal Access') {
						$this->session->set_flashdata('hasil','Sinkron Failed, <b>Illegal Access!!</b>');
						//redirect('staff/dataFak');
					}else{
						
						$dataMhs = json_decode($response);
						//var_dump($dataMhs);
						foreach ($dataMhs as $key) {
							$save = 0;
							$mahasiswa = $this->masterData->getData('mahasiswa');
							foreach ($mahasiswa->result() as $rows) {
							  	$data = array(
							  		'mhs_id' => $key->mhs_id,
							  			'mhs_nama' => $key->mhs_nama,
							  			'mhs_nim' => $key->mhs_nim,
							  			'mhs_tahunmasuk' => $key->mhs_thmasuk,
							  			'mhs_jeniskelamin' => $key->mhs_jeniskelamin,
							  			'pst_id' => $key->mhs_programstudi_fk,
							  			'jk_id' => $key->mhs_jeniskelas_fk
								);
								$this->masterData->replaceInto($data,'mahasiswa');
							}
						}
						$this->session->unset_userdata("hasilSinkron");
						$this->session->set_userdata("hasilSinkron",$dataMhs);
						$this->session->userdata("hasilSinkron");

						$this->session->set_flashdata('hasil','Sinkron Success');
						$success = 'true';
						redirect(base_url('staff/viewMahasiswa/'.$success));
					}
				}
		//}
	}

	public function sinkronSmt(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://192.168.1.11/api_puskom/semester",
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
		    "key: fgdfg5454fdg5dfg45fg45w4r5e4t5h",
		    //"postman-token: 38c4409b-e253-a90e-82a0-9bb5b66a4dfd"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  //echo "cURL Error #:" . $err;
		  $this->session->set_flashdata('hasil','Sinkron Failed, cURL Error #:'. $err);
		  //redirect('staff/dataFak');
		} else {
			if ($response == 'Illegal Access') {
				$this->session->set_flashdata('hasil','Sinkron Failed, <b>Illegal Access!!</b>');
				//redirect('staff/dataFak');
			}else{
				
				$dataSmt = json_decode($response);
				foreach ($dataSmt as $key) {
					$save = 0;
					$semester = $this->masterData->getData('semester');
					//$fak = $fakultas->row_array();
					//$kodeFak = $fak['fk_kode'];
					foreach ($semester->result() as $rows) {
						if ($rows->smt_id == $key->sss_id) {
					  		$save += 1;
					  		$data = array(
					  			'smt_id' => $key->sss_id,
								'smt_nama' => $key->smt_nama,
								'sss_status' => $key->sss_show
							);
							$where = array(
								'smt_id' => $key->sss_id
							);
							$this->masterData->editData($where,$data,'semester');
				  		}
				  		else{
				  			$save += 0;
				  		}
				  	}
				  	if ($save == 0) {
					  	$data = array(
					  		'smt_id' => $key->sss_id,
							'smt_nama' => $key->smt_nama,
							'sss_status' => $key->sss_show
						);
						$this->masterData->replaceInto($data,'semester');
				  	}
				}
				$this->session->set_flashdata('hasil','Sinkron Success');
				redirect('staff/viewSemester');
				// echo "Sinkron Success";
				//redirect('staff/dataFak');
			}
		    //var_dump($dataFakultas);
		}
	}

}