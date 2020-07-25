<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pendaftaran extends CI_Model
{

	public function store()
	{
		$pendaftaran = [
			'kode_pendaftaran'		=> $this->input->post('kode_pendaftaran'),
			'id_anggota'			=> $this->input->post('id_anggota'),
		];
		$anggota = [
			'id_anggota'			=> $this->input->post('id_anggota'),
			'nama_anggota'			=> $this->input->post('nama_anggota'),
			'nik'				=> $this->input->post('nik'),
			'tempat_lahir'			=> $this->input->post('tempat_lahir'),
			'tgl_lahir'			=> $this->input->post('tgl_lahir'),
			'jenis_kelamin'		=> $this->input->post('jenis_kelamin'),
			'no_telp'				=> $this->input->post('no_telp'),
			'email'				=> $this->input->post('email'),
		];
		$user = [
			'id_anggota'			=> $this->input->post('id_anggota'),
			'nama'				=> $this->input->post('nama_anggota'),
			'username'			=> $this->input->post('nik'),
			'password'			=> password_hash('123456', PASSWORD_DEFAULT),
			'role'				=> 6,
			'foto'				=> "default-user.png"

		];
		$this->db->trans_start();
		$this->db->insert('anggota', $anggota);
		$this->db->insert('pendaftaran', $pendaftaran);
		$this->db->insert('user', $user);
		$this->db->trans_complete();
	}
	public function select_anggota($id)
	{
		return $this->db->get_where('anggota', ['id_anggota' => $id])->row_array();
	}
	public function get_komponen_biaya()
	{
		return $this->db->get_where('komponen_biaya', ['tipe' => 3])->result();
	}
	public function get_jenis_simpanan()
	{
		return $this->db->get_where('jenis_simpanan', ['ket' => 0])->result();
	}
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
		$kodetampil = "TRX-STR" . "-" . $date . '-' . $batas;  //format kode
		return $kodetampil;
	}
	public function bayar($id, $tkp, $id_tkj, $tkj)
	{
		$simpanan = [
			'id_simpanan'		=> $this->id_simpanan(),
			'id_anggota'		=> $id,
			'tgl'			=> date('Y-m-d'),
			'id_jenis'		=> $id_tkj,
			'nominal'			=> $tkj,
			'tunggakan'		=> 0,
			'ket'			=> 'dr'
		];
		// jurnal
		$debet = [
			'kode_akun'		=> '1101',
			'tgl_jurnal'		=> date('Y-m-d'),
			'ref'			=> $this->id_simpanan(),
			'nominal'			=> $tkj + $tkp,
			'posisi_dr_cr'		=> 'dr'
		];
		$kredit1 = [
			'kode_akun'		=> '3101',
			'tgl_jurnal'		=> date('Y-m-d'),
			'ref'			=> $this->id_simpanan(),
			'nominal'			=> $tkj,
			'posisi_dr_cr'		=> 'cr'
		];
		$kredit2 = [
			'kode_akun'		=> '4103',
			'tgl_jurnal'		=> date('Y-m-d'),
			'ref'			=> $this->id_simpanan(),
			'nominal'			=> $tkp,
			'posisi_dr_cr'		=> 'cr'
		];
		$anggota = [
			'status'			=> 1
		];
		$this->db->trans_start();
		$this->db->insert('simpanan', $simpanan);
		$this->db->insert('jurnal', $debet);
		$this->db->insert('jurnal', $kredit1);
		$this->db->insert('jurnal', $kredit2);
		$this->db->where('id_anggota', $id);
		$this->db->update('anggota', $anggota);
		$this->db->trans_complete();
	}
}

/* End of file M_pendaftaran.php */
