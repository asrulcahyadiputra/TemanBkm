<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Master_shu extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_shu');
	}


	public function index()
	{
		$data = [
			'title'		=> 'TemanBKM',
			'level'		=> 0,
			'menu'		=> $this->M_menu->get_menu(),
			'master_shu'	=> $this->M_shu->get_master_shu(),
			'id_shu'		=> $this->M_shu->id_master_shu(),
		];
		$this->load->view('templates/header', $data);
		$this->load->view('master/shu/index', $data);
		$this->load->view('templates/footer', $data);
	}
	private function validate($tahun)
	{
		$this->db->select('sum(persentase) as total')
			->from('master_shu')
			->where('tahun', $tahun)
			->group_by('tahun');
		return $this->db->get()->row_array();
	}
	public function store()
	{
		$persentase = $this->input->post('persentase');
		$tahun = $this->input->post('tahun');
		$validate = $this->validate($tahun);

		if ($validate) {
			$total = $validate['total'] + $persentase;
			// var_dump($total);
			// die;
			if ($total > 100) {
				$this->session->set_flashdata('sukses', 'warning10');
				redirect('Master_shu');
			} else {
				$this->M_shu->store_master();
				$this->session->set_flashdata('sukses', 'Komponen SHU berhasil ditambahkan');
				redirect('Master_shu');
			}
		} else {
			$this->M_shu->store_master();
			$this->session->set_flashdata('sukses', 'Komponen SHU berhasil ditambahkan');
			redirect('Master_shu');
		}
	}
}

/* End of file Master_shu.php */
