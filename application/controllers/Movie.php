<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Movie extends MY_Controller
{
    public function index()
    {
        $this->load->library('pagination');
        $jml = $this->db->count_all('tbl_movie');
        $config['base_url'] = base_url() . 'movie/index/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $jml;
        $config['per_page'] = 8;
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



        $this->db->select('a.slug_turunan,a.slug, a.nama,a.create_date,a.image');
        $this->db->from('tbl_movie a');
        $this->db->order_by('a.create_date', 'desc');
        $this->db->limit($config['per_page']);
        $this->db->offset($page);
        $movie = $this->db->get();

        $this->data['movie'] = $movie->result();
        $this->data['pagination'] = $this->pagination->create_links();

        $this->web = 'content/v_movie';
        $this->layout();
    }


    public function anime_movie()
    {
        $slug = $this->uri->segment(3);

        $this->db->select('a.slug_turunan, a.nama,a.create_date,a.image, a.slug');
        $this->db->from('tbl_movie a');
        $this->db->order_by('a.id', 'desc');
        $this->db->limit(3);
        $recomend_movie = $this->db->get();
        $this->data['recomend_movie'] = $recomend_movie->result();

        $this->db->select('a.slug_turunan, a.nama,a.create_date,a.image, a.slug');
        $this->db->from('tbl_movie a');
        $this->db->order_by('a.create_date', 'desc');
        $this->db->limit(6);
        $movie_terbaru = $this->db->get();
        $this->data['movie_terbaru'] = $movie_terbaru->result();

        $movie = $this->db->query("SELECT * FROM tbl_movie WHERE slug = '" . $slug . "'");
        $this->data['movie'] = $movie->row();
        if ($movie->num_rows() > 0) {
            $this->db->order_by('id', 'desc');
            $this->db->limit('4');
            // $this->data['anim'] = $this->db->get('tbl_anime_list')->result();
            $this->web = 'content/v_movie_detail';
            $this->layout();
        } else {
            redirect(base_url() . 'movie');
        }
        $this->viewersMovie();
    }



    function viewersMovie()
    {
        $ip = $_SERVER['REMOTE_ADDR']; // menangkap ip pengunjung
        $location = $_SERVER['PHP_SELF']; // menangkap server path
        $id = $this->uri->segment('3');
        $movie = $this->db->query("SELECT tbl_movie.slug, tbl_movie.id FROM tbl_movie WHERE slug = '" . $id . "'")->row();


        $create_log = $this->db->query("INSERT INTO tbl_movie_counter(ip, `location`, `timestamp`, id_movie)VALUES('$ip', '$location', NOW(), '$movie->id') ");
    }
}
