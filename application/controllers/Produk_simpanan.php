<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk_simpanan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_produk');
	}


	public function index()
	{
		$data = [
			'title'		=> "TemanBKM",
			'produk'		=> $this->M_produk->get_produk(),
			'level'		=> 1,
			'menu'		=> $this->M_menu->get_menu()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('master/produk/simpanan/index');
		$this->load->view('templates/footer');
	}
	public function insert()
	{
		$rules = [
			[
				'field'		=> 'nama_simpanan',
				'label'		=> 'Nama Simpanan',
				'rules'		=> 'required',
				'errors'		=> [
					'required'	=> '%s Wajib di isi'
				]
			],
			[
				'field'		=> 'awal_minimal',
				'label'		=> 'Minimal Setoran Awal',
				'rules'		=> 'required',
				'errors'		=> [
					'required'	=> '%s Wajib di isi'
				]
			],
			[
				'field'		=> 'setoran_minimal',
				'label'		=> 'Minimal Setoran Selanjutnya',
				'rules'		=> 'required',
				'errors'		=> [
					'required'	=> '%s Wajib di isi'
				]
			],
			[
				'field'		=> 'saldo_minimal',
				'label'		=> 'Saldo Minimal',
				'rules'		=> 'required',
				'errors'		=> [
					'required'	=> '%s Wajib di isi'
				]
			],
			[
				'field'		=> 'biaya_adm',
				'label'		=> 'Biaya Administrasi',
				'rules'		=> 'required',
				'errors'		=> [
					'required'	=> '%s Wajib di isi'
				]
			],
			[
				'field'		=> 'biaya_tutup',
				'label'		=> 'Biaya Tutup Rekening',
				'rules'		=> 'required',
				'errors'		=> [
					'required'	=> '%s Wajib di isi'
				]
			],
			[
				'field'		=> 'bunga',
				'label'		=> 'Bunga',
				'rules'		=> 'required|numeric',
				'errors'		=> [
					'required'	=> '%s Wajib di isi',
					'numeric'		=> '%s Hanya angka'
				]
			],
		];
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == false) {
			$data = [
				'title'		=> "TemanBKM",
				'kode'		=> $this->M_produk->id_produk_simpanan(),
				'level'		=> 0,
				'menu'		=> $this->M_menu->get_menu()

			];
			$this->load->view('templates/header', $data);
			$this->load->view('master/produk/simpanan/add');
			$this->load->view('templates/footer');
		} else {
			$this->M_produk->store();
			$this->session->set_flashdata('sukses', 'Produk Simpanan Berhasil di Simpan');
			redirect('Produk_simpanan');
		}
	}
}

/* End of file Produk_simpanan.php */
