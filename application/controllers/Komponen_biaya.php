<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Komponen_biaya extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_komponen');
	}

	public function index()
	{
		$data = [
			'title'	=> "TemanBKM",
			'kode'	=> $this->M_komponen->id_komponen(),
			'komponen' => $this->M_komponen->get_komponen()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('master/komponen_biaya/index');
		$this->load->view('templates/footer');
	}
	public function store()
	{
		$this->M_komponen->store();
		$this->session->set_flashdata('sukses', 'Komponen Biaya Berhasil di Tambahkan !');
		redirect('Komponen_biaya');
	}
	public function update($id)
	{
		$data = [
			'title'	=> "TemanBKM",
			'komponen' => $this->M_komponen->select_komponen($id)
		];
		$this->load->view('templates/header', $data);
		$this->load->view('master/komponen_biaya/edit_komponen');
		$this->load->view('templates/footer');
	}
	public function edit($id)
	{
		$this->M_komponen->update($id);
		$this->session->set_flashdata('sukses', 'Komponen Biaya Berhasil di Update !');
		redirect('Komponen_biaya');
	}
}

/* End of file Komponen_biaya.php */
