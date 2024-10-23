<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login_agency extends CI_Model {

	public function login ($data, $table) {
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('age_username', $data['age_username']); 
		$this->db->where('age_password', md5($data['age_password'])); 
		$query = $this->db->get();
		return $query->result_array(); 			
	}	

}

/* End of file model_login.php */
/* Location: ./application/models/model_login.php */