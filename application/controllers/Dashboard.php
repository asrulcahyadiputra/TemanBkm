<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		$data = [
			'title'	=> "TemanBKM",
			'level'	=> 0,
			'menu'	=> $this->M_menu->get_menu()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/dashboard');
		$this->load->view('templates/footer');
	}
}

/* End of file Dashboard.php */
