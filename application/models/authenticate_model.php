<?php
	/**
	* 
	*/
	class Authenticate_model extends CI_Model{
		public function login_user($username,$password){
			$this->db->where('username',$username);
			$this->db->where('password',$password);

			$result = $this->db->get('users');
			if ($result->num_rows() == 1) {
				return $result->row();
			}else{
				return false;
			}
		}
	}
?>