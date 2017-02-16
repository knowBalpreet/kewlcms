<?php

	class Authenticate extends MY_Controller{
		public function login(){
			//Validation Rules
			$this->form_validation->set_rules('username','Username','trim|required|min_length[4]|xss_clean');
			$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|xss_clean');

			if ($this->form_validation->run() == false) {
				//Views
				$this->load->view('admin/layouts/login');
				
			}else{
				//Get from post
				
					$username = $this->input->post('username');
					$password = md5($this->input->post('password'));

					//Validate username and password
					$user_id = $this->Authenticate_model->login_user($username, $password);

					if ($user_id) {
						$user_data = array('user_id' => $user_id,'username' => $username,'logged_in' =>true );

						//Set session userdata
						$this->session->set_userdata($user_data);

						//Set message
						$this->session->set_flashdata('pass_login', 'You are now logged in');
						redirect('admin/dashboard');
					}
			}
		}

		public function logout(){
			//unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			$this->session->sess_destroy();

			//Set Message
			$this->session->set_flashdata('logged_out','You have been logged out.');
			redirect('admin/login');
		}
	}
?>