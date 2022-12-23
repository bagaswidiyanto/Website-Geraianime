<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Anime extends MY_Controller
{
    public function index()
    {

        $this->load->library('pagination');
        $jml = $this->db->count_all('tbl_nama_anime');
        $config['base_url'] = base_url() . 'anime/index/';
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



        $this->db->select('a.slug, a.nama,a.image,a.id, a.tgl_rilis');
        $this->db->from('tbl_nama_anime a');
        $this->db->where('a.aktif', 'Y');
        $this->db->order_by('a.id', 'desc');
        $this->db->limit($config['per_page']);
        $this->db->offset($page);
        $anime = $this->db->get();


        // $this->db->order_by('createDate', 'desc');
        // $this->db->limit($config['per_page']);
        // $this->db->offset($page);
        // $anime = $this->db->get('tbl_anime');


        $this->data['anime'] = $anime->result();
        $this->data['pagination'] = $this->pagination->create_links();

        $this->web = 'content/v_anime';
        $this->layout();
    }


    public function anime_detail()
    {
        $slug = $this->uri->segment(3);
        // $slug4 = $this->uri->segment(4);

        $this->db->select('a.id_anime, a.url_segment, a.episode, a.slug, a.createDate, b.status, b.nama, b.image');
        $this->db->from('tbl_anime_list a');
        $this->db->join('tbl_nama_anime b', 'b.id =  a.id_anime', 'left');
        $this->db->where('b.aktif', 'Y');
        $this->db->where('a.url_segment', $slug);
        $this->db->order_by('a.createDate', 'desc');
        $episode_list = $this->db->get();
        $this->data['episode_list'] = $episode_list->result();

        $this->db->select('a.nama, a.image, a.slug, a.tgl_rilis');
        $this->db->from('tbl_nama_anime a');
        $this->db->where('a.aktif', 'Y');
        $this->db->order_by('a.id', 'desc');
        $this->db->limit(6);
        $recomend_anime = $this->db->get();
        $this->data['recomend_anime'] = $recomend_anime->result();


        $anime1 = $this->db->query("SELECT * FROM tbl_nama_anime WHERE slug = '" . $slug . "'");
        $this->data['anime_detail'] = $anime1->row();
        if ($anime1->num_rows() > 0) {
            $this->db->order_by('id', 'desc');
            $this->db->limit('4');
            $this->data['anim'] = $this->db->get('tbl_anime_list')->result();
            $this->web = 'content/v_anime_detail';
            $this->layout();
        } else {
            redirect(base_url() . 'anime');
        }
        $this->viewersAnimeDetail();
    }


    public function anime_eps()
    {
        $slug3 = $this->uri->segment(3);
        $slug4 = $this->uri->segment(4);



        $this->db->select('a.nama, a.image, a.slug, a.tgl_rilis');
        $this->db->from('tbl_nama_anime a');
        $this->db->where('a.aktif', 'Y');
        $this->db->order_by('a.id', 'desc');
        $this->db->limit(3);
        $recomend_anime = $this->db->get();
        $this->data['recomend_anime'] = $recomend_anime->result();

        $this->db->select('a.id_anime, a.url_segment, a.episode, a.slug, a.createDate, b.nama, b.image');
        $this->db->from('tbl_anime_list a');
        $this->db->join('tbl_nama_anime b', 'b.id =  a.id_anime', 'left');
        $this->db->where('b.aktif', 'Y');
        $this->db->order_by('a.createDate', 'desc');
        $this->db->limit(6);
        $anime_terbaru = $this->db->get();
        $this->data['anime_terbaru'] = $anime_terbaru->result();



        $anime = $this->db->query("SELECT a.*,b.id as id_nama, b.nama, b.deskripsi, b.studio,b.durasi,b.status,b.score, b.image FROM tbl_anime_list a LEFT JOIN tbl_nama_anime b ON a.id_anime=b.id WHERE a.slug = '" . $slug3 . "' AND b.aktif = 'Y'");
        $this->data['anime'] = $anime->row();
        if ($anime->num_rows() > 0) {
            $this->db->order_by('id', 'desc');
            $this->db->limit('4');
            // $this->data['anim'] = $this->db->get('tbl_anime_list')->result();
            $this->web = 'content/v_anime_detail';
            $this->layout();
        } else {
            redirect(base_url() . 'anime');
        }
        $this->viewersAnimeEps();
    }

    public function anime_popular()
    {

        $this->load->library('pagination');
        $jml = $this->db->count_all('tbl_nama_anime');
        $config['base_url'] = base_url() . 'anime/anime_popular/index/';
        $config['uri_segment'] = 4;
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
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);



        $this->db->select('COUNT(b.id_anime) as jml, a.slug, a.nama,a.image,a.id, a.tgl_rilis');
        $this->db->from('tbl_nama_anime a');
        $this->db->join('tbl_anime_counter  b', 'a.id =  b.id_anime', 'left');
        $this->db->where('a.aktif', 'Y');
        $this->db->group_by('b.id_anime');
        $this->db->order_by('COUNT(b.id_anime)', 'desc');
        $this->db->limit($config['per_page']);
        $this->db->offset($page);
        $animePopular = $this->db->get();

        $this->data['animePopular'] = $animePopular->result();
        $this->data['pagination'] = $this->pagination->create_links();

        $this->web = 'content/v_anime_popular';
        $this->layout();
    }


    function viewersAnimeEps()
    {
        $ip = $_SERVER['REMOTE_ADDR']; // menangkap ip pengunjung
        $location = $_SERVER['PHP_SELF']; // menangkap server path
        $id = $this->uri->segment('4');
        $anime = $this->db->query("SELECT a.id_anime FROM tbl_anime_list a LEFT JOIN tbl_nama_anime b ON a.id_anime=b.id WHERE a.id_anime = '" . $id . "'")->row();


        $create_log = $this->db->query("INSERT INTO tbl_anime_counter(ip, `location`, `timestamp`, id_anime)VALUES('$ip', '$location', NOW(), '$anime->id_anime') ");
    }

    function viewersAnimeDetail()
    {
        $ip = $_SERVER['REMOTE_ADDR']; // menangkap ip pengunjung
        $location = $_SERVER['PHP_SELF']; // menangkap server path
        $id = $this->uri->segment('3');
        $anime = $this->db->query("SELECT * FROM tbl_nama_anime WHERE slug = '" . $id . "'")->row();


        $create_log = $this->db->query("INSERT INTO tbl_anime_counter(ip, `location`, `timestamp`, id_anime)VALUES('$ip', '$location', NOW(), '$anime->id') ");
    }
}