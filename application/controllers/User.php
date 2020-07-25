<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
	}

	public function index()
	{
		$data = [
			'title'		=> 'TemanBKM',
			'level'		=> 0,
			'user'		=> $this->M_user->get_user()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('master/user/index');
		$this->load->view('templates/footer');
	}
	public function store()
	{
		$this->M_user->store();
		$this->session->set_flashdata('sukses', 'User Berhasil di Tambahkan');
		redirect('User');
	}
	public function block($id, $status)
	{
		$data = [
			'status'		=> $status
		];
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
		$this->session->set_flashdata('sukses', 'Status User Berhasil di Perbaharui');
		redirect('User');
	}
}

/* End of file User.php */
