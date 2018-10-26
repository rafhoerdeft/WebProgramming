<?php
class M_login extends CI_Model{
    //cek nidn dan password staff
	public function cekLogin($table,$where){		
		return $this->db->get_where($table,$where);
	}
}