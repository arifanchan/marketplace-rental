<?php

class Dashboard extends CI_Controller
{
	public function index()
	{
		// $data['mobil'] = $this->rental_model->get_data('mobil')->result();
		$data['mobil'] = $this->db->query("SELECT * FROM mobil mb, type tp WHERE mb.kode_type=tp.kode_type")->result();

		$this->load->view('templates_customer/header');
		$this->load->view('customer/dashboard', $data);
		$this->load->view('templates_customer/footer');
	}
	public function detail_mobil($id)
	{

		$data['detail'] = $this->rental_model->ambil_id_mobil($id);
		$this->load->view('templates_customer/header');
		$this->load->view('customer/detail_mobil', $data);
		$this->load->view('templates_customer/footer');
	}

}
?>
