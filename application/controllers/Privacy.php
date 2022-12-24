<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Privacy extends MY_Controller
{
	public function index()
	{

		$this->data['privacy'] = $this->db->get_where('tbl_terms_privacy', array('id' => 2))->row();

		$this->web = 'content/v_privacy';
		$this->layout();
	}
}