<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penyetoran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_anggota');
		$this->load->model('M_rekening');
		$this->load->model('M_penyetoran');
	}


	public function index()
	{
		$data = [
			'title'		=> 'TemanBKM',
			'anggota'		=> $this->M_anggota->get_anggota_aktif(),
			'level'		=> 1,
			'menu'	=> $this->M_menu->get_menu()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/penyetoran/index');
		$this->load->view('templates/footer');
	}
	public function get_rekening()
	{
		$id = $this->input->post('id');
		$data = $this->M_rekening->get_rekening_for_list($id);
		echo json_encode($data);
	}
	public function get_rekening1()
	{
		$id = $this->input->post('id');
		$data = $this->M_rekening->get_rekening_for_list1($id);
		echo json_encode($data);
	}
	public function get_produk()
	{
		$id = $this->input->post('id');
		$data = $this->M_rekening->get_produk($id);
		echo json_encode($data);
	}
	public function store()
	{
		$this->M_penyetoran->store();
	}
}

/* End of file Penyetoran.php */
