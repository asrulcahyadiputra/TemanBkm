<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_anggota extends CI_Model
{
	public function id_anggota()
	{
		$this->db->select('RIGHT(anggota.id_anggota,4) as id_anggota', FALSE);
		$this->db->order_by('id_anggota', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('anggota');  //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = intval($data->id_anggota) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}

		$batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$date = strtotime(date('Y-m-d'));
		$kodetampil = "AG" . "-" . $date . '-' . $batas;  //format kode
		return $kodetampil;
	}
	public function get_anggota_aktif()
	{
		$this->db->select('pendaftaran.kode_pendaftaran,simpanan.id_anggota,anggota.nama_anggota,anggota.tempat_lahir,anggota.tgl_lahir,anggota.no_telp,sum(if(ket = "dr",nominal,0)) as s_debet,sum(if(ket="cr",nominal,0)) as s_kredit')
			->from('simpanan')
			->join('anggota', 'anggota.id_anggota=simpanan.id_anggota')
			->join('pendaftaran', 'pendaftaran.id_anggota=anggota.id_anggota')
			->where('status', 1)
			->group_by('simpanan.id_anggota');
		return $this->db->get()->result();
	}
	public function select_anggota_aktif($id)
	{
		$this->db->select('anggota.nik,simpanan.id_anggota,anggota.nama_anggota,anggota.tempat_lahir,anggota.tgl_lahir,anggota.no_telp,sum(if(ket = "dr",nominal,0)) as s_debet,sum(if(ket="cr",nominal,0)) as s_kredit,sum(simpanan.tunggakan) as tunggakan')
			->from('simpanan')
			->join('anggota', 'anggota.id_anggota=simpanan.id_anggota')
			->where('anggota.id_anggota', $id)
			->group_by('simpanan.id_anggota');
		return $this->db->get()->row_array();
	}
	public function get_anggota_calon()
	{
		$this->db->select('pendaftaran.kode_pendaftaran,anggota.id_anggota,anggota.nama_anggota,anggota.tempat_lahir,anggota.tgl_lahir,anggota.no_telp')
			->from('anggota')
			->join('pendaftaran', 'pendaftaran.id_anggota=anggota.id_anggota')
			->where('anggota.status', 0);
		return $this->db->get()->result();
	}
	public function get_anggota_blokir()
	{
		$this->db->select('pendaftaran.kode_pendaftaran,simpanan.id_anggota,anggota.nama_anggota,anggota.tempat_lahir,anggota.tgl_lahir,anggota.no_telp,sum(if(ket = "dr",nominal,0)) as s_debet,sum(if(ket="cr",nominal,0)) as s_kredit')
			->from('simpanan')
			->join('anggota', 'anggota.id_anggota=simpanan.id_anggota')
			->join('pendaftaran', 'pendaftaran.id_anggota=anggota.id_anggota')
			->where('anggota.status', 2)
			->group_by('simpanan.id_anggota');
		return $this->db->get()->result();
	}
	public function add_user($id)
	{
		$user = $this->db->get_where('user', ['id_anggota' => $id])->row_array();
		$anggota = $this->db->get_where('anggota', ['id_anggota' => $id])->row_array();
		if ($user) {
			$this->session->set_flashdata('sukses', 'warning7');
			redirect('Anggota');
		} else {
			$data = [
				'id_anggota'	=> $id,
				'nama'		=> $anggota['nama_anggota'],
				'username'	=> $anggota['nik'],
				'password'	=> password_hash('123456', PASSWORD_DEFAULT),
				'role'		=> 6,
				'foto'		=> 'default-user.png',
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('sukses', 'Akun Anggota Berhasil di Buat');
			redirect('Anggota');
		}
	}
}

/* End of file M_anggota.php */
