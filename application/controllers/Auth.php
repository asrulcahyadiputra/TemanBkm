<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{

		$data = [
			'title'	=> 'TemanBKM'
		];
		$this->load->view('templates/login', $data);
	}
}

/* End of file Auth.php */
