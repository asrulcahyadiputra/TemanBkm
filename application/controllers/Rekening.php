<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_rekening');
		$this->load->model('M_anggota');
	}

	public function index()
	{
		$data = [
			'title'		=> 'TemanBKM',
			'rekening'	=> $this->M_rekening->get_rekening(),
			'level'		=> 1
		];
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/rekening/index');
		$this->load->view('templates/footer');
	}
	public function select($no_rek)
	{
		$data = [
			'title'		=> 'TemanBKM',
			'rek'		=> $this->M_rekening->select_rekening($no_rek),
			'detail'		=> $this->M_rekening->select_detail_rekening($no_rek),
			'sl'			=> $this->M_rekening->select_saldo($no_rek),
			'level'		=> 1
		];
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/rekening/detail');
		$this->load->view('templates/footer');
	}
	public function insert()
	{
		$id = $this->input->post('anggota');
		if ($id == null) {
			$data = [
				'title'	=> 'TemanBKM',
				'anggota'	=> $this->M_anggota->get_anggota_aktif(),
				'status'	=> 0,
				'level'	=> 0
			];
			$this->load->view('templates/header', $data);
			$this->load->view('transaksi/rekening/add');
			$this->load->view('templates/footer');
		} else {
			$data = [
				'title'	=> 'TemanBKM',
				'anggota'	=> $this->M_anggota->get_anggota_aktif(),
				'no_rek'	=> $this->M_rekening->no_rek(),
				'status'	=> 1,
				'ag'		=> $this->M_anggota->select_anggota_aktif($id),
				'jenis'	=> $this->M_rekening->get_jenis_produk(),
				'level'		=> 1
			];
			$this->load->view('templates/header', $data);
			$this->load->view('transaksi/rekening/add');
			$this->load->view('templates/footer');
		}
	}
	public function select_produk()
	{
		$id = $this->input->post('id');
		$data = $this->M_rekening->select_jenis_produk($id);
		echo json_encode($data);
	}
	public function store()
	{
		$this->M_rekening->store();
	}
	public function generate()
	{
		$data = [
			'title'		=> 'TemanBKM',
			'periode'		=> $this->M_rekening->get_periode_generate_bunga(),
			'level'		=> 0
		];
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/rekening/bunga');
		$this->load->view('templates/footer');
	}
	public function store_periode()
	{
		$periode = $this->input->post('periode');
		$tahun = date('Y', strtotime($periode));
		$bulan = date('m', strtotime($periode));
		$periode = $this->db->get_where('periode_bunga_tabungan', ['month(periode)' => $bulan, 'year(periode)' => $tahun])->row_array();
		if ($periode) {
			$this->session->set_flashdata('sukses', 'warning6');
			redirect('Rekening/generate');
		} else {
			$this->M_rekening->store_periode();
			$this->session->set_flashdata('sukses', 'Periode Berhasil di Buat');
			redirect('Rekening/generate');
		}
	}
	public function detail_periode($id, $periode)
	{

		$tahun = date('Y', strtotime($periode));
		$bulan = date('m', strtotime($periode));
		$day   = date('d', strtotime($periode));
		$data = [
			'title'		=> 'TemanBKM',
			'bulan'		=> $bulan,
			'tahun'		=> $tahun,
			'hari'		=> $day,
			'id'			=> $id,
			'rekening'	=> $this->M_rekening->search_rekening(),
			'listing'		=> $this->M_rekening->search_rekening_for_list(),
			'level'		=> 0

		];
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/rekening/detail_periode');
		$this->load->view('templates/footer');
	}
	public function detail_bunga($id, $periode)
	{

		$tahun = date('Y', strtotime($periode));
		$bulan = date('m', strtotime($periode));
		$day   = date('d', strtotime($periode));
		$data = [
			'title'		=> 'TemanBKM',
			'bulan'		=> $bulan,
			'tahun'		=> $tahun,
			'hari'		=> $day,
			'id'			=> $id,
			'rekening'	=> $this->M_rekening->saldo_rekening($id, $periode),
			'level'		=> 1

		];
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/rekening/detail_bunga');
		$this->load->view('templates/footer');
	}
}

/* End of file Rekening.php */
