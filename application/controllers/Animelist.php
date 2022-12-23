<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Animelist extends MY_Controller
{
	// Anime
	public function index()
	{

		$this->web = 'content/v_anime_list';
		$this->layout();
	}
}
