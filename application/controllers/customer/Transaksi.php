<?php 

	class Transaksi extends CI_Controller{
		public function index(){

			$customer = $this->session->userdata('id_customer');
			$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_customer=cs.id_customer AND cs.id_customer='$customer' ORDER BY id_rental ASC")->result();
			$this->load->view('templates_customer/header');
			$this->load->view('customer/transaksi',$data);
			$this->load->view('templates_customer/footer');
		}
    }
?>