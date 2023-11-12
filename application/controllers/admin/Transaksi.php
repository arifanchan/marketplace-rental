<?php  


	class Transaksi extends CI_Controller{
		
		public function index(){
			$this->rental_model->admin_login();

			$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_customer=cs.id_customer")->result();
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/Data_transaksi',$data);
			$this->load->view('templates_admin/footer');
		}
  }
?>