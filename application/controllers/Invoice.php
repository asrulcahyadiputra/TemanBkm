<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_invoice');
	}

	public function index()
	{
		$data = [
			'title'		=> "TemanBKM",
			'level'		=> 0,
			'id_periode'	=> $this->M_invoice->id_periode(),
			'periode'		=> $this->M_invoice->get_periode()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/invoice/index');
		$this->load->view('templates/footer');
	}
	public function store_periode()
	{
		$periode = $this->input->post('periode');
		$validate = $this->db->get_where('periode_iuran_wajib', ['periode' => $periode])->row_array();
		if ($validate) {
			$this->session->set_flashdata('sukses', 'warning6');
			redirect('Invoice');
		} else {
			$this->M_invoice->store_periode();
			$this->session->set_flashdata('sukses', 'Invoice Berhasil di Generate');
			redirect('Invoice');
		}
	}
	public function detail($id)
	{
		$data = [
			'title'		=> "TemanBKM",
			'id'			=> $id,
			'level'		=> 1,

			'periode'		=> $this->M_invoice->select_periode($id),
			'd_periode'	=> $this->M_invoice->select_detail_periode($id),
			'anggota'		=> $this->M_invoice->get_anggota(),
			't_hari'		=> $this->M_invoice->select_total_hari($id),
			'wajib'		=> $this->M_invoice->get_jenis_simpanan()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/invoice/detail');
		$this->load->view('templates/footer');
	}
	public function invoice($periode, $anggota, $id)
	{
		$data = [
			'title'		=> "TemanBKM",
			'id'			=> $id,
			'id_periode'	=> $periode,
			'id_anggota'	=> $anggota,
			'level'		=> 1,
			'id_invoice'	=> $this->M_invoice->id_invoice(),
			'bkm'		=> $this->M_invoice->get_profil(),
			'anggota'		=> $this->M_invoice->select_anggota($anggota),
			'detail'		=> $this->M_invoice->one_detail_periode($id),
			'invoice'		=> $this->M_invoice->one_invoice($id),
			'wajib'		=> $this->M_invoice->get_jenis_simpanan(),
			'tunggakan'	=> $this->M_invoice->get_tunggakan($anggota, $id)

		];
		// echo "<pre>";
		// echo var_export($data['tunggakan']);
		// echo "</pre>";
		// die;
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/invoice/invoice');
		$this->load->view('templates/footer');
	}
	public function kirim($id_periode, $anggota, $id)
	{
		$periode		   	= $this->M_invoice->one_detail_periode($id);
		$jatuh_tempo      	= $periode['tgl_periode'];
		$tgl_minimal_kirim  = date('Y-m-d', strtotime('-3 days', strtotime($jatuh_tempo)));
		$tgl1		   	= strtotime($tgl_minimal_kirim);
		$tgl_sistem		= strtotime(date('Y-m-d'));
		if ($tgl_sistem < $tgl1) {
			// echo "<pre>";
			// echo var_export($tgl1);
			// echo "</pre>";
			// die;
			$this->session->set_flashdata('sukses', 'warning2');
			redirect('Invoice/invoice/' . $id_periode . '/' . $anggota . '/' . $id);
		} else {
		}
	}
}

/* End of file Invoice.php */
