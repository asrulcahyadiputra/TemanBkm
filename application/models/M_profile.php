<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_profile extends CI_Model
{
	public function get_profile()
	{
		return $this->db->get('profil_bkm')->row_array();
	}
	public function update()
	{
		$data = [
			'nama_bkm'	=> $this->input->post('nama_bkm'),
			'alamat'		=> $this->input->post('alamat'),
			'no_telp'		=> $this->input->post('no_telp'),
			'email'		=> $this->input->post('email'),
			'email'		=> $this->input->post('email'),
			'website'		=> $this->input->post('website'),
		];
		return $this->db->update('profil_bkm', $data);
	}
}

/* End of file M_profile.php */
