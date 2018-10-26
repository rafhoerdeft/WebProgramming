<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class MasterData extends CI_Model {

	public function getData($table){
		return $this->db->GET($table);
	}
	public function getSelectData($select,$table){
		return $this->db->SELECT($select)
						->GET($table);
	}

	public function getWhereData($table,$where){
		return $this->db->SELECT('*')
						->WHERE($where)
						->GET($table);
	}

	public function getWhereDataJadwal($select,$where,$table){
		return $this->db->SELECT($select)
						->WHERE($where)
						->GET($table);
	}

	public function getDataOrder($table,$order){
		return $this->db->order_by($order,'ASC')
						->GET($table);
	}
	public function getDataGroup($select,$table,$group){
		return $this->db->SELECT($select)
						->group_by($group)
						->GET($table);
	}

	public function selectJoin($select,$table,$where){
		return $this->db->SELECT($select)
						->FROM($table)
						->WHERE($where)
						->GET();
	}

 	public function inputData($data,$table){
		$this->db->insert($table,$data);
	}

	public function replaceInto($data,$table){
		$this->db->replace($table,$data);
	}

	public function editData($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function deleteData($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function cekLogin($table,$where){		
		return $this->db->get_where($table,$where);
	}

	public function dataToday(){
		return $this->db->SELECT('*')
						->WHERE('jd_tanggal = curdate()')
						->GET('jadwal');
	}

	public function dataThisMonth(){
		return $this->db->SELECT('*')
						->WHERE('month(jd_tanggal) = month(now())')
						->GET('jadwal');
	}	
	
	public function zzz($select, $table1, $table2, $where){
		$this->db->select('data_users.*, users.username, users.level, users.active'); //mengambil semua data dari tabel data_users dan users
	    $this->db->from('data_users'); //dari tabel data_users
	    $this->db->join('users', 'users.id = data_users.akun', 'left'); //menyatukan tabel users menggunakan left join
	    $data = $this->db->get(); //mengambil seluruh data
	    return $data->result(); //mengembalikan data
	}

	public function distinctjadwal(){
		return $this->db->query('SELECT distinct(EXTRACT(YEAR FROM jd_tanggal)) as tahun from jadwal'); //menampilkan tahun saja dengan distinct
	}

	public function distinctMhstahunmasuk(){
		return $this->db->query('SELECT distinct(mhs_tahunmasuk) as tahun from mahasiswa ORDER BY tahun desc limit 10'); //tahun dibatasi 10 tahun terakhir
	}
}