<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pengurus extends CI_Model
{
	// generate id jabatan
	public function id_pengurus()
	{
		$this->db->select('RIGHT(pengurus.id_pengurus,6) as id_pengurus', FALSE);
		$this->db->order_by('id_pengurus', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('pengurus');  //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = intval($data->id_pengurus) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}

		$batas = str_pad($kode, 6, "0", STR_PAD_LEFT);
		$date = strtotime(date('Y-m-d'));
		$kodetampil = "PGW" . '-' . $date . "-" . $batas;  //format kode
		return $kodetampil;
	}
	public function store()
	{
		if ($this->input->post('id_jabatan') == "JBT-0001") {
			$role  = 0;
		} elseif ($this->input->post('id_jabatan') == "JBT-0002") {
			$role = 2;
		} elseif ($this->input->post('id_jabatan') == "JBT-0003") {
			$role = 3;
		} elseif ($this->input->post('id_jabatan') == "JBT-0004") {
			$role = 3;
		} elseif ($this->input->post('id_jabatan') == "JBT-0002") {
			$role = 2;
		}
		$pengurus = [
			'id_pengurus'		=> $this->input->post('id_pengurus'),
			'nik'			=> $this->input->post('nik'),
			'nama_pengurus'	=> $this->input->post('nama_pengurus'),
			'jenis_kelamin'	=> $this->input->post('jenis_kelamin'),
			'tempat_lahir'		=> $this->input->post('tempat_lahir'),
			'tgl_lahir'		=> $this->input->post('tgl_lahir'),
			'no_telp'			=> $this->input->post('no_telp'),
			'email'			=> $this->input->post('email'),
			'alamat'			=> $this->input->post('alamat'),
			'id_jabatan'		=> $this->input->post('id_jabatan'),
		];
		$user = [
			'id_pengurus'		=> $this->input->post('id_pengurus'),
			'nama'			=> $this->input->post('nama_pengurus'),
			'username'		=> $this->input->post('nik'),
			'password'		=> password_hash('123456', PASSWORD_DEFAULT),
			'role'			=> $role,
			'foto'			=> 'default-user.png'
		];
		// echo "<pre>";
		// echo var_export($user);
		// echo "</pre>";
		// die;
		$this->db->trans_start();
		$this->db->insert('pengurus', $pengurus);
		$this->db->insert('user', $user);
		$this->db->trans_complete();
	}
	public function update()
	{
		if ($this->input->post('id_jabatan') == "JBT-0001") {
			$role  = 0;
		} elseif ($this->input->post('id_jabatan') == "JBT-0002") {
			$role = 2;
		} elseif ($this->input->post('id_jabatan') == "JBT-0003") {
			$role = 3;
		} elseif ($this->input->post('id_jabatan') == "JBT-0004") {
			$role = 3;
		} elseif ($this->input->post('id_jabatan') == "JBT-0002") {
			$role = 2;
		}
		$pengurus = [
			'id_pengurus'		=> $this->input->post('id_pengurus'),
			'nik'			=> $this->input->post('nik'),
			'nama_pengurus'	=> $this->input->post('nama_pengurus'),
			'jenis_kelamin'	=> $this->input->post('jenis_kelamin'),
			'tempat_lahir'		=> $this->input->post('tempat_lahir'),
			'tgl_lahir'		=> $this->input->post('tgl_lahir'),
			'no_telp'			=> $this->input->post('no_telp'),
			'email'			=> $this->input->post('email'),
			'alamat'			=> $this->input->post('alamat'),
			'id_jabatan'		=> $this->input->post('id_jabatan'),
		];
		$user = [
			'id_pengurus'		=> $this->input->post('id_pengurus'),
			'nama'			=> $this->input->post('nama_pengurus'),
			'username'		=> $this->input->post('nik'),
			'password'		=> password_hash('123456', PASSWORD_DEFAULT),
			'role'			=> $role,
			'foto'			=> 'default-user.png'
		];
		// echo "<pre>";
		// echo var_export($user);
		// echo "</pre>";
		// die;
		$this->db->trans_start();
		$this->db->where('id_pengurus', $this->input->post('id_pengurus'));
		$this->db->update('pengurus', $pengurus);
		$this->db->where('id_pengurus', $this->input->post('id_pengurus'));
		$this->db->update('user', $user);
		$this->db->trans_complete();
	}
	public function get_pengurus()
	{
		$this->db->select('pengurus.id_pengurus,pengurus.nik,pengurus.nama_pengurus,pengurus.jenis_kelamin,pengurus.tempat_lahir,pengurus.tgl_lahir,pengurus.no_telp,pengurus.email,pengurus.alamat,pengurus.status,master_jabatan.jabatan,master_jabatan.gaji_pokok,master_jabatan.thr,master_jabatan.tunjangan_lain')
			->from('pengurus')
			->join('master_jabatan', 'master_jabatan.id_jabatan = pengurus.id_jabatan');
		return $this->db->get()->result();
	}
	public function select_pengurus($id)
	{
		$this->db->select('pengurus.id_pengurus,pengurus.nik,pengurus.nama_pengurus,pengurus.jenis_kelamin,pengurus.tempat_lahir,pengurus.tgl_lahir,pengurus.no_telp,pengurus.email,pengurus.alamat,pengurus.status,master_jabatan.jabatan,master_jabatan.gaji_pokok,master_jabatan.thr,master_jabatan.tunjangan_lain')
			->from('pengurus')
			->join('master_jabatan', 'master_jabatan.id_jabatan = pengurus.id_jabatan')
			->where('pengurus.id_pengurus', $id);
		return $this->db->get()->row_array();
	}
}

/* End of file M_pengurus.php */
