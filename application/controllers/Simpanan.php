<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Simpanan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_simpanan');
	}


	public function index()
	{
		$data = [
			'title'		=> "TemanBKM",
			'simpanan'	=> $this->M_simpanan->get_simpanan(),
			'level'		=> 1
		];
		$this->load->view('templates/header', $data);
		$this->load->view('simpanan/index');
		$this->load->view('templates/footer');
	}
}

/* End of file Simpanan.php */
