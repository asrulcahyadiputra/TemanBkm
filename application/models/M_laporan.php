<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
	public function get_profile()
	{
		return $this->db->get('profil_bkm')->row_array();
	}
	public function get_jurnal()
	{
		$this->db->select('jurnal.tgl_jurnal,coa.akun,jurnal.kode_akun,jurnal.ref,jurnal.nominal,jurnal.posisi_dr_cr')
			->from('jurnal')
			->join('coa', 'coa.kode_akun=jurnal.kode_akun')
			->order_by('jurnal.urut');
		return $this->db->get()->result();
	}
	public function get_row()
	{
		$this->db->select('jurnal.tgl_jurnal,jurnal.ref,count(jurnal.urut) as rows')
			->from('jurnal')
			->join('coa', 'coa.kode_akun=jurnal.kode_akun')
			->group_by('jurnal.ref,jurnal.tgl_jurnal')
			->order_by('jurnal.urut');
		return $this->db->get()->result();
	}
}

/* End of file M_laporan.php */
