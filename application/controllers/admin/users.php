<?php

	class Users extends MY_Controller{
			public function __construct(){
			parent::__construct();

			//Access Control
			if (!$this->session->userdata('logged_in')) {
				redirect('admin/login');
			}
		}
			//Get Users
		public function index(){

			$data['users'] = $this->User_model->get_users();

			//Views
			$data['main_content'] = 'admin/users/index';
			$this->load->view('admin/layouts/main',$data);			
		}	

		public function add(){
			//Validation Rules
			$this->form_validation->set_rules('first_name','First Name','trim|required|min_length[4]|xss_clean');
			$this->form_validation->set_rules('last_name','Last Name','trim|required|min_length[4]|xss_clean');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|is_unique[users.email]');
			$this->form_validation->set_rules('username','Username','trim|required|min_length[3]|is_unique[users.username]');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[password]');

			$data['groups'] = $this->User_model->get_groups();

			if ($this->form_validation->run() == false) {
				//Views
				$data['main_content'] = 'admin/users/add';
				$this->load->view('admin/layouts/main',$data);
			}else{
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password')),
					'group_id' => $this->input->post('group'),
					'email' => $this->input->post('email')
					);

				//table insert
				$this->User_model->insert($data);

				//Create Message
				$this->session->set_flashdata('user_saved','User has been saved');

				//Redirect to pages
				redirect('admin/users');
			}
		}	

		public function edit($id){
			//Validation Rules
			$this->form_validation->set_rules('first_name','First Name','trim|required|min_length[4]|xss_clean');
			$this->form_validation->set_rules('last_name','Last Name','trim|required|min_length[4]|xss_clean');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
			$this->form_validation->set_rules('password','Password','required');

			$data['groups'] = $this->User_model->get_groups();

			$data['user'] = $this->User_model->get_user($id);

			if ($this->form_validation->run() == false) {
				//Views
				$data['main_content'] = 'admin/users/edit';
				$this->load->view('admin/layouts/main',$data);
			}else{
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password')),
					'group_id' => $this->input->post('group'),
					'email' => $this->input->post('email')
					);

				//table insert
				$this->User_model->update($data,$id);

				//Create Message
				$this->session->set_flashdata('user_saved','User has been saved');

				//Redirect to pages
				redirect('admin/users');
			}
			
		}
		//Delete method
		public function delete($id){
			//delete USer
			$this->User_model->delete($id);

			//create message
			$this->session->set_flashdata('user_deleted', 'User has been deleted');

			//Redirect to articles
			redirect('admin/users');
		}
			
	}
?>