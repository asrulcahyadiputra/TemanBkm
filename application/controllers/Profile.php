<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_profile');
	}

	public function index()
	{
		$data = [
			'title'	=> "TemanBKM",
			'bkm'	=> $this->M_profile->get_profile(),
			'level'	=> 0,
			'menu'	=> $this->M_menu->get_menu()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('master/profile/index');
		$this->load->view('templates/footer');
	}
	public function update()
	{
		$this->M_profile->update();
		$this->session->set_flashdata('sukses', 'Profil BKM Berhasil Di Perbaharui');

		redirect('Profile');
	}
}

/* End of file Dashboard.php */
