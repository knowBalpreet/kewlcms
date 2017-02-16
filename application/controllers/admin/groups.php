<?php

	class Groups extends MY_Controller{

		public function __construct(){
			parent::__construct();

			//Access Control
			if (!$this->session->userdata('logged_in')) {
				redirect('admin/login');
			}
		}
		public function index(){
			//Get Users
			$data['groups'] = $this->User_model->get_groups();

			//Views
			$data['main_content'] = 'admin/groups/index';
			$this->load->view('admin/layouts/main',$data);			
		}
		//Add Group
		public function add(){
			//Validation Rules
			$this->form_validation->set_rules('name','Name','trim|required|min_length[4]|xss_clean');

			if ($this->form_validation->run() == false) {
				//Views
				$data['main_content'] = 'admin/groups/add';
				$this->load->view('admin/layouts/main',$data);
			}else{
				$data = array(
					'name' => $this->input->post('name')
					);

				//Categories table insert
				$this->User_model->insert_group($data);

				//Create Message
				$this->session->set_flashdata('group_saved','Your Group has been saved');

				//Redirect to pages
				redirect('admin/groups');
			
			}
		}
		//Edit Category
		public function edit($id){
			//Validation Rules
			$this->form_validation->set_rules('name','Name','trim|required|min_length[4]|xss_clean');

			//Get Categories
			$data['group'] = $this->User_model->get_group($id);

			if ($this->form_validation->run() == false) {
				//Views
				$data['main_content'] = 'admin/groups/edit';
				$this->load->view('admin/layouts/main',$data);
			}else{
				$data = array(
					'name' => $this->input->post('name')
					);

				//Categories table insert
				$this->User_model->update_group($data,$id);


				//Create Message
				$this->session->set_flashdata('group_saved','Your Group has been saved');

				//Redirect to pages
				redirect('admin/groups');
			
			}
		}
		//Delete method
		public function delete($id){
			//delete category
			$this->User_model->delete_group($id);

			//create message
			$this->session->set_flashdata('group_deleted', 'Group has been deleted');

			//Redirect to categories
			redirect('admin/groups');
		}

	}
?>