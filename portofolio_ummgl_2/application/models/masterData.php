<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class MasterData extends CI_Model {
	
	/*public function User($table,$id){
		$this->db->WHERE('md5(sha1(id_user)).sha1(id_user)',$id);
		return $this->db->GET($table);
	}*/

	public function getData($table){
		return $this->db->GET($table);
	}
	public function getDataOrder($table,$order){
		return $this->db->order_by($order,'ASC')
						->GET($table);
	}
	public function getSelectData($select,$table){
		return $this->db->SELECT($select)
						->GET($table);
	}
	public function getWhereData($select,$table,$where){
		return $this->db->SELECT($select)
						//->FROM($table)
						->WHERE($where)
						->GET($table);
	}
	public function getDataGroup($select,$table,$where,$group){
		return $this->db->SELECT($select)
						->group_by($group)
						->WHERE($where)
						->GET($table);
	}
 	public function inputData($data,$table){
		return $this->db->insert($table,$data);
	}
	public function replaceData($data,$table){
		return $this->db->replace($table,$data);
	}
	public function editData($where,$data,$table){
		$this->db->where($where);
		return $this->db->update($table,$data);
	}
	public function deleteData($where,$table){
		$this->db->where($where);
		return $this->db->delete($table);
	}
	public function cekLogin($table,$where){		
		return $this->db->get_where($table,$where);
	}
}