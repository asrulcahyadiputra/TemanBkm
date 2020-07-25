<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penarikan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_anggota');
		$this->load->model('M_rekening');
		$this->load->model('M_penarikan');
	}


	public function index()
	{
		$data = [
			'title'	=> 'TemanBKM',
			'anggota'		=> $this->M_anggota->get_anggota_aktif(),
			'level'		=> 1
		];
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/penarikan/index');
		$this->load->view('templates/footer');
	}
	public function get_produk()
	{
		$id = $this->input->post('id');
		$data = $this->M_rekening->get_produk_penarikan($id);
		echo json_encode($data);
	}
	public function store()
	{
		$this->M_penarikan->store();
	}
}

/* End of file Penarikan.php */
