<?php
	class Settings_model extends CI_Model{
	/**
	* Get global Settings 
	*/
		public function get_global_settings(){
			$query = $this->db->get('settings');
			$result = $query->result();
			return $result;
		}		
	}
?>