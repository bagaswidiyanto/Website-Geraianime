<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komiklist extends MY_Controller
{
	// Anime
	public function index()
	{
		$this->web = 'content/v_komik_list';
		$this->layout();
	}
}
