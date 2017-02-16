<?php
	/**
	* 
	*/
	class Categories extends MY_Controller{

		public function __construct(){
			parent::__construct();

			//Access Control
			if (!$this->session->userdata('logged_in')) {
				redirect('admin/login');
			}
		}
		//Categories main index
		public function index(){
			//Get Categories
			$data['categories'] = $this->Article_model->get_categories('id','DESC');

			//Views
			$data['main_content'] = 'admin/categories/index';
			$this->load->view('admin/layouts/main',$data);

		}

		//Add Category
		public function add(){
			//Validation Rules
			$this->form_validation->set_rules('name','Name','trim|required|min_length[4]|xss_clean');

			if ($this->form_validation->run() == false) {
				//Views
				$data['main_content'] = 'admin/categories/add';
				$this->load->view('admin/layouts/main',$data);
			}else{
				$data = array(
					'name' => $this->input->post('name')
					);

				//Categories table insert
				$this->Article_model->insert_category($data);

				//Create Message
				$this->session->set_flashdata('category_saved','Your article has been saved');

				//Redirect to pages
				redirect('admin/catgeories');
			
			}
		}

		//Edit Category
		public function edit($id){
			//Validation Rules
			$this->form_validation->set_rules('name','Name','trim|required|min_length[4]|xss_clean');

			//Get Categories
			$data['category'] = $this->Article_model->get_category($id);

			if ($this->form_validation->run() == false) {
				//Views
				$data['main_content'] = 'admin/categories/edit';
				$this->load->view('admin/layouts/main',$data);
			}else{
				$data = array(
					'name' => $this->input->post('name')
					);

				//Categories table insert
				$this->Article_model->update_category($data,$id);


				//Create Message
				$this->session->set_flashdata('category_saved','Your article has been saved');

				//Redirect to pages
				redirect('admin/categories');
			
			}
		}
		//Delete method
		public function delete($id){
			//delete category
			$this->Article_model->delete_category($id);

			//create message
			$this->session->set_flashdata('category_deleted', 'Your Article has been deleted');

			//Redirect to categories
			redirect('admin/categories');
		}
	}
?>