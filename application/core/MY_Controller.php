<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{

	//set the class variable.
	var $template  = array();
	var $data      = array();
	//Load layout    
	public function layout()
	{
		date_default_timezone_set("Asia/Jakarta");

		$this->CI = &get_instance();
		// $this->data['menu']=$this->menu(0,$h="");
		$this->data['website'] = $this->CI->db->get('tbl_website')->row();
		$this->data['hero'] = $this->CI->db->get('tbl_hero')->row();
		$this->data['download'] = $this->CI->db->get('tbl_download')->row();
		$this->data['sosmed'] = $this->CI->db->get('tbl_sosmed')->result();
		$this->data['bIklan1'] = $this->db->get_where('tbl_iklan', array('posisi' => 1))->row();
		$this->data['bIklan2'] = $this->db->get_where('tbl_iklan', array('posisi' => 2))->row();
		$this->data['bIklan3'] = $this->db->get_where('tbl_iklan', array('posisi' => 3))->row();
		$this->data['bIklan4'] = $this->db->get_where('tbl_iklan', array('posisi' => 4))->row();
		$this->data['bIklan5'] = $this->db->get_where('tbl_iklan', array('posisi' => 5))->row();
		$this->data['bIklan6'] = $this->db->get_where('tbl_iklan', array('posisi' => 6))->row();
		$this->data['bIklan7'] = $this->db->get_where('tbl_iklan', array('posisi' => 7))->row();
		$this->data['bIklan8'] = $this->db->get_where('tbl_iklan', array('posisi' => 8))->row();
		$this->data['bIklan9'] = $this->db->get_where('tbl_iklan', array('posisi' => 9))->row();
		$this->data['bIklan10'] = $this->db->get_where('tbl_iklan', array('posisi' => 10))->row();
		$this->data['bIklan11'] = $this->db->get_where('tbl_iklan', array('posisi' => 11))->row();
		$this->data['bIklan12'] = $this->db->get_where('tbl_iklan', array('posisi' => 12))->row();
		$this->data['bIklan13'] = $this->db->get_where('tbl_iklan', array('posisi' => 13))->row();
		$this->data['bIklan14'] = $this->db->get_where('tbl_iklan', array('posisi' => 14))->row();




		$this->template['header']   = $this->load->view('layout/header', $this->data); //, $this->data

		$this->template['web'] = $this->load->view($this->web, $this->data); //, $this->data
		$this->template['footer'] = $this->load->view('layout/footer', $this->data); //, $this->data


	}
}