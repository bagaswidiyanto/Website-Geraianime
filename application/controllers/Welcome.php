<?php
defined('BASEPATH') or exit('Npo direct script access allowed');

class Welcome extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_data');
		$this->load->helper('url');
		$this->load->helper('download');
	}

	public function index()
	{
		$this->data['website'] = $this->db->get('tbl_website')->row();

		$this->db->select('COUNT(b.id_movie) as jml, a.slug_turunan, a.slug, a.nama,a.create_date,a.image');
		$this->db->from('tbl_movie a');
		$this->db->join('tbl_movie_counter b', 'b.id_movie =  a.id', 'left');
		$this->db->group_by('b.id_movie');
		$this->db->order_by('COUNT(b.id_movie)', 'desc');
		$this->db->limit(1);
		$movieFirst = $this->db->get();
		$this->data['movieFirst'] = $movieFirst->row();

		$this->db->select('COUNT(b.id_movie) as jml, a.slug_turunan, a.slug, a.nama,a.create_date,a.image');
		$this->db->from('tbl_movie a');
		$this->db->join('tbl_movie_counter b', 'b.id_movie =  a.id', 'left');
		$this->db->group_by('b.id_movie');
		$this->db->order_by('COUNT(b.id_movie)', 'desc');
		$this->db->limit(3, 1);
		$movieLastPopuler = $this->db->get();
		$this->data['movieLastPopuler'] = $movieLastPopuler->result();

		$this->db->select('a.slug_turunan,a.slug, a.nama,a.create_date,a.image');
		$this->db->from('tbl_movie a');
		$this->db->order_by('a.id', 'desc');
		$this->db->limit(3);
		$movieLast = $this->db->get();
		$this->data['movieLast'] = $movieLast->result();


		$this->db->select(' a.slug, a.nama,a.image, a.tgl_rilis');
		$this->db->from('tbl_nama_anime a');
		$this->db->where('a.aktif', 'Y');
		$this->db->order_by('a.id', 'desc');
		$this->db->limit(10);
		$new_anime = $this->db->get();
		$this->data['new_anime'] = $new_anime->result();

		$this->db->select('COUNT(b.id_anime) as jml, a.slug, a.nama,a.image,a.id, a.tgl_rilis');
		$this->db->from('tbl_nama_anime a');
		$this->db->join('tbl_anime_counter  b', 'a.id =  b.id_anime', 'left');
		$this->db->where('a.aktif', 'Y');
		$this->db->group_by('b.id_anime');
		$this->db->order_by('COUNT(b.id_anime)', 'desc');
		$this->db->limit(4);
		$populer_anime = $this->db->get();
		$this->data['populer_anime'] = $populer_anime->result();

		$this->db->select('COUNT(b.id_komik) as jml, a.id,a.slug_turunan,a.tgl_rilis, a.slug, a.nama,a.image');
		$this->db->from('tbl_nama_komik a');
		$this->db->join('tbl_komik_counter b', 'a.id =  b.id_komik', 'left');
		$this->db->where('a.aktif', 'Y');
		$this->db->group_by('b.id_komik');
		$this->db->order_by('COUNT(b.id_komik)', 'desc');
		$this->db->limit(6);
		$new_komik = $this->db->get();
		$this->data['new_komik'] = $new_komik->result();


		$this->load->library('pagination');
		$jml = $this->db->count_all('tbl_anime_list');
		$config['base_url'] = base_url() . 'welcome/index/';
		$config['uri_segment'] = 3;
		$config['total_rows'] = $jml;
		$config['per_page'] = 10;
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = '>';
		$config['prev_link']        = '<';
		$config['full_tag_open'] = '<center><ul class="pagination ">';
		$config['full_tag_close'] = '</ul></center>';
		$config['cur_tag_open'] = '<li class="page-item page-link active"><a class="page-link active">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-item page-link">';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="page-item page-link">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="page-item page-link">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li class="page-item page-link">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item page-link">';
		$config['last_tag_close'] = '</li>';
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->pagination->initialize($config);



		$this->db->select('a.url_segment, a.slug, a.id_anime, a.episode, b.nama, b.image, b.slug as slg, a.createDate');
		$this->db->from('tbl_anime_list a');
		$this->db->join('tbl_nama_anime b', 'b.id =  a.id_anime', 'left');
		$this->db->where('b.aktif', 'Y');
		$this->db->order_by('a.createDate', 'desc');
		$this->db->limit($config['per_page']);
		$this->db->offset($page);
		$anime = $this->db->get();


		// $this->db->order_by('createDate', 'desc');
		// $this->db->limit($config['per_page']);
		// $this->db->offset($page);
		// $anime = $this->db->get('tbl_anime');

		$this->data['anime'] = $anime->result();
		$this->data['pagination'] = $this->pagination->create_links();

		if ($config["total_rows"] > 10) {
			if ($this->pagination->cur_page == 1)
				$start = $this->pagination->cur_page;
			else
				$start = (($this->pagination->cur_page - 1) * $this->pagination->per_page) + 1;

			// if ($this->pagination->cur_page * $this->pagination->per_page > $config["total_rows"])
			// 	$end = $config["total_rows"];
			// else
			// 	$end = $this->pagination->cur_page * $this->pagination->per_page;

			$this->data['pagination_des'] = "Halaman " . ($start) . " dari " . $config["total_rows"];
		} else {
			$this->data['pagination_des'] = "Halaman " . ($this->pagination->cur_page) . " dari " . $config["total_rows"];
		}



		$this->db->select('a.id_nama_komik, a.chapter, a.slug, a.createDate, b.nama, b.image, b.slug_turunan');
		$this->db->from('tbl_komik a');
		$this->db->join('tbl_nama_komik b', 'b.id =  a.id_nama_komik', 'left');
		$this->db->order_by('a.createDate', 'desc');
		// $this->db->limit($config2['per_page']);
		// $this->db->offset($page2);
		$komik = $this->db->get();


		// $this->db->order_by('createDate', 'desc');
		// $this->db->limit($config['per_page']);
		// $this->db->offset($page);
		// $anime_list = $this->db->get('tbl_anime_list');


		$this->data['komik'] = $komik->result();
		// $this->data['pagination2'] = $this->pagination->create_links();



		$this->web = 'content/v_home';
		// $this->data['navigation']=$this->db->get_where('tbl_navigation');
		$this->layout();
	}
}