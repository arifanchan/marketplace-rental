<?php
class Data_type extends CI_Controller
{

	public function index()
	{
		$data['type'] = $this->rental_model->get_data('type')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/Data_type', $data);
		$this->load->view('templates_admin/footer');
	}
	public function tambah_type()
	{
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_tambah_type');
		$this->load->view('templates_admin/footer');
	}
	public function tambah_type_aksi()
	{
		$this->rental_model->admin_login();
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah_type();
		} else {
			$kode_type = $this->input->post('kode_type');
			$nama_type = $this->input->post('nama_type');

			$data = array(
				'kode_type' => $kode_type,
				'nama_type' => $nama_type
			);

			$this->rental_model->insert_data($data, 'type');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  Data Type Berhasil Ditambahkan
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			redirect('admin/data_type');
		}
	}
	public function _rules()
	{
		$this->form_validation->set_rules('kode_type', 'Kode Type', 'required');
		$this->form_validation->set_rules('nama_type', 'Nama Type', 'required');
	}

}
?>
