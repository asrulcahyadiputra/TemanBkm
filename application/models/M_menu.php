<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_menu extends CI_Model
{

	function get_menu()
	{
		$this->db->order_by('urut', 'ASC');

		return $this->db->get('menu')->result();
	}
}

/* End of file M_menu.php */
