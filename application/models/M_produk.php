<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_produk extends CI_Model
{

	public function id_produk_simpanan()
	{
		$this->db->select('RIGHT(p_simpanan.id_p_simpanan,4) as id_simpanan', FALSE);
		$this->db->order_by('id_simpanan', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('p_simpanan');  //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = intval($data->id_simpanan) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}

		$batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodetampil = "PS" . "-" . $batas;  //format kode
		return $kodetampil;
	}
	public function get_produk()
	{
		return $this->db->get('p_simpanan')->result();
	}
	public function store()
	{
		$id = $this->input->post('id_p_simpanan');
		$nama_simpanan = $this->input->post('nama_simpanan');
		$awal_minimal = intval(preg_replace("/[^0-9]/", "", $this->input->post('awal_minimal')));
		$setoran_minimal = intval(preg_replace("/[^0-9]/", "", $this->input->post('setoran_minimal')));
		$saldo_minimal = intval(preg_replace("/[^0-9]/", "", $this->input->post('saldo_minimal')));
		$biaya_adm = intval(preg_replace("/[^0-9]/", "", $this->input->post('biaya_adm')));
		$biaya_tutup = intval(preg_replace("/[^0-9]/", "", $this->input->post('biaya_tutup')));
		$bunga = $this->input->post('bunga');
		$data = [
			'id_p_simpanan'		=> $id,
			'nama_simpanan'		=> $nama_simpanan,
			'awal_minimal'			=> $awal_minimal,
			'setoran_minimal'		=> $setoran_minimal,
			'saldo_minimal'		=> $saldo_minimal,
			'biaya_adm'			=> $biaya_adm,
			'biaya_tutup'			=> $biaya_tutup,
			'bunga'				=> $bunga
		];
		return $this->db->insert('p_simpanan', $data);
	}
}

/* End of file M_produk.php */
