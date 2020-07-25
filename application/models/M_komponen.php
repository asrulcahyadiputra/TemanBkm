<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_komponen extends CI_Model
{
	public function id_komponen()
	{
		$this->db->select('RIGHT(komponen_biaya.id_komponen,4) as id_komponen', FALSE);
		$this->db->order_by('id_komponen', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('komponen_biaya');  //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = intval($data->id_komponen) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}

		$batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodetampil = "KM" . "-" . $batas;  //format kode
		return $kodetampil;
	}
	public function get_komponen()
	{
		return $this->db->get('komponen_biaya')->result();
	}
	public function select_komponen($id)
	{
		return $this->db->get_where('komponen_biaya', ['id_komponen' => $id])->row_array();
	}
	public function store()
	{
		$data = [
			'id_komponen'		=> $this->input->post('id_komponen'),
			'komponen_biaya'	=> $this->input->post('komponen_biaya'),
			'nominal'			=> intval(preg_replace("/[^0-9]/", "", $this->input->post('nominal'))),
			'tipe'			=> $this->input->post('tipe'),
		];
		return $this->db->insert('komponen_biaya', $data);
	}
	public function update($id)
	{
		$data = [
			'komponen_biaya'	=> $this->input->post('komponen_biaya'),
			'nominal'			=> intval(preg_replace("/[^0-9]/", "", $this->input->post('nominal'))),
			'tipe'			=> $this->input->post('tipe'),
		];
		$this->db->where('id_komponen', $id);

		return $this->db->update('komponen_biaya', $data);
	}
}

/* End of file M_komponen.php */
