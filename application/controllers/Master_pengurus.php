<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Master_pengurus extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pengurus');
		$this->load->model('M_jabatan');
	}


	public function index()
	{
		$data = [
			'title'		=> "TemanBKM",
			'level'		=> 1,
			'pengurus'	=> $this->M_pengurus->get_pengurus(),
			'menu'	=> $this->M_menu->get_menu()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('master/pengurus/index');
		$this->load->view('templates/footer');
	}
	public function insert()
	{
		$data = [
			'title'		=> "TemanBKM",
			'level'		=> 1,
			'id_pengurus'	=> $this->M_pengurus->id_pengurus(),
			'jabatan'		=> $this->M_jabatan->get_jabatan(),
			'menu'	=> $this->M_menu->get_menu()

		];
		$this->load->view('templates/header', $data);
		$this->load->view('master/pengurus/add');
		$this->load->view('templates/footer');
	}
	public function update($id)
	{
		$data = [
			'title'		=> "TemanBKM",
			'level'		=> 1,
			'pengurus'	=> $this->M_pengurus->select_pengurus($id),
			'jabatan'		=> $this->M_jabatan->get_jabatan(),
			'menu'	=> $this->M_menu->get_menu()

		];
		// echo "<pre>";
		// echo var_export($data);
		// echo "</pre>";
		// die;
		$this->load->view('templates/header', $data);
		$this->load->view('master/pengurus/edit');
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$rules	= [
			[
				'field'		=> 'nik',
				'label'		=> "NIK",
				'rules'		=> 'required|is_unique[pengurus.nik]',
				'errors'		=> [
					'required'		=> "%s Wajib di isi",
					'is_unique'		=> "%s Telah digunakan"
				]
			],
			[
				'field'		=> 'nama_pengurus',
				'label'		=> "Nama Pengurus",
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> "%s Wajib di isi"
				]
			],
			[
				'field'		=> 'no_telp',
				'label'		=> "Nama Pengurus",
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> "%s Wajib di isi"
				]
			],
			[
				'field'		=> 'jenis_kelamin',
				'label'		=> "Jenis Kelamin",
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> "%s Wajib di isi"
				]
			],
			[
				'field'		=> 'tempat_lahir',
				'label'		=> "Jenis Kelamin",
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> "%s Wajib di isi"
				]
			],
			[
				'field'		=> 'tgl_lahir',
				'label'		=> "Jenis Kelamin",
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> "%s Wajib di isi"
				]
			],
			[
				'field'		=> 'id_jabatan',
				'label'		=> "Jabatan",
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> "%s Wajib di isi"
				]
			],
			[
				'field'		=> 'alamat',
				'label'		=> "Alamat",
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> "%s Wajib di isi"
				]
			],
		];
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == false) {
			$this->insert();
		} else {
			$this->M_pengurus->store();
			$this->session->set_flashdata('sukses', 'Pengurus Berhasil di Tambahkan');
			redirect('Master_pengurus');
		}
	}
	public function edit()
	{
		$rules	= [
			[
				'field'		=> 'nik',
				'label'		=> "NIK",
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> "%s Wajib di isi",
					'is_unique'		=> "%s Telah digunakan"
				]
			],
			[
				'field'		=> 'nama_pengurus',
				'label'		=> "Nama Pengurus",
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> "%s Wajib di isi"
				]
			],
			[
				'field'		=> 'no_telp',
				'label'		=> "Nama Pengurus",
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> "%s Wajib di isi"
				]
			],
			[
				'field'		=> 'jenis_kelamin',
				'label'		=> "Jenis Kelamin",
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> "%s Wajib di isi"
				]
			],
			[
				'field'		=> 'tempat_lahir',
				'label'		=> "Jenis Kelamin",
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> "%s Wajib di isi"
				]
			],
			[
				'field'		=> 'tgl_lahir',
				'label'		=> "Jenis Kelamin",
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> "%s Wajib di isi"
				]
			],
			[
				'field'		=> 'id_jabatan',
				'label'		=> "Jabatan",
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> "%s Wajib di isi"
				]
			],
			[
				'field'		=> 'alamat',
				'label'		=> "Alamat",
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> "%s Wajib di isi"
				]
			],
		];
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == false) {
			$id = $this->input->post('id_pengurus');
			$this->update($id);
		} else {
			$this->M_pengurus->update();
			$this->session->set_flashdata('sukses', 'Pengurus Berhasil di Perbaharui');
			redirect('Master_pengurus');
		}
	}
	public function ban($id, $status)
	{
		$data = [
			'status'		=> $status
		];
		$this->db->where('id_pengurus', $id);
		$this->db->update('pengurus', $data);
		$this->session->set_flashdata('sukses', 'Status Pengurus Berhasil di Perbaharui');
		redirect('Master_pengurus');
	}
}

/* End of file Master_pengurus.php */
