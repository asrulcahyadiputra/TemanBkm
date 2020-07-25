<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_anggota');
	}


	public function index()
	{
		$data = [
			'title'				=> 'TemanBKM',
			'level'				=> 1,
			'anggota_tetap'		=> $this->M_anggota->get_anggota_aktif(), //status 1
			'anggota_calon'		=> $this->M_anggota->get_anggota_calon(), // status 0
			'anggota_blokir'		=> $this->M_anggota->get_anggota_blokir(), // status 2
		];
		$this->load->view('templates/header', $data);
		$this->load->view('master/anggota/index');
		$this->load->view('templates/footer');
	}
	public function updated($id)
	{
		$data = [
			'status'		=> 2
		];
		$this->db->where('id_anggota', $id);
		$this->db->update('anggota', $data);
		// $this->session->set_flashdata('sukses', 'Anggota Berhasil di Non Aktifkan');
		// redirect('Anggota');
	}
	public function activated($id)
	{
		$data = [
			'status'		=> 1
		];
		$this->db->where('id_anggota', $id);
		$this->db->update('anggota', $data);
		// $this->session->set_flashdata('sukses', 'Anggota Berhasil di Non Aktifkan');
		// redirect('Anggota');
	}
}

/* End of file Anggota.php */
