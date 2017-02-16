<?php
	/**
	* 
	*/
	class Articles extends MY_Controller{

		public function __construct(){
			parent::__construct();

			//Access Control
			if (!$this->session->userdata('logged_in')) {
				redirect('admin/login');
			}
		}
		
		public function index(){

			if (!empty($this->input->post('keywords'))) {
			//Get Filetered Articles
			$keywords = $this->input->post('keywords');
			$data['articles'] = $this->Article_model->get_filtered_articles($keywords,'id','DESC',10);

			}else{
			//Get Articles
			$data['articles'] = $this->Article_model->get_articles('id','DESC',10);
			}
			//Get Categories
			$data['categories'] = $this->Article_model->get_categories('id','DESC',5);
			//Get Users
			$data['users'] = $this->User_model->get_users('id','DESC',5);

			//View
			$data['main_content'] = 'admin/articles/index';
			$this->load->view('admin/layouts/main',$data);

		}
		//Add article
		public function add(){
			//Validation Rules
			$this->form_validation->set_rules('title','Title','trim|required|min_length[4]|xss_clean');
			$this->form_validation->set_rules('body','Body','trim|required|xss_clean');
			$this->form_validation->set_rules('is_published','Published','required');
			$this->form_validation->set_rules('category','Category','required');

			$data['categories'] = $this->Article_model->get_categories();

			$data['users'] = $this->User_model->get_users();

			$data['groups'] = $this->User_model->get_groups();

			if ($this->form_validation->run() == false) {
				//Views
				$data['main_content'] = 'admin/articles/add';
				$this->load->view('admin/layouts/main',$data);
			}else{
				$data = array(
					'title' => $this->input->post('title'),
					'body' => $this->input->post('body'),
					'category_id' => $this->input->post('category'),
					'access' => $this->input->post('access'),
					'is_published' => $this->input->post('is_published'),
					'in_menu' => $this->input->post('in_menu'),
					'order' => $this->input->post('order')
					);

				//Articles table insert
				$this->Article_model->insert($data);

				//Create Message
				$this->session->set_flashdata('article_saved','Your article has been saved');

				//Redirect to pages
				redirect('admin/articles');
			}
			

		}
		//Edit article
		public function edit($id){
			//Validation Rules
			$this->form_validation->set_rules('title','Title','trim|required|min_length[4]|xss_clean');
			$this->form_validation->set_rules('body','Body','trim|required|xss_clean');
			$this->form_validation->set_rules('is_published','Published','required');
			$this->form_validation->set_rules('category','Category','required');

			$data['categories'] = $this->Article_model->get_categories();

			$data['users'] = $this->User_model->get_users();

			$data['groups'] = $this->User_model->get_groups();

			$data['article'] = $this->Article_model->get_article($id);


			if ($this->form_validation->run() == false) {
				//Views
				$data['main_content'] = 'admin/articles/edit';
				$this->load->view('admin/layouts/main',$data);
			}else{
				$data = array(
					'title' => $this->input->post('title'),
					'body' => $this->input->post('body'),
					'category_id' => $this->input->post('category'),
					'access' => $this->input->post('access'),
					'is_published' => $this->input->post('is_published'),
					'in_menu' => $this->input->post('in_menu'),
					'order' => $this->input->post('order')
					);

				//Articles table update
				$this->Article_model->update($data,$id);

				//Create Message
				$this->session->set_flashdata('article_saved','Your article has been saved');

				//Redirect to pages
				redirect('admin/articles');
			}
		}

		//Publish method
		public function publish($id){
			//Publish menu items in array
			$this->Article_model->publish($id);

			//create message
			$this->session->set_flashdata('articles_published', 'Your Article has been published');

			//Redirect to articles
			redirect('admin/articles');
		}
		//unpublish method
		public function unpublish($id){
			//Publish menu items in array
			$this->Article_model->unpublish($id);

			//create message
			$this->session->set_flashdata('articles_unpublished', 'Your Article has been unpublished');

			//Redirect to articles
			redirect('admin/articles');
		}
		//Delete method
		public function delete($id){
			//delete article
			$this->Article_model->delete($id);

			//create message
			$this->session->set_flashdata('article_deleted', 'Your Article has been deleted');

			//Redirect to articles
			redirect('admin/articles');
		}
	}
?>