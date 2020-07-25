<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_coa extends CI_Model
{

	public function get_coa()
	{
		return $this->db->get('coa')->result();
	}
	public function select_coa($id)
	{
		return $this->db->get_where('coa', ['kode_akun' => $id])->row_array();
	}
	public function get_header()
	{
		return $this->db->get_where('coa', ['header' => 0, 'sub_header' => 0])->result();
	}
	public function get_sub_header_all()
	{
		return $this->db->get_where('coa', ['header !=' => 0, 'sub_header' => 0])->result();
	}
	public function get_sub_header($id)
	{
		return $this->db->get_where('coa', ['header' => $id, 'sub_header' => 0])->result();
	}
	public function store()
	{
		if ($this->input->post('header') == '1' || $this->input->post('header') == '5') {
			$saldo_normal = 'dr';
		} elseif ($this->input->post('header') == '2' || $this->input->post('header') == '3' || $this->input->post('header') == '4') {
			$saldo_normal = 'cr';
		}
		$data = [
			'kode_akun'		=> $this->input->post('kode_akun'),
			'header'			=> $this->input->post('header'),
			'sub_header'		=> $this->input->post('sub_header'),
			'akun'			=> $this->input->post('akun'),
			'saldo_normal'		=> $saldo_normal,
			'pos'			=> $this->input->post('pos')
		];
		// echo "<pre>";
		// echo var_export($data);
		// echo "</pre>";
		// die;
		return $this->db->insert('coa', $data);
	}
	public function update($id)
	{
		if ($this->input->post('header') == '1' || $this->input->post('header') == '5') {
			$saldo_normal = 'dr';
		} elseif ($this->input->post('header') == '2' || $this->input->post('header') == '3' || $this->input->post('header') == '4') {
			$saldo_normal = 'cr';
		}
		$data = [
			'header'			=> $this->input->post('header'),
			'sub_header'		=> $this->input->post('sub_header'),
			'akun'			=> $this->input->post('akun'),
			'saldo_normal'		=> $saldo_normal,
			'pos'			=> $this->input->post('pos')
		];
		// echo "<pre>";
		// echo var_export($data);
		// echo "</pre>";
		// die;
		$this->db->where('kode_akun', $id);
		return $this->db->update('coa', $data);
	}
}

/* End of file M_coa.php */
