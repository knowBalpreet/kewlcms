<?php
	/**
	* 
	*/
	class User_model extends CI_Model{
		public function get_users($order_by =null,$sort='DESC',$limit=null,$offset=0){
			$this->db->select('*')->from('users');
			if ($limit != null) {
				$this->db->limit($limit,$offset);
			}
			if ($order_by != null) {
				$this->db->order_by($order_by,$sort);
			}
			$query = $this->db->get();
			return $query->result();
		}

		//Get Single User
		public function get_user($id){
			$this->db->where('id',$id);
			$query = $this->db->get('users');
			return $query->row();
		}

		public function get_groups($order_by =null,$sort='DESC',$limit=null,$offset=0){
			$this->db->select('*')->from('groups');
			if ($limit != null) {
				$this->db->limit($limit,$offset);
			}
			if ($order_by != null) {
				$this->db->order_by($order_by,$sort);
			}
			$query = $this->db->get();
			return $query->result();
		}
		//Get Single Group
		public function get_group($id){
			$this->db->where('id',$id);
			$query = $this->db->get('groups');
			return $query->row();
		}

		//Insert user
		public function insert($data){
			$this->db->insert('users',$data);
			return true;
		}

		//Update user
		public function update($data,$id){
			$this->db->where('id',$id);
			$this->db->update('users',$data);
			return true;
		}

		//Delete user
		public function delete($id){
			$this->db->where('id',$id);
			$this->db->delete('users');
			return true;
		}

		//Insert group
		public function insert_group($data){
			$this->db->insert('groups',$data);
			return true;
		}
		//Update group
		public function update_group($data,$id){
			$this->db->where('id',$id);
			$this->db->update('groups',$data);
			return true;
		}
		//Delete group
		public function delete_group($id){
			$this->db->where('id',$id);
			$this->db->delete('groups');
			return true;
		}
	}
?>