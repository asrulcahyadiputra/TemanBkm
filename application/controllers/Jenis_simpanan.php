<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_simpanan extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_simpanan');
	}

	public function index()
	{
		$data = [
			'title'	=> "TemanBKM",
			'jenis'	=> $this->M_simpanan->get_jenis(),
			'kode'	=> $this->M_simpanan->id_jenis(),
			'level'		=> 0,
			'menu'	=> $this->M_menu->get_menu()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('master/simpanan/index');
		$this->load->view('templates/footer');
	}
	public function store()
	{
		$this->M_simpanan->store_jenis();
		$this->session->set_flashdata('sukses', 'Jenis Simpanan Berhasil di Tambahkan !');
		redirect('Jenis_simpanan');
	}
	public function update($id)
	{
		$data = [
			'title'	=> "TemanBKM",
			'jenis'	=> $this->M_simpanan->select_jenis($id),
			'level'		=> 0,
			'menu'	=> $this->M_menu->get_menu()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('master/simpanan/edit_jenis');
		$this->load->view('templates/footer');
	}
	public function edit()
	{
		$this->M_simpanan->edit_jenis();
		$this->session->set_flashdata('sukses', 'Jenis Simpanan Berhasil di Update!');
		redirect('Jenis_simpanan');
	}
}

/* End of file Jenis_simpanan.php */
