<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{

		$data = [
			'title'	=> 'TemanBKM'
		];
		$this->load->view('templates/login', $data);
	}
	public function validate()
	{
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);
		$user  = $this->db->get_where('user', ['username' => $username])->row_array();
		if ($user) {
			if (password_verify($password, $user['password'])) {
				if ($user['status'] == 1) {
					if ($this->agent->is_browser()) {
						$browser = $this->agent->browser() . '' . $this->agent->version();
					} elseif ($this->agent->is_robot()) {
						$browser = $this->agent->robot();
					} elseif ($this->agent->is_mobile()) {
						$browser = $this->agent->mobile();
					} else {
						$browser = "Undentified User Agent";
					}
					$ip = $this->input->ip_address();
					$os = $this->agent->platform();
					$log_user = [
						'id_user'		=> $user['id_user'],
						'ip'			=> $ip,
						'browser'		=> $browser,
						'os'			=> $os
					];
					$data = [
						'id_user'		=> $user['id_user'],
						'nama'		=> $user['nama'],
						'foto'		=> $user['foto'],
						'role'		=> $user['role'],
						'xyz'		=> 1
					];
					$this->db->insert('log_login', $log_user);
					$this->session->set_userdata($data);
					//berhasil masuk
					$this->session->set_flashdata('sukses', 'Selamat Datang, ' . $user['nama']);
					redirect('Dashboard');
				} else {
					// akun user di block
					$this->session->set_flashdata('sukses', 'warning9');
					redirect('Auth');
				}
			} else {
				// password salah
				$date = date('Y-m-d');
				$log = $this->db->get_where('log_password', ['id_user' => $user['id_user'], 'date' => $date])->row_array();
				if ($log['total'] >= 3) {
					// total password salah sehari maksimal 3 kali
					$this->load->view('errors/html/error_log');
				} else {
					// password salah kurang dari 3
					if ($log) {
						$log_password = [
							'id_user' => $user['id_user'],
							'date'	=> $date,
							'total'	=> $log['total'] + 1,
						];
						$this->db->where('id_user', $user['id_user']);
						$this->db->where('date', $date);
						$this->db->update('log_password', $log_password);
					} else {
						$log_password = [
							'id_user' => $user['id_user'],
							'date'	=> $date,
							'total'	=> 1,
						];
						$this->db->insert('log_password', $log_password);
					}
					$this->session->set_flashdata('sukses', 'warning8');
					redirect('Auth');
				}
			}
		} else {
			$this->session->set_flashdata('sukses', 'warning8');
			redirect('Auth');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Auth');
	}
}

/* End of file Auth.php */
