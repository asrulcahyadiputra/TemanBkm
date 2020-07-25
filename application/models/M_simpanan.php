<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_simpanan extends CI_Model
{

	public function id_jenis()
	{
		$this->db->select('RIGHT(jenis_simpanan.id_jenis,4) as id_jenis', FALSE);
		$this->db->order_by('id_jenis', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('jenis_simpanan');  //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = intval($data->id_jenis) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}

		$batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodetampil = "JS" . "-" . $batas;  //format kode
		return $kodetampil;
	}
	public function get_jenis()
	{
		return $this->db->get_where('jenis_simpanan', ['status' => 1])->result();
	}
	public function select_jenis($id)
	{
		return $this->db->get_where('jenis_simpanan', ['id_jenis' => $id])->row_array();
	}
	public function store_jenis()
	{
		$id_jenis = $this->input->post('id_jenis');
		$nama = $this->input->post('nama_jenis');
		$nominal = intval(preg_replace("/[^0-9]/", "", $this->input->post('nominal')));
		$ket = $this->input->post('ket');
		$data = [
			'id_jenis'		=> $id_jenis,
			'nama_jenis'		=> $nama,
			'nominal'			=> $nominal,
			'ket'			=> $ket,
			'status'			=> 1
		];
		return $this->db->insert('jenis_simpanan', $data);
	}
	public function edit_jenis()
	{
		$id_jenis = $this->input->post('id_jenis');
		$nama = $this->input->post('nama_jenis');
		$ket = $this->input->post('ket');
		$nominal = intval(preg_replace("/[^0-9]/", "", $this->input->post('nominal')));
		$data = [
			'nama_jenis'		=> $nama,
			'nominal'			=> $nominal,
			'ket'			=> $ket,
			'status'			=> 1
		];
		$this->db->where('id_jenis', $id_jenis);
		return $this->db->update('jenis_simpanan', $data);
	}
	// get saldo simpanan
	public function get_simpanan()
	{
		$db = $this->db->query('SELECT no_anggota,nama, sum(if(id_jenis = "JS-0001",saldo,0)) as simpanan_pokok,sum(if(id_jenis = "JS-0002",saldo,0)) as simpanan_wajib,sum(if(id_jenis = "JS-0003",saldo,0)) as simpanan_sukarela FROM ( SELECT simpanan.id_anggota as no_anggota, anggota.nama_anggota as nama ,simpanan.id_jenis as id_jenis ,jenis_simpanan.nama_jenis as jenis, sum(if(simpanan.ket = "dr",simpanan.nominal,0)) - sum(if(simpanan.ket = "cr",simpanan.nominal,0)) as saldo FROM simpanan JOIN anggota ON anggota.id_anggota=simpanan.id_anggota  JOIN jenis_simpanan on jenis_simpanan.id_jenis=simpanan.id_jenis GROUP BY anggota.id_anggota,simpanan.id_jenis  ) as pemetaan_simpanan GROUP BY no_anggota');
		return $db->result();
	}
}

/* End of file M_simpanan.php */
