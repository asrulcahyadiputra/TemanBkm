<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
	public function get_user()
	{
		return $this->db->get('user')->result();
	}
	public function store()
	{
		$data = [
			'nama'		=> $this->input->post('nama'),
			'username'	=> $this->input->post('username'),
			'role'		=> $this->input->post('role'),
			'password'	=> password_hash('123456', PASSWORD_DEFAULT),
			'foto'		=> 'default-user.png'
		];
		$this->db->insert('user', $data);
	}
}

/* End of fils M_user.php */
