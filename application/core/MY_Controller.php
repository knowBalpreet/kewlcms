<?php
	/**
	* Global Controller
	*/
	class MY_Controller extends CI_Controller{
		function __construct(){
			parent::__construct();
		
			//loop to get all settings in the "globals" table
			foreach ($this->Settings_model->get_global_settings() as $result) {
			 	$this->global_data[$result->key] = $result->value;
			 } 
		}

	}
?>