<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_rekening extends CI_Model
{
	// generate id simpanan
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
		$kodetampil = "TRX-RKB" . "-" . $date . '-' . $batas;  //format kode
		return $kodetampil;
	}
	// generate no rekening
	public function no_rek()
	{
		$profil = $this->db->get('profil_bkm')->row_array();
		$this->db->select('RIGHT(rekening.no_rekening,6) as no_rek', FALSE);
		$this->db->order_by('no_rek', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('rekening');  //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = intval($data->no_rek) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}
		$kode_bkm = $profil['kode_bkm'];
		$batas = str_pad($kode, 6, "0", STR_PAD_LEFT);
		$kodetampil = $kode_bkm . '-' . $kode . '-' . $batas;  //format kode
		return $kodetampil;
	}

	public function get_jenis_produk()
	{
		return $this->db->get('p_simpanan')->result();
	}
	public function select_jenis_produk($id)
	{
		$db = $this->db->get_where('p_simpanan', ['id_p_simpanan' => $id])->row_array();
		$data = [
			'awal_minimal'		=> nominal($db['awal_minimal'])
		];
		// return nominal($db['awal_minimal']);
		return $data;
	}
	public function get_rekening_for_list($id)
	{
		$this->db->select('p_simpanan.id_p_simpanan,p_simpanan.setoran_minimal,p_simpanan.saldo_minimal,rekening.no_rekening,p_simpanan.nama_simpanan')
			->from('detail_rekening')
			->join('rekening', 'rekening.no_rekening=detail_rekening.no_rekening')
			->join('p_simpanan', 'p_simpanan.id_p_simpanan=rekening.id_p_simpanan')
			->join('anggota', 'anggota.id_anggota=rekening.id_anggota')
			->where('rekening.id_anggota', $id)
			->where('p_simpanan.penarikan', 1)
			->group_by('rekening.no_rekening');
		return $this->db->get()->result();
	}
	public function get_rekening_for_list1($id)
	{
		$this->db->select('p_simpanan.id_p_simpanan,p_simpanan.setoran_minimal,p_simpanan.saldo_minimal,rekening.no_rekening,p_simpanan.nama_simpanan')
			->from('detail_rekening')
			->join('rekening', 'rekening.no_rekening=detail_rekening.no_rekening')
			->join('p_simpanan', 'p_simpanan.id_p_simpanan=rekening.id_p_simpanan')
			->join('anggota', 'anggota.id_anggota=rekening.id_anggota')
			->where('rekening.id_anggota', $id)
			->where('p_simpanan.setor', 1)
			->group_by('rekening.no_rekening');
		return $this->db->get()->result();
	}
	private function _produk($rek)
	{
		$this->db->select('p_simpanan.id_p_simpanan,p_simpanan.setoran_minimal,p_simpanan.saldo_minimal')
			->from('detail_rekening')
			->join('rekening', 'rekening.no_rekening=detail_rekening.no_rekening')
			->join('p_simpanan', 'p_simpanan.id_p_simpanan=rekening.id_p_simpanan')
			->join('anggota', 'anggota.id_anggota=rekening.id_anggota')
			->where('rekening.no_rekening', $rek)
			->group_by('rekening.no_rekening');
		return $this->db->get()->row_array();
	}
	public function get_produk($rek)
	{
		$db = $this->_produk($rek);
		$data = [
			'setoran_minimal'	=> nominal($db['setoran_minimal'])
		];
		return $data;
	}


	public function get_rekening()
	{
		$this->db->select('rekening.no_rekening,anggota.nama_anggota,sum(if(ket="dr",detail_rekening.nominal,0)) as s_debet, sum(if(ket="cr",detail_rekening.nominal,0)) as s_kredit,p_simpanan.nama_simpanan,rekening.status,anggota.nik')
			->from('detail_rekening')
			->join('rekening', 'rekening.no_rekening=detail_rekening.no_rekening')
			->join('p_simpanan', 'p_simpanan.id_p_simpanan=rekening.id_p_simpanan')
			->join('anggota', 'anggota.id_anggota=rekening.id_anggota')
			->group_by('rekening.no_rekening');
		return $this->db->get()->result();
	}
	public function select_rekening($rek)
	{
		$this->db->select('rekening.no_rekening,anggota.nama_anggota,sum(if(ket="dr",detail_rekening.nominal,0)) as s_debet, sum(if(ket="cr",detail_rekening.nominal,0)) as s_kredit,p_simpanan.nama_simpanan,rekening.status,rekening.tgl_pembuatan,p_simpanan.saldo_minimal,p_simpanan.level,p_simpanan.jangka,rekening.jatuh_tempo,p_simpanan.bunga')
			->from('detail_rekening')
			->join('rekening', 'rekening.no_rekening=detail_rekening.no_rekening')
			->join('p_simpanan', 'p_simpanan.id_p_simpanan=rekening.id_p_simpanan')
			->join('anggota', 'anggota.id_anggota=rekening.id_anggota')
			->where('rekening.no_rekening', $rek)
			->group_by('rekening.no_rekening');
		return $this->db->get()->row_array();
	}
	public function store()
	{
		$nominal = intval(preg_replace("/[^0-9]/", "", $this->input->post('setoran_awal')));
		$minimal = intval(preg_replace("/[^0-9]/", "", $this->input->post('minimal')));
		$rekening = $this->db->get_where('p_simpanan', ['id_p_simpanan' => $this->input->post('id_p_simpanan')])->row_array();
		if ($nominal < $minimal) {
			$this->session->set_flashdata('sukses', 'warning1');
			redirect('Rekening/insert');
		} else {
			if ($rekening['level'] == 1) {
				$tgl_pembuatan = date('Y-m-d');
				$tempo 	  	= $rekening['jangka'];
				$setahunkan 	= $tempo * 12;
				$jatuh_tempo = date('Y-m-d', strtotime($tgl_pembuatan . '+' . $setahunkan . 'months'));
			} else {
				$tgl_pembuatan = date('Y-m-d');
				$tempo = 5;
				$setahunkan = $tempo * 12;
				$jatuh_tempo = date('Y-m-d', strtotime($tgl_pembuatan . '+' . $setahunkan . 'months'));
			}
			$simpanan = [
				'id_simpanan'		=> $this->id_simpanan(),
				'id_anggota'		=> $this->input->post('id_anggota'),
				'tgl'			=> date('Y-m-d'),
				'id_jenis'		=> 'JS-0003',
				'nominal'			=> $nominal,
				'ket'			=> 'dr',
			];
			$rekening = [
				'no_rekening'		=> $this->no_rek(),
				'id_p_simpanan'	=> $this->input->post('id_p_simpanan'),
				'id_anggota'		=> $this->input->post('id_anggota'),
				'tgl_pembuatan'	=> date('Y-m-d'),
				'jatuh_tempo'		=> $jatuh_tempo
			];
			$detail_rekening = [
				'no_rekening'		=> $this->no_rek(),
				'tgl_setor'		=> date('Y-m-d'),
				'nominal'			=> $nominal,
				'saldo'			=> $nominal,
				'ket'			=> 'dr'
			];
			$debet = [
				'kode_akun'		=> '1101',
				'tgl_jurnal'		=> date('Y-m-d'),
				'ref'			=> $this->id_simpanan(),
				'nominal'			=> $nominal,
				'posisi_dr_cr'		=> 'dr'
			];
			$kredit = [
				'kode_akun'		=> '3105',
				'tgl_jurnal'		=> date('Y-m-d'),
				'ref'			=> $this->id_simpanan(),
				'nominal'			=> $nominal,
				'posisi_dr_cr'		=> 'cr'
			];
			$this->db->trans_start();
			$this->db->insert('simpanan', $simpanan);
			$this->db->insert('rekening', $rekening);
			$this->db->insert('detail_rekening', $detail_rekening);
			$this->db->insert('jurnal', $debet);
			$this->db->insert('jurnal', $kredit);
			$this->db->trans_complete();
			$this->session->set_flashdata('sukses', 'Rekening Berhasil di buat');
			redirect('Rekening');
		}
	}
	public function get_produk_penarikan($rek)
	{
		$db = $this->select_rekening($rek);
		$data = [
			'saldo'	=> nominal($db['s_debet'] - $db['s_kredit'] - $db['saldo_minimal'])
		];
		return $data;
	}
	public function select_detail_rekening($no_rek)
	{
		return $this->db->get_where('detail_rekening', ['no_rekening' => $no_rek])->result();
	}
	public function select_saldo($no_rek)
	{
		return $this->db->get_where('detail_rekening', ['no_rekening' => $no_rek])->result();
	}
	// generate periode
	public function get_periode_generate_bunga()
	{
		return $this->db->get('periode_bunga_tabungan')->result();
	}
	// generate id periode
	public function id_periode()
	{
		$this->db->select('RIGHT(periode_bunga_tabungan.id_periode,4) as id_periode', FALSE);
		$this->db->order_by('id_periode', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('periode_bunga_tabungan');  //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = intval($data->id_periode) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}

		$batas = str_pad($kode, 6, "0", STR_PAD_LEFT);

		$kodetampil = "PRD" . "-" . $batas;  //format kode
		return $kodetampil;
	}
	// store periode
	public function store_periode()
	{
		$periode = $this->input->post('periode');
		$tahun = date('Y', strtotime($periode));
		$bulan = date('m', strtotime($periode));
		$tgl  = akhir_bulan($bulan, $tahun);
		$data = [
			'id_periode'	=> $this->id_periode(),
			'periode'		=> $tgl
		];
		return $this->db->insert('periode_bunga_tabungan', $data);
	}

	public function search_rekening()
	{
		$this->db->select('rekening.no_rekening,anggota.nama_anggota,min(detail_rekening.saldo) as saldo,p_simpanan.nama_simpanan,rekening.status,p_simpanan.bunga,p_simpanan.biaya_adm,p_simpanan.biaya_tutup,rekening.tgl_pembuatan')
			->from('detail_rekening')
			->join('rekening', 'rekening.no_rekening=detail_rekening.no_rekening')
			->join('p_simpanan', 'p_simpanan.id_p_simpanan=rekening.id_p_simpanan')
			->join('anggota', 'anggota.id_anggota=rekening.id_anggota')
			->group_by('rekening.no_rekening');
		return $this->db->get()->result();
	}
	// keperluan akumulasi bunga bulan berjalan
	public function saldo_rekening($id, $tgl)
	{

		$periode = $this->db->get_where('periode_bunga_tabungan', ['id_periode' => $id])->row_array();
		$tgl_akhir = $tgl;
		$param = date('d', strtotime($periode['periode']));
		$tgl_awal = date('Y-m-d', strtotime('-' . $param . ' days', strtotime($tgl_akhir)));
		$this->db->select('rekening.no_rekening,anggota.nama_anggota,min(detail_rekening.saldo) as saldo,p_simpanan.nama_simpanan,rekening.status,p_simpanan.bunga,p_simpanan.biaya_adm,p_simpanan.biaya_tutup,rekening.tgl_pembuatan')
			->from('detail_rekening')
			->join('rekening', 'rekening.no_rekening=detail_rekening.no_rekening')
			->join('p_simpanan', 'p_simpanan.id_p_simpanan=rekening.id_p_simpanan')
			->join('anggota', 'anggota.id_anggota=rekening.id_anggota')
			->where('detail_rekening.tgl_setor >=', $tgl_awal)
			->where('detail_rekening.tgl_setor <=', $tgl_akhir)
			->group_by('rekening.no_rekening');
		return $this->db->get()->result();
	}
	public function search_rekening_for_list()
	{
		$this->db->select('rekening.tgl_pembuatan as tgl1,count(rekening.no_rekening) as row')
			->from('rekening')
			->group_by('rekening.tgl_pembuatan');
		return $this->db->get()->result();
	}
}

/* End of file M_rekening.php */
