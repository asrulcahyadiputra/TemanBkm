<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_anggota');
		$this->load->model('M_pendaftaran');
	}


	public function index()
	{
		$data = [
			'title'		=> "TemanBKM",
			'id_anggota'	=> $this->M_anggota->id_anggota(),
			'level'		=> 1,
			'menu'	=> $this->M_menu->get_menu()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/pendaftaran/index');
		$this->load->view('templates/footer');
	}
	public function store()
	{
		$rulues = [
			[
				'field'		=> 'nik',
				'label'		=> 'NIK',
				'rules'		=> 'required|numeric|max_length[16]|is_unique[anggota.nik]',
				'errors'		=> [
					'required'		=> '%s Wajib di isi',
					'numeric'			=> '%s Hanya angka',
					'max_length'		=> '%s Maskimal 16 angka',
					'is_unique'		=> '%s Telahn terdaftar'
				]
			],
			[
				'field'		=> 'nama_anggota',
				'label'		=> 'Nama Anggota',
				'rules'		=> 'required|max_length[30]',
				'errors'		=> [
					'required'		=> '%s Wajib di isi',
					'max_length'		=> '%s Maskimal 30 karakter',
				]
			],
			[
				'field'		=> 'tempat_lahir',
				'label'		=> 'Tempat Lahir',
				'rules'		=> 'required|max_length[30]',
				'errors'		=> [
					'required'		=> '%s Wajib di isi',
					'max_length'		=> '%s Maskimal 30 karakter',
				]
			],
			[
				'field'		=> 'tgl_lahir',
				'label'		=> 'Tanggal Lahir',
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> '%s Wajib di isi',
				]
			],
			[
				'field'		=> 'no_telp',
				'label'		=> 'No Telepon / Hp',
				'rules'		=> 'required',
				'errors'		=> [
					'required'		=> '%s Wajib di isi',
				]
			],
		];
		$this->form_validation->set_rules($rulues);

		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$id = $this->input->post('id_anggota');
			$this->M_pendaftaran->store();
			$this->session->set_flashdata('sukses', 'Pendaftaran Berhasil Dilakukan');

			redirect('Pendaftaran/pembayaran/' . $id);
		}
	}
	public function pembayaran($id)
	{
		$data = [
			'title'		=> "TemanBKM",
			'id'			=> $id,
			'anggota'		=> $this->M_pendaftaran->select_anggota($id),
			'simpanan'	=> $this->M_pendaftaran->get_jenis_simpanan(),
			'komponen'	=> $this->M_pendaftaran->get_komponen_biaya(),
			'level'		=> 1,
			'menu'	=> $this->M_menu->get_menu()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/pendaftaran/pembayaran');
		$this->load->view('templates/footer');
	}
	public function bayar($id, $tkp, $id_tkj, $tkj)
	{
		$this->M_pendaftaran->bayar($id, $tkp, $id_tkj, $tkj);
		$this->session->set_flashdata('sukses', 'Status Anggota Berhasil di Aktifkan ');
		redirect('Pendaftaran');
	}
}
	
	/* End of file Pendaftaran.php */
