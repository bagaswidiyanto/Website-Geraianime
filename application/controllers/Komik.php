<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Komik extends MY_Controller
{
    public function index()
    {
        $this->load->library('pagination');
        $jml = $this->db->count_all('tbl_komik');
        $config['base_url'] = base_url() . 'komik/index/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $jml;
        $config['per_page'] = 12;
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

        $this->db->select('a.id_nama_komik, a.chapter, a.slug, a.createDate, b.nama, b.image, b.slug_turunan');
        $this->db->from('tbl_komik a');
        $this->db->join('tbl_nama_komik b', 'b.id =  a.id_nama_komik', 'left');
        $this->db->where('b.aktif', 'Y');
        $this->db->order_by('a.createDate', 'desc');
        $this->db->limit($config['per_page']);
        $this->db->offset($page);
        $komik = $this->db->get();

        $this->data['komik'] = $komik->result();
        $this->data['pagination'] = $this->pagination->create_links();


        $this->web = 'content/v_komik';
        $this->layout();
    }


    public function komik_detail()
    {
        $slug = $this->uri->segment(3);


        $this->db->select('a.chapter, a.createDate, b.nama, b.slug, a.slug as slg, a.slug_turunan, a.id_nama_komik');
        $this->db->from('tbl_komik a');
        $this->db->join('tbl_nama_komik b', 'b.id =  a.id_nama_komik', 'left');
        $this->db->where('b.aktif', 'Y');
        $this->db->where('b.slug', $slug);
        $this->db->order_by('a.createDate', 'desc');
        $chapter_list = $this->db->get();
        $this->data['chapter_list'] = $chapter_list->result();


        $this->db->select('a.id_nama_komik, a.chapter, a.slug, a.createDate, b.nama, b.image, b.slug_turunan');
        $this->db->from('tbl_komik a');
        $this->db->join('tbl_nama_komik b', 'b.id =  a.id_nama_komik', 'left');
        $this->db->where('b.aktif', 'Y');
        $this->db->order_by('a.createDate', 'desc');
        $this->db->limit(6);
        $update_manga = $this->db->get();
        $this->data['update_manga'] = $update_manga->result();

        $this->db->select('a.nama, a.image, a.slug_turunan, a.tgl_rilis,a.slug');
        $this->db->from('tbl_nama_komik a');
        $this->db->where('a.aktif', 'Y');
        $this->db->order_by('a.id', 'desc');
        $this->db->limit(3);
        $recomend_manga = $this->db->get();
        $this->data['recomend_manga'] = $recomend_manga->result();


        $komik1 = $this->db->query("SELECT a.id, a.nama, a.slug_turunan, a.slug, a.deskripsi, a.pengarang, a.ilustrator, a.jenis_komik, a.status, a.studio, a.tgl_rilis, a.score, a.image FROM tbl_nama_komik a WHERE a.slug = '" . $slug . "' AND a.aktif = 'Y'");
        $this->data['komik_detail'] = $komik1->row();
        if ($komik1->num_rows() > 0) {
            $this->db->order_by('id', 'desc');
            $this->db->limit('4');
            // $this->data['anim'] = $this->db->get('tbl_komik')->result();
            $this->web = 'content/v_komik_detail';
            $this->layout();
        } else {
            redirect(base_url() . 'komik');
        }
        $this->viewersMangaDetail();
    }


    public function komik_chapter()
    {
        $slug3 = $this->uri->segment(3);
        $slug4 = $this->uri->segment(4);
        $this->viewersMangaChp();

        $this->db->select('a.chapter, a.createDate, a.slug, a.id_nama_komik');
        $this->db->from('tbl_komik a');
        $this->db->where('a.id_nama_komik', $slug4);
        $this->db->order_by('a.id', 'desc');
        $this->db->limit(5);
        $chapter_list = $this->db->get();
        $this->data['chapter_list'] = $chapter_list->result();


        $this->db->select('a.id_nama_komik, a.chapter, a.slug, a.createDate, b.nama, b.image, b.slug_turunan');
        $this->db->from('tbl_komik a');
        $this->db->join('tbl_nama_komik b', 'b.id =  a.id_nama_komik', 'left');
        $this->db->where('b.aktif', 'Y');
        $this->db->order_by('a.createDate', 'desc');
        $this->db->limit(6);
        $update_manga = $this->db->get();
        $this->data['update_manga'] = $update_manga->result();

        $this->db->select('a.nama, a.image, a.slug_turunan, a.tgl_rilis,a.slug');
        $this->db->from('tbl_nama_komik a');
        $this->db->where('a.aktif', 'Y');
        $this->db->order_by('a.id', 'desc');
        $this->db->limit(3);
        $recomend_manga = $this->db->get();
        $this->data['recomend_manga'] = $recomend_manga->result();



        $komik1 = $this->db->query("SELECT a.*,b.id as id_nama, b.slug as slgDetail, b.nama, b.deskripsi, b.pengarang, b.ilustrator, b.jenis_komik,b.tgl_rilis,b.status, b.studio, b.score, b.image FROM tbl_komik a LEFT JOIN tbl_nama_komik b ON a.id_nama_komik=b.id WHERE a.slug = '" . $slug3 . "' AND b.aktif = 'Y'");
        $this->data['komik'] = $komik1->row();
        if ($komik1->num_rows() > 0) {
            $this->db->order_by('id', 'desc');
            $this->db->limit('4');
            // $this->data['anim'] = $this->db->get('tbl_komik')->result();
            $this->web = 'content/v_komik_detail';
            $this->layout();
        } else {
            redirect(base_url() . 'komik');
        }
    }


    function viewersMangaChp()
    {
        $ip = $_SERVER['REMOTE_ADDR']; // menangkap ip pengunjung
        $location = $_SERVER['PHP_SELF']; // menangkap server path
        $id = $this->uri->segment('4');
        $komik = $this->db->query("SELECT * FROM tbl_komik WHERE id_nama_komik = '" . $id . "'")->row();


        $create_log = $this->db->query("INSERT INTO tbl_komik_counter(ip, `location`, `timestamp`, id_komik)VALUES('$ip', '$location', NOW(), '$komik->id_nama_komik') ");
    }

    function viewersMangaDetail()
    {
        $ip = $_SERVER['REMOTE_ADDR']; // menangkap ip pengunjung
        $location = $_SERVER['PHP_SELF']; // menangkap server path
        $id = $this->uri->segment('3');
        $komik = $this->db->query("SELECT * FROM tbl_nama_komik WHERE slug = '" . $id . "'")->row();


        $create_log = $this->db->query("INSERT INTO tbl_komik_counter(ip, `location`, `timestamp`, id_komik)VALUES('$ip', '$location', NOW(), '$komik->id') ");
    }
}