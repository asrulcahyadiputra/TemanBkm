<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_penarikan extends CI_Model
{

	public function id_simpanan()
	{
		$this->db->select('RIGHT(simpanan.id_simpanan,6) as id_simpanan', FALSE);
		$this->db->order_by('id_simpanan', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('simpanan');  //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = intval($data->id_simpanan) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}

		$batas = str_pad($kode, 6, "0", STR_PAD_LEFT);
		$date = strtotime(date('Y-m-d'));
		$kodetampil = "TRX-PNK" . "-" . $date . '-' . $batas;  //format kode
		return $kodetampil;
	}
	private function _rekening($rek)
	{
		$this->db->select('rekening.no_rekening,anggota.nama_anggota,sum(if(ket="dr",detail_rekening.nominal,0)) as s_debet, sum(if(ket="cr",detail_rekening.nominal,0)) as s_kredit,p_simpanan.nama_simpanan,rekening.status,rekening.tgl_pembuatan,p_simpanan.saldo_minimal,p_simpanan.penarikan')
			->from('detail_rekening')
			->join('rekening', 'rekening.no_rekening=detail_rekening.no_rekening')
			->join('p_simpanan', 'p_simpanan.id_p_simpanan=rekening.id_p_simpanan')
			->join('anggota', 'anggota.id_anggota=rekening.id_anggota')
			->where('rekening.no_rekening', $rek)
			->group_by('rekening.no_rekening');
		return $this->db->get()->row_array();
	}
	private function _saldo_rekening($rek)
	{
		$this->db->select('detail_rekening.saldo')
			->from('detail_rekening')
			->join('rekening', 'rekening.no_rekening=detail_rekening.no_rekening')
			->join('p_simpanan', 'p_simpanan.id_p_simpanan=rekening.id_p_simpanan')
			->join('anggota', 'anggota.id_anggota=rekening.id_anggota')
			->where('rekening.no_rekening', $rek)
			->order_by('detail_rekening.id_transaksi', 'DESC')
			->limit(1);
		return $this->db->get()->row_array();
	}
	public function store()
	{

		$nominal = intval(preg_replace("/[^0-9]/", "", $this->input->post('nominal')));
		$max = intval(preg_replace("/[^0-9]/", "", $this->input->post('saldo')));
		$no_rek  = $this->input->post('no_rekening');
		$rekening = $this->_rekening($no_rek);
		$rek = $this->_saldo_rekening($no_rek);
		if ($nominal > $max) {
			$this->session->set_flashdata('sukses', 'warning3');
			redirect('Penarikan');
		} else {
			if ($rekening['penarikan'] == 0) {
				$this->session->set_flashdata('sukses', 'warning4');
				redirect('Penarikan');
			} else {
				$simpanan = [
					'id_simpanan'		=> $this->id_simpanan(),
					'id_anggota'		=> $this->input->post('id_anggota'),
					'tgl'			=> date('Y-m-d'),
					'id_jenis'		=> 'JS-0003',
					'nominal'			=> $nominal,
					'ket'			=> 'cr',
				];
				$detail_rekening = [
					'no_rekening'		=> $no_rek,
					'tgl_setor'		=> date('Y-m-d'),
					'nominal'			=> $nominal,
					'saldo'			=> $rek['saldo'] - $nominal,
					'ket'			=> 'cr'
				];
				$debet = [
					'kode_akun'		=> '3105',
					'tgl_jurnal'		=> date('Y-m-d'),
					'ref'			=> $this->id_simpanan(),
					'nominal'			=> $nominal,
					'posisi_dr_cr'		=> 'dr'
				];
				$kredit = [
					'kode_akun'		=> '1101',
					'tgl_jurnal'		=> date('Y-m-d'),
					'ref'			=> $this->id_simpanan(),
					'nominal'			=> $nominal,
					'posisi_dr_cr'		=> 'cr'
				];
				$this->db->trans_start();
				$this->db->insert('simpanan', $simpanan);
				$this->db->insert('detail_rekening', $detail_rekening);
				$this->db->insert('jurnal', $debet);
				$this->db->insert('jurnal', $kredit);
				$this->db->trans_complete();
				$this->session->set_flashdata('sukses', 'Penarikan Berhasil');
				redirect('Penyetoran');
			}
		}
	}
}

/* End of file M_penarikan.php */
