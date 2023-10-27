<?php


class Data_mobil extends CI_Controller{
	public function index(){
		// $this->rental_model->admin_login();
		$data['mobil'] = $this->rental_model->get_data('mobil')->result();
		$data['type'] = $this->rental_model->get_data('type')->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/Data_mobil',$data);
		$this->load->view('templates_admin/footer');
	}
}