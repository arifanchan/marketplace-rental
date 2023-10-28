<?php
	
	class Dashboard extends CI_Controller{
		public function index(){

			$this->load->view('templates_customer/header');
			$this->load->view('customer/dashboard', $data);
			$this->load->view('templates_customer/footer');
		}

	}
?>