<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_laporan');
	}


	public function index()
	{
		$data = [
			'title' 	=> 'TemanBKM',
			'bkm' 	=> $this->M_laporan->get_profile(),
			'jurnal'	=> $this->M_laporan->get_jurnal(),
			'row'	=> $this->M_laporan->get_row(),
			'level'	=> 1,
			'menu'	=> $this->M_menu->get_menu()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('laporan/akuntansi/jurnal');
		$this->load->view('templates/footer');
	}
}

/* End of file Jurnal.php */
