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


		public function pembayaran($id){
			$this->rental_model->admin_login();
			$where = array('id_rental' => $id);
			$data['pembayaran'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental='$id'")->result();
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/konfirmasi_pembayaran',$data);
			$this->load->view('templates_admin/footer');

		}

		public function cek_pembayaran(){
			$this->rental_model->admin_login();
			$id 				= $this->input->post('id_rental');
			$status_pembayaran	= $this->input->post('status_pembayaran');

			$data = array(
				'status_pembayaran'	=> $status_pembayaran
			);

			$where = array(
				'id_rental'		=> $id
			);

			$this->rental_model->update_data('transaksi',$data,$where);

			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Pembayaran telah dikonfirmasi
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('admin/transaksi');
		}


		public function download_pembayaran($id){
			$this->rental_model->admin_login();
			$this->load->helper('download');
			$filePembayaran = $this->rental_model->downloadPembayaran($id);
			$file = 'assets/upload/' . $filePembayaran['bukti_pembayaran'];
			force_download($file, NULL);
		}



		
	}

?>