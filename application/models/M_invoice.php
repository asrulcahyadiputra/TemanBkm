<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_invoice extends CI_Model
{
	// generate id periode
	public function id_periode()
	{
		$this->db->select('RIGHT(periode_iuran_wajib.id_periode,4) as id_periode', FALSE);
		$this->db->order_by('id_periode', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('periode_iuran_wajib');  //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = intval($data->id_periode) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}

		$batas = str_pad($kode, 6, "0", STR_PAD_LEFT);

		$kodetampil = "PRI" . "-" . $batas;  //format kode
		return $kodetampil;
	}
	// generate id invoice
	public function id_invoice()
	{
		$this->db->select('RIGHT(invoice.id_invoice,6) as id_invoice', FALSE);
		$this->db->order_by('id_invoice', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('invoice');  //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = intval($data->id_invoice) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}

		$batas = str_pad($kode, 6, "0", STR_PAD_LEFT);
		$date = strtotime(date('Y-m-d'));
		$kodetampil = "INV" . "-" . $date . '-' . $batas;  //format kode
		return $kodetampil;
	}
	public function get_periode()
	{
		return $this->db->get('periode_iuran_wajib')->result();
	}
	public function store_periode()
	{
		$id 			= $this->input->post('id_periode');
		$periode  	=  $this->input->post('periode');
		$bulan    	= date('m', strtotime($periode));
		$tahun    	= date('Y', strtotime($periode));
		// generate total akhir sebulan
		$total_hari 	= total_hari($bulan, $tahun);
		$periode = [
			'id_periode'		=> $id,
			'periode'			=> $periode,
			'total_hari'		=> $total_hari
		];
		for ($i = 1; $i <= $total_hari; $i++) {
			$detail[] = [
				'id_periode'		=> $id,
				'tgl_periode'		=> $tahun . '-' . $bulan . '-' . $i
			];
		}
		// echo "<pre>";
		// echo var_export($detail);
		// echo "</pre>";
		// die;
		$this->db->trans_start();
		$this->db->insert('periode_iuran_wajib', $periode);
		$this->db->insert_batch('detail_periode_wajib', $detail);
		$this->db->trans_complete();
	}

	public function get_profil()
	{
		return $this->db->get('profil_bkm')->row_array();
	}
	public function get_anggota()
	{
		return $this->db->get_where('anggota', ['status' => 1])->result();
	}
	public function select_anggota($anggota)
	{
		return $this->db->get_where('anggota', ['id_anggota' => $anggota])->row_array();
	}
	public function select_periode($id)
	{
		return $this->db->get_where('periode_iuran_wajib', ['id_periode' => $id])->row_array();
	}
	public function select_detail_periode($id)
	{
		return $this->db->get_where('detail_periode_wajib', ['id_periode' => $id])->result();
	}
	public function one_detail_periode($id)
	{
		return $this->db->get_where('detail_periode_wajib', ['id' => $id])->row_array();
	}

	public function one_invoice($id)
	{
		return $this->db->get_where('invoice', ['id' => $id])->row_array();
	}
	public function select_total_hari($id)
	{
		$periode = $this->db->get_where('periode_iuran_wajib', ['id_periode' => $id])->row_array();
		$this->db->select('sum(total_hari) as jumlah_hari')
			->from('periode_iuran_wajib')
			->where('periode <', $periode['periode']);
		return $this->db->get()->row_array();
	}
	public function get_jenis_simpanan()
	{
		return $this->db->get_where('jenis_simpanan', ['id_jenis' => 'JS-0002'])->row_array();
	}
	// get tunggakan simpanan wajib
	public function get_tunggakan($anggota, $id)
	{
		$periode = $this->db->get_where('detail_periode_wajib', ['id' => $id])->row_array();
		$tgl = $periode['tgl_periode'];
		$this->db->select('simpanan.id_anggota,sum(simpanan.tunggakan) as tunggakan')
			->from('simpanan')
			->where('id_anggota', $anggota)
			->where('tgl <', $tgl)
			->where('id_jenis', 'JS-0002');
		return $this->db->get()->row_array();
	}
}

/* End of file M_invoice.php */
