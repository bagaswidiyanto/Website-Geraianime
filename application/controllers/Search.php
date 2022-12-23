<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends MY_Controller
{
	// Anime
	public function index()
	{
		$this->load->library('pagination');


		$param = @$_GET['s'];

		$this->db->select('a.nama,a.slug,a.tgl_rilis,a.image,b.episode,b.season,b.slug,b.episode,c.nama as namaKomik,c.slug as slugKomik,c.tgl_rilis as tglKomik,c.image as imgKomik,d.slug as slugChp,d.chapter,d.createDate,e.nama as namaMovie,e.slug as slugMovie,e.image as img');
		$this->db->from('tbl_nama_anime a ');
		$this->db->join('tbl_anime_list b', 'b.id_anime = a.id', 'left');
		$this->db->join('tbl_nama_komik c', 'c.id_nama_turunan = a.id', 'left');
		$this->db->join('tbl_komik d', 'd.id_nama_komik = c.id', 'left');
		$this->db->join('tbl_movie e', 'e.id_anime = a.id', 'left');
		$this->db->where('a.aktif', 'Y');
		$this->db->where('c.aktif', 'Y');
		$this->db->order_by('a.nama', 'ASC');
		$this->db->group_start();
		$this->db->like('a.nama', $param);
		$this->db->or_like('c.nama', $param);
		$this->db->or_like('e.nama', $param);
		$this->db->group_end();
		$query =  $this->db->get();;
		$jml = $query->num_rows();

		$config['base_url'] = base_url() . 'search/index/';
		$config['uri_segment'] = 3;
		$config['total_rows'] = $jml;
		$config['per_page'] = 10000;
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

		$this->data['search'] = $this->db->query("SELECT A.* FROM (
			SELECT a.id, a.nama,a.slug as slugTurunan, a.slug, a.tgl_rilis, '' as episode, a.image, a.flag as flags FROM tbl_nama_anime a WHERE a.aktif = 'Y' AND a.nama LIKE '%$param%'
			UNION
			SELECT b.id_anime, bb.nama, b.url_segment,b.slug, b.createDate, b.episode, bb.image, b.flag as flags FROM tbl_anime_list b LEFT JOIN tbl_nama_anime bb ON b.id_anime=bb.id WHERE bb.aktif = 'Y' AND bb.nama LIKE '%$param%'
			UNION
			SELECT c.id, c.nama, c.slug_turunan, c.slug, c.tgl_rilis, '' as episode, c.image, c.flag as flags FROM tbl_nama_komik c WHERE c.aktif = 'Y' AND c.nama LIKE '%$param%'
			UNION
			SELECT d.id_nama_komik, dd.nama, d.slug_turunan, d.slug, d.createDate, d.chapter,dd.image, d.flag as flags FROM tbl_komik d LEFT JOIN tbl_nama_komik dd ON d.id_nama_komik=dd.id WHERE dd.aktif = 'Y' AND dd.nama LIKE '%$param%'
			UNION 
			SELECT e.id, e.nama, e.slug_turunan, e.slug, e.create_date, '' as episode, e.image, e.flag as flags FROM tbl_movie e WHERE e.nama LIKE '%$param%'
		) as A ORDER BY A.nama ASC LIMIT " . $config['per_page'] . "")->result();

		// $this->db->select('a.id,a.nama,a.slug,a.tgl_rilis,a.image, a.flag,b.episode,b.season,b.slug as slgEps,b.episode, b.flag as fEps,c.nama as namaKomik,c.slug as slugKomik,c.tgl_rilis as tglKomik,c.image as imgKomik, c.flag as fKomik,d.slug as slugChp,d.chapter,d.createDate, d.flag as FChp,e.nama as namaMovie,e.slug as slugMovie,e.image as imgMovie, e.flag as fMovie');
		// $this->db->from('tbl_nama_anime a ');
		// $this->db->join('tbl_anime_list b', 'b.id_anime = a.id', 'left');
		// $this->db->join('tbl_nama_komik c', 'c.id_nama_turunan = a.id', 'left');
		// $this->db->join('tbl_komik d', 'd.id_nama_komik = c.id', 'left');
		// $this->db->join('tbl_movie e', 'e.id_anime = a.id', 'left');
		// $this->db->order_by('a.nama', 'ASC');
		// $this->db->limit($config['per_page']);
		// $this->db->offset($page);
		// $this->db->group_start();
		// $this->db->like('a.nama', $param);
		// $this->db->or_like('c.nama', $param);
		// $this->db->or_like('e.nama', $param);
		// $this->db->group_end();
		// $search =  $this->db->get();

		// $this->data['search'] = $search->result();
		$this->data['pagination'] = $this->pagination->create_links();

		$this->web = 'content/v_search';
		$this->layout();
	}
}