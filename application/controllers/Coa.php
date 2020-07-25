<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Coa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_coa');
	}


	public function index()
	{
		$data = [
			'title'	=> "TemanBKM",
			'header'	=> $this->M_coa->get_header(),
			'sub'	=> $this->M_coa->get_sub_header_all(),
			'coa'	=> $this->M_coa->get_coa(),
			'level'	=> 0,
			'menu'	=> $this->M_menu->get_menu()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('master/coa/index');
		$this->load->view('templates/footer');
	}
	public function sub_header()
	{
		$id = $this->input->post('id');
		$data = $this->M_coa->get_sub_header($id);
		echo json_encode($data);
	}
	public function insert()
	{
		$rules = [
			[
				'field'		=> 'kode_akun',
				'label'		=> 'Kode Akun',
				'rules'		=> 'required|is_unique[coa.kode_akun]|max_length[4]|numeric',
				'errors'		=> [
					'required'		=> '%s wajib di isi',
					'is_unique'		=> '%s Sudah ditambahkan, masukkan akun yang lain',
					'max_length'		=> "%s Maksimal 4 Angka",
					'numeric'			=> "%s Hanya angka"
				]
			],
			[
				'field'		=> 'akun',
				'label'		=> 'Nama Akun',
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> '%s wajib di isi',
				]
			],
			[
				'field'		=> 'header',
				'label'		=> 'Header Akun',
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> '%s wajib di isi',
				]
			],
			[
				'field'		=> 'sub_header',
				'label'		=> 'Sub Header Akun',
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> '%s wajib di isi',
				]
			],
			[
				'field'		=> 'pos',
				'label'		=> 'POs Akun',
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> '%s wajib di isi',
				]
			],
		];
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == false) {
			$data = [
				'title'	=> "TemanBKM",
				'coa'	=> $this->M_coa->get_coa(),
				'level'	=> 0,
				'menu'	=> $this->M_menu->get_menu()
			];
			$this->load->view('templates/header', $data);
			$this->load->view('master/coa/add_coa');
			$this->load->view('templates/footer');
		} else {
			$this->M_coa->store();
			$this->session->set_flashdata('sukses', 'Charts Of Account Berhasil Ditambahkan');
			redirect('Coa/insert');
		}
	}
	public function update($id)
	{
		$rules = [

			[
				'field'		=> 'akun',
				'label'		=> 'Nama Akun',
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> '%s wajib di isi',
				]
			],
			[
				'field'		=> 'header',
				'label'		=> 'Header Akun',
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> '%s wajib di isi',
				]
			],
			[
				'field'		=> 'sub_header',
				'label'		=> 'Sub Header Akun',
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> '%s wajib di isi',
				]
			],
			[
				'field'		=> 'pos',
				'label'		=> 'POs Akun',
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> '%s wajib di isi',
				]
			],
		];
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == false) {
			$data = [
				'title'	=> "TemanBKM",
				'coa'	=> $this->M_coa->get_coa(),
				'e'		=> $this->M_coa->select_coa($id),
				'level'	=> 0,
				'menu'	=> $this->M_menu->get_menu()
			];
			$this->load->view('templates/header', $data);
			$this->load->view('master/coa/edit_coa');
			$this->load->view('templates/footer');
		} else {
			$this->M_coa->update($id);
			$this->session->set_flashdata('sukses', 'Charts Of Account Berhasil Diupdate');
			redirect('Coa');
		}
	}
}

/* End of file Coa.php */
