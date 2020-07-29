<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kas_masuk extends CI_Controller
{

	public function index()
	{
		$data = [
			'title'		=> "TemanBkm",
			'level'		=> 1,
			'menu'		=> $this->M_menu->get_menu()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/kas/masuk/index', $data);
		$this->load->view('templates/footer', $data);
	}
}

/* End of file Kas_masuk.php */
