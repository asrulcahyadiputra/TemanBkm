<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Master_jabatan extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_jabatan');
	}

	public function index()
	{
		$data = [
			'title'		=> "TemanBKM",
			'level'		=> 1,
			'jabatan'		=> $this->M_jabatan->get_jabatan()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('master/pengurus/index');
		$this->load->view('templates/footer');
	}
	public function insert()
	{
		$data = [
			'title'		=> "TemanBKM",
			'id_jabatan'	=> $this->M_jabatan->id_invoice(),
			'level'		=> 1,
		];
		$this->load->view('templates/header', $data);
		$this->load->view('master/pengurus/add');
		$this->load->view('templates/footer');
	}
	public function update($id)
	{
		$data = [
			'title'		=> "TemanBKM",
			'jabatan'		=> $this->M_jabatan->select_jabatan($id),
			'level'		=> 1,
		];
		$this->load->view('templates/header', $data);
		$this->load->view('master/pengurus/edit');
		$this->load->view('templates/footer');
	}
	public function store()
	{
		$this->M_jabatan->store();
		$this->session->set_flashdata('sukses', 'Jabatan Berhasil di Tambahkan');
		redirect('Master_jabatan/insert');
	}
	public function edit()
	{
		$this->M_jabatan->update();
		$this->session->set_flashdata('sukses', 'Jabatan Berhasil di Perbaharui');
		redirect('Master_jabatan');
	}
}

/* End of file Master_jabatan.php */
