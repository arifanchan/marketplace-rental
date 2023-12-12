<?php
	
	class Data_mobil extends CI_Controller{
		public function __construct() {
			parent::__construct();
			if ($this->session->userdata('role_id') == '3') {
				redirect('rental/dashboard');
			}
		}
		public function index(){

			$data['mobil'] = $this->rental_model->get_data('mobil')->result();
			$this->load->view('templates_customer/header');
			$this->load->view('customer/data_mobil', $data);
			$this->load->view('templates_customer/footer');
		}

		public function detail_mobil($id){

			$data['detail'] = $this->rental_model->ambil_id_mobil($id);
			$data['rental'] = $this->db->query("SELECT * FROM customer cs, mobil mb WHERE mb.nama_rental = cs.nama_rental AND mb.id_mobil = '$id'")->result();
			$this->load->view('templates_customer/header');
			$this->load->view('customer/detail_mobil', $data);
			$this->load->view('templates_customer/footer');
		}
	}
?>