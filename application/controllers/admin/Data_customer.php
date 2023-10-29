<?php

class Data_customer extends CI_Controller
{


	public function index()
	{
		$data['customer'] = $this->rental_model->get_data('customer')->result();

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/Data_customer', $data);
		$this->load->view('templates_admin/footer');
	}
	public function tambah_customer()
	{
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_tambah_customer');
		$this->load->view('templates_admin/footer');
	}
	public function tambah_customer_aksi()
	{

		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah_customer();
		} else {
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$alamat = $this->input->post('alamat');
			$gender = $this->input->post('gender');
			$no_telepon = $this->input->post('no_telepon');
			$no_ktp = $this->input->post('no_ktp');
			$role_id = $this->input->post('role_id');
			$nama_rental = $this->input->post('nama_rental');
			$password = md5($this->input->post('password'));

			$data = array(
				'nama' => $nama,
				'username' => $username,
				'alamat' => $alamat,
				'gender' => $gender,
				'no_telp' => $no_telepon,
				'no_ktp' => $no_ktp,
				'role_id' => $role_id,
				'nama_rental' => $nama_rental,
				'password' => $password
			);

			$this->rental_model->insert_data($data, 'customer');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Customer Berhasil Ditambahkan
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('admin/data_customer');
		}
	}
	public function _rules()
	{
		$this->form_validation->set_rules('nama', "Nama", 'required');
		$this->form_validation->set_rules('username', "Username", 'required');
		$this->form_validation->set_rules('alamat', "Alamat", 'required');
		$this->form_validation->set_rules('gender', "Gender", 'required');
		$this->form_validation->set_rules('no_telepon', "No. Telepon", 'required|numeric');
		$this->form_validation->set_rules('no_ktp', "No. KTP", 'required|numeric');
		$this->form_validation->set_rules('password', "Password", 'required');
	}

}
?>
