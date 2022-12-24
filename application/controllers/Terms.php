<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Terms extends MY_Controller
{
	public function index()
	{

		$this->data['terms'] = $this->db->get_where('tbl_terms_privacy', array('id' => 1))->row();

		$this->web = 'content/v_terms';
		$this->layout();
	}
}