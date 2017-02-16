<?php
	class Article_model extends CI_Model{
		
		/*
		* Get Articles
		*
		* @param - order_by (string)
		* @param - sort (string)
		* @param - limit (int)
		* @param - offset (int)
		*
		*/
		public function get_articles($order_by =null,$sort='DESC',$limit=null,$offset=0){

			$this->db->select('a.*,b.name as category_name,c.first_name,c.last_name')
					 ->from('articles as a')
					 ->join('categories AS b','b.id = a.category_id','left')
					 ->join('users as c','c.id=a.user_id','left');

			if ($limit!=null) {
				$this->db->order_by($limit,$offset);
			}
			if ($order_by!=null) {
				$this->db->order_by($order_by,$sort);
			}
			$query = $this->db->get();
			return $query->result();
		}
		/*
		* Get Filtered Articles
		*
		* @param - order_by (string)
		* @param - sort (string)
		* @param - limit (int)
		* @param - offset (int)
		* @param - keywords(string)
		*/
		public function get_filtered_articles($keywords, $order_by =null,$sort='DESC',$limit=null,$offset=0){

			$this->db->select('a.*,b.name as category_name,c.first_name,c.last_name')
					 ->from('articles as a')
					 ->join('categories AS b','b.id = a.category_id','left')
					 ->join('users as c','c.id=a.user_id','left')
					 ->like('title',$keywords)
					 ->or_like('body',$keywords);

			if ($limit!=null) {
				$this->db->order_by($limit,$offset);
			}
			if ($order_by!=null) {
				$this->db->order_by($order_by,$sort);
			}
			$query = $this->db->get();
			return $query->result();
		}

		//Get Menu Items

		public function get_menu_items(){
			$this->db->where('in_menu', 1)->order_by('order');
			$query = $this->db->get('articles');
			return $query->result();
		}

		//Get Single Category
		public function get_category($id){
			$this->db->where('id',$id);
			$query = $this->db->get('categories');
			return $query->row();
		}

		//Get Single Article
		public function get_article($id){
			$this->db->where('id',$id);
			$query = $this->db->get('articles');
			return $query->row();
		}

		/*
		* Get Categories
		*
		* @param - order_by (string)
		* @param - sort (string)
		* @param - limit (int)
		* @param - offset (int)
		*
		*/
		public function get_categories($order_by =null,$sort='DESC',$limit=null,$offset=0){
			$this->db->select('*')->from('categories');
			if ($limit != null) {
				$this->db->limit($limit,$offset);
			}
			if ($order_by != null) {
				$this->db->order_by($order_by,$sort);
			}
			$query = $this->db->get();
			return $query->result();
		}

		//Insert Article
		public function insert($data){
			$this->db->insert('articles',$data);
			return true;
		}
		//Update Article
		public function update($data,$id){
			$this->db->where('id',$id);
			$this->db->update('articles',$data);
			return true;
		}
		//Publish article
		public function publish($id){
			$data = array('is_published' => 1);
			$this->db->where('id',$id);
			$this->db->update('articles',$data);
		}
		//unPublish article
		public function unpublish($id){
			$data = array('is_published' => 0);
			$this->db->where('id',$id);
			$this->db->update('articles',$data);
		}
		//Delete article
		public function delete($id){
			$this->db->where('id',$id);
			$this->db->delete('articles');
			return true;
		}
		//Insert Category
		public function insert_category($data){
			$this->db->insert('categories',$data);
			return true;
		}
		//Update Category
		public function update_category($data,$id){
			$this->db->where('id',$id);
			$this->db->update('categories',$data);
			return true;
		}
		//Delete categories
		public function delete_category($id){
			$this->db->where('id',$id);
			$this->db->delete('categories');
			return true;
		}
	}
?>