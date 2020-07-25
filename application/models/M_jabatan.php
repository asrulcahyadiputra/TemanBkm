<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_jabatan extends CI_Model
{
	// generate id jabatan
	public function id_invoice()
	{
		$this->db->select('RIGHT(master_jabatan.id_jabatan,4) as id_jabatan', FALSE);
		$this->db->order_by('id_jabatan', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('master_jabatan');  //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = intval($data->id_jabatan) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}

		$batas = str_pad($kode, 4, "0", STR_PAD_LEFT);

		$kodetampil = "JBT" . "-" . $batas;  //format kode
		return $kodetampil;
	}
	public function get_jabatan()
	{
		return $this->db->get('master_jabatan')->result();
	}
	public function store()
	{
		$id 				= $this->input->post('id_jabatan');
		$jabatan 		 	= $this->input->post('jabatan');
		$pokok 			= intval(preg_replace("/[^0-9]/", "", $this->input->post('gaji_pokok')));
		$thr 			= intval(preg_replace("/[^0-9]/", "", $this->input->post('thr')));
		$tunjangan_lain 	= intval(preg_replace("/[^0-9]/", "", $this->input->post('tunjangan_lain')));

		$data = [
			'id_jabatan'		=> $id,
			'jabatan'			=> $jabatan,
			'gaji_pokok'		=> $pokok,
			'thr'			=> $thr,
			'tunjangan_lain'	=> $tunjangan_lain
		];
		return $this->db->insert('master_jabatan', $data);
	}
}

/* End of file M_jabatan.php */
