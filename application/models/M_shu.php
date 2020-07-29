<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_shu extends CI_Model
{
	public function id_master_shu()
	{
		$this->db->select('RIGHT(master_shu.id_shu,4) as id_shu', FALSE);
		$this->db->order_by('id_shu', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('master_shu');  //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = intval($data->id_shu) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}

		$batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodetampil = "MSH" . "-" . $batas;  //format kode
		return $kodetampil;
	}

	public function get_master_shu()
	{
		return $this->db->get('master_shu')->result();
	}
	public function store_master()
	{
		$data = [
			'id_shu'		=> $this->input->post('id_shu'),
			'komponen'	=> $this->input->post('komponen'),
			'persentase'	=> $this->input->post('persentase'),
			'tahun'		=> $this->input->post('tahun'),
			'keterangan'	=> $this->input->post('keterangan')
		];
		return $this->db->insert('master_shu', $data);
	}
}

/* End of file M_shu.php */
